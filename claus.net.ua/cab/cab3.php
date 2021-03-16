<?php session_start(); if(isset($_POST['exit'])){session_destroy();session_start();}
if(isset($_POST['sendgreyform']))
{$SERVER_ROOT = "http://claus.net.ua/cab/cab3.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!preg_match("#^$SERVER_ROOT#",$_SERVER['HTTP_REFERER'])){require_once('../patr/hack_attempt.php');}}}
else{unset($_POST['login']);unset($_POST['pass']);}
include("../patr/bdr.php");

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

$res=$db->query("SELECT title,meta_d,meta_k,text FROM general1 WHERE page='cab3'");

if(!$res){echo "<h2>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</h2> <h3>Описание: "; exit(mysql_error());}

if($res->num_rows>0){$row=$res->fetch_array(MYSQLI_ASSOC);}
else{echo "<h2>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</h2>"; exit();}

if(isset($_POST['cab'])){$cab=$_POST['cab'];} elseif(isset($_GET['showuserguide'])){$cab=$_GET['showuserguide'];}
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
<link href="http://claus.net.ua/cssr/rstyle04.css" rel="stylesheet" type="text/css">

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
'http://claus.net.ua/imgr/rigr/rig3over03.jpg',
'http://claus.net.ua/imgr/rigr/rig3down03.jpg',
'http://claus.net.ua/imgr/rigr/rig3over05.jpg',
'http://claus.net.ua/imgr/rigr/rig3down05.jpg',
'http://claus.net.ua/imgr/rigr/rig3over06.jpg',
'http://claus.net.ua/imgr/rigr/rig3down06.jpg')">

<div class="tool03">
<div class="tool02">
<img id="im05" src="http://claus.net.ua/imgr/pencil.png">
<img id="im06" src="http://claus.net.ua/imgr/tictac.png">
<div class="tool01">

<div class="generalR">
<img id="im033" src="http://claus.net.ua/imgr/arrow2.gif">
<img id="im042" src="http://claus.net.ua/imgr/arrow1.gif">

<?php include("../patr/headr.php"); ?>
  
<table class="tabB" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tdL">
        
			<?php include("../patr/lefmr.php"); ?>
            
       	</td>

        <td rowspan="2" class="tdC">
        
        	<?php include("../patr/cnttr.php"); ?>
            
				<div class="text01"><?php echo $row['text']; ?></div>
                
           <?php
 	if(!isset($cab)){              
       echo "<form action='cab3.php' method='post' name='form1' target='_self'>
                <div class='abd02'>
                <div class='abd01'><img id='aimg01' src='http://claus.net.ua/imgr/arrow3.png'><p class='p1'>Пользовательское соглашение<input class='su04' name='submit01' type='submit' value='&#1095;&#1080;&#1090;&#1072;&#1090;&#1100;'></p></div>
                <input name='cab' type='hidden' value='cab01'>
                </div>
                </form>";
         			  }
	 else{
	 		echo "<div class='abd02'>
                <div class='abd01'><img id='aimg02' src='http://claus.net.ua/imgr/arrow4.png'><p class='p1'>Пользовательское соглашение</p></div>
                <input name='ab' type='hidden' value='ab01'>
                </div>";
				
$res3=$db->query("SELECT userguide FROM cabinfor");

if(!$res3){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}

if($res3->num_rows>0)
{
$row3=$res3->fetch_array(MYSQLI_ASSOC);
echo $row3['userguide'];
}
else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}
				
				
	 	} ?>
            
			<?php include("../patr/cntbr.php"); ?>
        
        </td>
        
            <td rowspan="2" class="tdR">
            
				<?php include("../patr/rigmr3.php"); ?>
                
                
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
