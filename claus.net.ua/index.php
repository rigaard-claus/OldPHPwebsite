<?php session_start(); if(isset($_POST['exit'])){session_destroy();session_start();}

if(isset($_POST['sendgreyform']))
{$SERVER_ROOT = "http://claus.net.ua/index.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!eregi("^$SERVER_ROOT",$_SERVER['HTTP_REFERER'])){require_once('patr/hack_attempt.php');}}}
else{unset($_POST['login']);unset($_POST['pass']);}
include("patr/bdr.php");

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

$res=$db->query("SELECT title,meta_d,meta_k,text FROM general1 WHERE page='index'");

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
<img id="im03" src="http://claus.net.ua/imgr/arrow2.gif">


				<?php include("patr/headr.php"); ?>
  
<table class="tabB" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tdL">
        
				<?php include("patr/lefmr.php"); ?>
            
       	</td>

        <td rowspan="2" class="tdC">
        
				<?php include("patr/cnttr.php"); ?>
                
                    <div class="text01"><?php echo $row['text']; ?>
                   		<?php
						 	$res2=$db->query("SELECT img, text, author, date FROM indexr ORDER BY date DESC");

if(!$res2){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}

if($res2->num_rows>0){
$row2=$res2->fetch_array(MYSQLI_ASSOC);
do
{
	printf("
	
	<div class='indc01'>
	<div><img class='imgnd01' src='%s'></div>
	<div>%s</div>
	<div class='indc02'>Написал: <span class='indaut'>%s</span></div>
	<div class='indc03'>Дата: <span class='inddate'>%s</span></div>
	</div>
	
	",$row2['img'],$row2['text'],$row2['author'],$row2['date']);
}
while($row2=$res2->fetch_assoc());
}
else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}
							  
						?>
                    </div>
                
                <?php include("patr/cntbr.php"); ?>
        
        </td>
        
            <td rowspan="2" class="tdR">
                
				<?php // include("patr/rigar.php"); // сломалась сассия, старая версия написаная практически вручную ?>
                
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
