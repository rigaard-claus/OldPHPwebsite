<?php session_start(); if(isset($_POST['exit'])){session_destroy();session_start();}
if(isset($_POST['sendgreyform']))
{$SERVER_ROOT = "http://claus.net.ua/about.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!eregi("^$SERVER_ROOT",$_SERVER['HTTP_REFERER'])){require_once('patr/hack_attempt.php');}}}
else{unset($_POST['login']);unset($_POST['pass']);}
include("patr/bdr.php");

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

if(isset($_POST['ab'])){$ab=$_POST['ab'];}
if(isset($_POST['ab2'])){$ab2=$_POST['ab2'];}

$res=$db->query("SELECT title,meta_d,meta_k,text FROM general1 WHERE page='about'");

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
'http://claus.net.ua/imgr/lefr/lef09down.jpg')">

<div class="tool03">
<div class="tool02">
<img id="im05" src="http://claus.net.ua/imgr/pencil.png">
<img id="im06" src="http://claus.net.ua/imgr/tictac.png">
<div class="tool01">

<div class="generalR">
<img id="im034" src="http://claus.net.ua/imgr/arrow2.gif">

<?php include("patr/headr.php"); ?>
  
<table class="tabB" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tdL">
        
			<?php include("patr/lefmr.php"); ?>
            
       	</td>

        <td rowspan="2" class="tdC">
        
        	<?php include("patr/cnttr.php"); ?>
            
				<div class="text01"><?php echo $row['text']; ?></div>
                
                  <?php if(!isset($ab) && !isset($ab2) && !isset($_POST['sendgreyform']) && !isset($_POST['exit'])) {echo "<script type='text/javascript'>
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','1','height','1','src','http://claus.net.ua/swfr/06','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','http://claus.net.ua/swfr/06' ); //end AC code
</script><noscript><object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0' width='1' height='1'>
                    <param name='movie' value='http://claus.net.ua/swfr/06.swf'>
                    <param name='quality' value='high'>
                    <embed src='http://claus.net.ua/swfr/06.swf' quality='high' pluginspage='http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='1' height='1'></embed>
                  </object>
                </noscript>";} ?>
                
<?php
 	if(!isset($ab)){              
       echo "<form action='about.php' method='post' name='form1' target='_self'>
                <div class='abd02'>
                <div class='abd01'><img id='aimg01' src='http://claus.net.ua/imgr/arrow3.png'><p class='p1'>Несколько слов о сайте <input class='su01' name='submit01' type='submit' value='&#1095;&#1080;&#1090;&#1072;&#1090;&#1100;'></p></div>
                <input name='ab' type='hidden' value='ab01'>
                </div>
                </form>";
         			  }
	 else{
	 		echo "<form action='about.php' method='post' name='form1' target='_self'>
                <div class='abd02'>
                <div class='abd01'><img id='aimg02' src='http://claus.net.ua/imgr/arrow4.png'><p class='p1'>Несколько слов о сайте </p></div>
                <input name='ab' type='hidden' value='ab01'>
                </div>
                </form>";
				
$res3=$db->query("SELECT text FROM aboutr");

if(!$res3){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}

if($res3->num_rows>0)
{
$row3=$res3->fetch_array(MYSQLI_ASSOC);
echo $row3['text'];
}
else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}
				
				
	 	} ?>
        
	 	 <?php
	 if(!isset($ab2)){	        
        echo "<form action='about.php' method='post' name='form2' target='_self'>
                <div class='abd02'>
                <div class='abd01'><img id='aimg01' src='http://claus.net.ua/imgr/arrow3.png'><p class='p1'>Резюме <input class='su02' name='submit02' type='submit' value='&#1095;&#1080;&#1090;&#1072;&#1090;&#1100;'></p></div>
                <input name='ab2' type='hidden' value='ab02'>
                </div>
                </form>";
		 }
	else{
			echo "<form action='about.php' method='post' name='form2' target='_self'>
                <div class='abd02'>
                <div class='abd01'><img id='aimg02' src='http://claus.net.ua/imgr/arrow4.png'><p class='p1'>Резюме </p></div>
                <input name='ab2' type='hidden' value='ab02'>
                </div>
                </form>";
				
				$res4=$db->query("SELECT resume FROM aboutr");

if(!$res4){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}

if($res4->num_rows>0)
{
$row4=$res4->fetch_array(MYSQLI_ASSOC);
echo $row4['resume'];
}
else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}
				
		}		
?>                  
                
                <div class="abd02">
                <div class="abd01"><img id="aimg02" src="http://claus.net.ua/imgr/arrow4.png"><p class="p1">Сертификаты </p></div>
                </div>
                
                <div class="indc01">
                <div class="abd03">
				<?php 
				$res2=$db->query("SELECT text FROM diplomr");

if(!$res2){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}

if($res2->num_rows>0){
$row2=$res2->fetch_array(MYSQLI_ASSOC);
do
{
	printf("%s&nbsp;",$row2['text']);
}
while($row2=$res2->fetch_array(MYSQLI_ASSOC));
}
else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}
				?>
            	</div>
                </div>
                
			<?php include("patr/cntbr.php"); ?>
        
        </td>
        
            <td rowspan="2" class="tdR">
                
				<?php include("patr/rigar.php"); ?>
                
            </td>
      	</tr>
      
      <tr>
          <td class="leftTabTd03">
          
				<?php include("patr/lefar.php"); ?>
          
          </td>
      </tr>
      
      <tr>
        <td class="left11"><img src="http://claus.net.ua/imgr/Wit02.png"></td>
        <td></td>
        <td class="rightD01"><img src="http://claus.net.ua/imgr/Wit02.png"></td>
      </tr>
    </table>

	<?php include("patr/bottr.php"); ?>
    
</div>
</div>
</div>
</div>

</body>
</html>
