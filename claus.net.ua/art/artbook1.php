<?php session_start(); if(isset($_POST['exit'])){session_destroy();session_start();}
if(isset($_POST['sendgreyform']))
{$SERVER_ROOT = "http://claus.net.ua/art/artbook1.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!eregi("^$SERVER_ROOT",$_SERVER['HTTP_REFERER'])){require_once('../patr/hack_attempt.php');}}}
else{unset($_POST['login']);unset($_POST['pass']);}
include("../patr/bdr.php");

@date_default_timezone_set (date_default_timezone_get()); 

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

$res=$db->query("SELECT title,meta_d,meta_k,text FROM general1 WHERE page='artbook1'");

if(!$res){echo "<h2>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</h2> <h3>Описание: "; exit(mysql_error());}

if($res->num_rows>0){$row=$res->fetch_array(MYSQLI_ASSOC);}
else{echo "<h2>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</h2>"; exit();}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php echo $row['title']; ?></title>
<link rel="icon" href="http://claus.net.ua/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://claus.net.ua/favicon.ico" type="image/x-icon">
<link href="http://claus.net.ua/cssr/rstyle01.css" rel="stylesheet" type="text/css">
<link href="http://claus.net.ua/cssr/rstyle02.css" rel="stylesheet" type="text/css">
<link href="http://claus.net.ua/cssr/rstyle03.css" rel="stylesheet" type="text/css">

<meta name="description" content="<?php echo $row['meta_d']; ?>">
<meta name="keywords" content="<?php echo $row['meta_k']; ?>">

<script src="http://claus.net.ua/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="http://claus.net.ua/Scripts/R01.js" type="text/javascript"></script>
</head>
<body onLoad="MM_preloadImages(
'http://claus.net.ua/imgr/lefr/lef04over.jpg',
'http://claus.net.ua/imgr/lefr/lef04down.jpg',
'http://claus.net.ua/imgr/lefr/lef05over.jpg',
'http://claus.net.ua/imgr/lefr/lef05down.jpg',
'http://claus.net.ua/imgr/lefr/lef06over.jpg',
'http://claus.net.ua/imgr/lefr/lef06down.jpg',
'http://claus.net.ua/imgr/lefr/lef07over.jpg',
'http://claus.net.ua/imgr/lefr/lef07down.jpg',
'http://claus.net.ua/imgr/lefr/lef08over.jpg',
'http://claus.net.ua/imgr/lefr/lef08down.jpg',
'http://claus.net.ua/imgr/lefr/lef09over.jpg',
'http://claus.net.ua/imgr/lefr/lef09down.jpg',
'http://claus.net.ua/imgr/rigr/rig1over03.jpg',
'http://claus.net.ua/imgr/rigr/rig1down03.jpg',
'http://claus.net.ua/imgr/rigr/rig1over05.jpg',
'http://claus.net.ua/imgr/rigr/rig1down05.jpg',
'http://claus.net.ua/imgr/rigr/rig1over06.jpg',
'http://claus.net.ua/imgr/rigr/rig1down06.jpg')">

<div class="tool03">
<div class="tool02">
<img id="im05" src="http://claus.net.ua/imgr/pencil.png">
<img id="im06" src="http://claus.net.ua/imgr/tictac.png">
<div class="tool01">

<div class="generalR">
<img id="im031" src="http://claus.net.ua/imgr/arrow2.gif">
<img id="im04" src="http://claus.net.ua/imgr/arrow1.gif">

<?php include("../patr/headr.php"); ?>
  
<table class="tabB" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tdL">
        
			<?php include("../patr/lefmr.php"); ?>
            
       	</td>

        <td rowspan="2" class="tdC">
        <a target="_blank"></a>
        	<?php include("../patr/cnttr.php"); ?>
            
				<div class="text01"><?php echo $row['text']; ?>
                <div id='TexTcenter'>3D Работы (3ds max, Компас 3d) Автор:Rigaard</div>
                <div class="artbd01">
                <?php 
						$res2=$db->query("SELECT * FROM artpreviewr WHERE selection='3d' ORDER BY date DESC");
						$i=0;
						
						if(!$res2){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}
						
						if($res2->num_rows>0){
						$row2=$res2->fetch_array(MYSQLI_ASSOC);
						do
						{
						$row2['time']=substr($row2['time'],0,5);
						require_once('../libr/month_rus.php');
						$row2['date']=ruencoding($row2['date']);
						if($i==0){echo"<table align='center' id='artTablePreview'><tr id='artTablePreviewTr'>";$i++;}else{$i++;}
						
							printf("
							
							<td id='artTablePreviewTd'><div id='artPreviewWrapper02'><div id='artPreviewWrapper01'>
								<a href='%s' onClick=\"window.open(this.href,'','menubar=no,scrollbars=yes,resizable=yes,width=1024,height=768');return false\" target='_blank'>
									<img id='artImgPreview01' src='%s' alt='%s' align='center'><br>
								</a>
									<a href='%s' onClick=\"window.open(this.href,'','menubar=no,scrollbars=yes,resizable=yes,width=1024,height=768');return false\" target='_blank'>
										<span id='artTitleSmall'>%s</span>
									</a><br>
								<span id='artATD'>%s, %s,<br>%s</span><br>
								<span id='artViewC'>Комментариев: %s </span><span id='artViewV'>Просмотров: %s</span>
							</div></div></td>
							
							",$row2['img'],$row2['small_img'],$row2['title'],$row2['img'],$row2['title'],$row2['author'],$row2['time'],$row2['date'],$row2['comments'],$row2['views']);
							
						if($i%4==0&&$i!=0){echo"</tr></table>";$i=0;}
						}
						while($row2=$res2->fetch_array(MYSQLI_ASSOC));
						}
						else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}
						if($i!==0){echo"</tr></table>";$i=0;}			
				
				?>
                
                </div>
                <div id='TexTcenter'>Видео(3ds max) Автор:Rigaard</div>
                <div id='videoPlayer'>
                <?php 
						$resv3=$db->query("SELECT * FROM artvideor WHERE cat='3d' ORDER BY date DESC");
						
						if(!$resv3){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}
						
						if($resv3->num_rows>0){
						$rowv3=$resv3->fetch_array(MYSQLI_ASSOC);
						do
						{
						echo $rowv3['video'];
						}
						while($rowv3=$resv3->fetch_array(MYSQLI_ASSOC));
						}
						else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}			
				
				?>
                </div>
                </div>
            
			<?php include("../patr/cntbr.php"); ?>
        
        </td>
        
            <td rowspan="2" class="tdR">
            
				<?php include("../patr/rigmr1.php"); ?>
                
                
				<?php include("../patr/rigar.php"); ?>
                
            </td>
      	</tr>
      
      <tr>
          <td class="leftTabTd03">
          
				<?php include("../patr/lefar.php"); ?>
          
          </td>
      </tr>
      
      <tr>
        <td class="left11"><img src="http://claus.net.ua/imgr/Wit02.png"></td>
        <td></td>
        <td class="rightD01"><img src="http://claus.net.ua/imgr/Wit02.png"></td>
      </tr>
    </table>

	<?php include("../patr/bottr.php"); ?>
    
</div>
</div>
</div>
</div>

</body>
</html>
