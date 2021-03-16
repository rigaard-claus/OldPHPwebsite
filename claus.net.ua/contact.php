<?php session_start(); if(isset($_POST['exit'])){session_destroy();session_start();}
if(isset($_POST['send']))
{$SERVER_ROOT = "http://claus.net.ua/contact.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!preg_match("#^$SERVER_ROOT#",$_SERVER['HTTP_REFERER'])){require_once('patr/hack_attempt.php');}}}
else{unset($_POST['name']);unset($_POST['email']);unset($_POST['atext']);unset($_POST['ant']);unset($_POST['rowd']);}
if(isset($_POST['sendgreyform']))
{$SERVER_ROOT = "http://claus.net.ua/contact.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!preg_match("#^$SERVER_ROOT#",$_SERVER['HTTP_REFERER'])){require_once('patr/hack_attempt.php');}}}
else{unset($_POST['login']);unset($_POST['pass']);}
include("patr/bdr.php");

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

if(isset($_POST['send'])){$send=$_POST['send'];}
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['atext'])){$atext=$_POST['atext'];}
if(isset($_POST['ant'])){$ant=$_POST['ant'];}
if(isset($_POST['rowd'])){$rowd=$_POST['rowd'];}

$name=trim($name);
$name=stripslashes($name);
$name=htmlspecialchars($name);

$atext=stripslashes($atext);
$atext=htmlspecialchars($atext);
$atext=substr($atext, 0, 10022);
$atext=trim($atext);
if(strlen($atext)>0) 
{
    require_once('libr/html_mail.php');
    $text1=mailR01($name,$atext);  
}

$email=trim($email);
$email=stripslashes($email);
$email=htmlspecialchars($email);
$validemail=is_email($email);

if(isset($rowd)){$res3=mysql_query("SELECT text FROM antispamr WHERE id=$rowd",$db); $row3=mysql_fetch_array($res3); $rowd=$row3['text'];}

function is_email($email)
{
  if (function_exists("filter_var")){
    $s=filter_var($email, FILTER_VALIDATE_EMAIL);
    return !empty($s);
  }
  $p = '/^[a-z0-9!#$%&*+-=?^_`{|}~]+(\.[a-z0-9!#$%&*+-=?^_`{|}~]+)*';
  $p.= '@([-a-z0-9]+\.)+([a-z]{2,3}';
  $p.= '|info|arpa|aero|coop|name|museum|mobi)$/ix';
  return preg_match($p, $email);
}


$res=$db->query("SELECT title,meta_d,meta_k,text FROM general1 WHERE page='contact'");

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
<script src="http://claus.net.ua/Scripts/TextArea01.js" type="text/javascript"></script>

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
<img id="im035" src="http://claus.net.ua/imgr/arrow2.gif">

<?php include("patr/headr.php"); ?>
  
<table class="tabB" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tdL">
        
			<?php include("patr/lefmr.php"); ?>
            
       	</td>

        <td rowspan="2" class="tdC">
        
        	<?php include("patr/cnttr.php"); ?>
            
				<div class="text01"><?php echo $row['text']; ?></div>
                
                <?php 
				
				@date_default_timezone_set (date_default_timezone_get()); 
				
				$xid=ceil((date('s')+1)/4);				
				$res2=$db->query("SELECT img FROM antispamr WHERE id=$xid");

if(!$res2){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}

if($res2->fetch_array(MYSQLI_ASSOC)>0)
{
$row2=$res2->fetch_array(MYSQLI_ASSOC);
}
else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}				
				
				if($rowd!=$ant || $validemail!=1 || $atext=="" || $name==""){unset($send);}
				
				if(!isset($send))
				{
					if(isset($rowd))
					{
					if($name==""){echo "<p id='ersend'>*Пустое поле ввода имени</p>";}
					if($validemail!=1){echo "<p id='ersend'>*Неправильный email адрес</p>";}
					if($atext==""){echo "<p id='ersend'>*Пустое поле сообщения</p>";}
					if($rowd!=$ant){echo "<p id='ersend'>*Слово с картинки введено не верно</p>";}
					}
					?>
				
				<form action="contact.php#show" method="post" name="form1">
				<p><label id="lab01">Введите ваше имя:&nbsp; <input id="textinput" name="name" type="text" size="40" maxlength="40" value="<?php echo $name; ?>"></label></p>
				<p><label id="lab01">Введите ваш email: <input id="textinput" name="email" type="text" size="40" maxlength="40" value="<?php echo $email; ?>"></label></p>
				<label id="lab01"><p>Текст сообщения:</p><div class="area01"><textarea id="atext" name="atext" cols="64" rows="15"  onclick="length_check(10000, 'atext', 'counter')" onkeyup="length_check(10000, 'atext', 'counter')"><?php echo $atext; ?></textarea></div></label>
<div id="sp01">
Осталось символов: <span id="counter">10000 / 10000</span>
</div>

<?php
																
				printf ("<div class='box01'>
				<p><label id='lab01'>Введите слово с картинки:<input id='textinput' name='ant' type='text' size='16' maxlength='20'></label></p><img id='genant' src='%s'>
				</div>
				
				<div class='box02'>
				<input class='su03' name='send' id='show' type='submit' value='&#1054;&#1090;&#1087;&#1088;&#1072;&#1074;&#1080;&#1090;&#1100;'>
				</div>
				<input name='rowd' type='hidden' value='$xid'>
				</form>",$row2['img']); 
				
				}				
				else
				{
				if($rowd==$ant && $validemail==1 && $atext!="" && $name!="")
					{
					require_once('libr/class.phpmailer.php');
                    $mail = new PHPMailer(); 
                    $mail->From = $email;
                    $mail->FromName = 'user';
                    $mail->AddAddress('admin@claus.net.ua', 'Rigaard');
                    $mail->IsHTML(true);
                    $mail->Subject = 'Обратная связь';
                    $mail->Body = $text1;
                    $mail->CharSet = "UTF-8";
                    $mail->Send();    
					//mail("admin@claus.net.ua", "Обратная связь", $text1, 'From:'.$email."\r\n"."MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8"); 
					echo "<p id='p2'>Ваше сообщение успешно отправлено</p>";
					}		
				}
				
				?>
                
                
            
			<?php include("patr/cntbr.php"); ?>
        
        </td>
        
            <td rowspan="2" class="tdR">
                
				<?php include("patr/rigar.php");?>
                
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
