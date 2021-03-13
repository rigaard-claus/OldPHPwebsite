<?php session_start();
if(isset($_POST['send']))
{$SERVER_ROOT = "http://claus.net.ua/cab/cab2.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!eregi("^$SERVER_ROOT",$_SERVER['HTTP_REFERER'])){require_once('../patr/hack_attempt.php');}}}
else{unset($_POST);}
include("../patr/bdr.php");
@date_default_timezone_set (date_default_timezone_get());

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

$res=$db->query("SELECT title,meta_d,meta_k,text FROM general1 WHERE page='cab2'");

if(!$res){echo "<h2>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</h2> <h3>Описание: "; exit(mysql_error());}

if($res->num_rows>0){$row=$res->fetch_array(MYSQLI_ASSOC);}
else{echo "<h2>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</h2>"; exit();}

$greyauthorisation='hide';

if(isset($_POST['firstname']))
{
	$firstname=$_POST['firstname'];
	$firstname=trim($firstname);
	$firstname=stripslashes($firstname);
	$firstname=htmlspecialchars($firstname);
}
if(isset($_POST['lastname']))
{
	$lastname=$_POST['lastname'];
	$lastname=trim($lastname);
	$lastname=stripslashes($lastname);
	$lastname=htmlspecialchars($lastname);
}
if(isset($_POST['man'])){$man=$_POST['man'];}
if(isset($_POST['day'])){$day=$_POST['day'];}
if(isset($_POST['month'])){$month=$_POST['month'];}
if(isset($_POST['year'])){$year=$_POST['year'];}
if(isset($_POST['country'])){$country=$_POST['country'];}
if(isset($_POST['city']))
{
	$city=$_POST['city'];
	$city=trim($city);
	$city=stripslashes($city);
	$city=htmlspecialchars($city);
}
if(isset($_POST['mail']))
{
	$mail=$_POST['mail'];
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
	$mail=trim($mail);
	$mail=stripslashes($mail);
	$mail=htmlspecialchars($mail);
	$validemail=is_email($mail);
}
if(isset($_POST['hiddenemail'])){$hiddenemail=$_POST['hiddenemail'];}
if(isset($_POST['login']))
{
	$login=$_POST['login'];
	$login=trim($login);
	$login=stripslashes($login);
	$login=htmlspecialchars($login);
}
if(isset($_POST['pass'])){$pass=$_POST['pass'];}
if(isset($_POST['passval'])){$passval=$_POST['passval'];}
if(isset($_POST['rules'])){$rules=$_POST['rules'];}

/* ---- Проверка данных на ошибки ввода и пустые поля ---- */
if(isset($firstname)){if($firstname!=''){$val01=true;}else{$val01=false;}}
if(isset($lastname)){if($lastname!=''){$val02=true;}else{$val02=false;}}
if(isset($man)){if($man=='мужской'){$man_db='true';$man_val=true;}elseif($man=='женский'){$man_db='false';$man_val=false;}}
if(isset($year))
{
	$currentyear=date('Y');
	$currentage=$currentyear-$year;
	if($currentage<6){$val03=false;$val04=false;}
	if($currentage>5&&$currentage<13){$val03=true;$val04=false;}
	if($currentage>12){$val03=true;$val04=true;}
	require_once('../libr/monthonly_rus.php');
	require_once('../libr/mnemonik.php');
	$day=validdaymonth(mnemocodding($month),$day);
}
if(isset($city)){if($city!=''){$val05=true;}else{$val05=false;}}
if(isset($mail))
{
	if($validemail)
	{
		$val06=true;
		
		$res_login=$db->query("SELECT login,mail FROM preauthorisationr");
		if($res_login->num_rows>0)
		{
			$row_login=$res_login->fetch_array(MYSQLI_ASSOC);
			do
			{
				if($row_login['mail']==$mail){$error_mail='пользователь с таким email адресом уже подал<br>заявку на регистрацию!';$val14=false;}else{$val14=true;}
				if($row_login['login']==$login){$error_login='пользователь с таким логином уже подал<br>заявку на регистрацию!';$val15=false;}else{$val15=true;}
			}
			while($row_login=$res_login->fetch_array(MYSQLI_ASSOC));
		}
		else{$val14=true;$val15=true;}
		
			$res_logingeneral=$db->query("SELECT login,mail FROM authorisationr");
			if($res_logingeneral->num_rows>0)
			{
				$row_logingeneral=$res_logingeneral->fetch_array(MYSQLI_ASSOC);
				do
				{
					if($row_logingeneral['mail']==$mail){$error_mail='пользователь с таким email адресом уже<br>зарегистрирован!';$val16=false;}else{$val16=true;}
					if($row_logingeneral['login']==$login){$error_login='пользователь с таким логином уже<br>зарегистрирован!';$val17=false;}else{$val17=true;}
				}
				while($row_logingeneral=$res_logingeneral->fetch_array(MYSQLI_ASSOC));
			}
			else{$val16=true;$val17=true;}
		
	}
	else{$val06=false;}
	
}
if(isset($hiddenemail)){if($hiddenemail=='no'){$val07=true;}else{$val07=false;}}
if(isset($login)){if($login!=''){$val08=true;}else{$val08=false;}}
if(isset($pass)){if($pass!=''&& strlen($pass)>5){$val09=true;}else{$val09=false;}}
if(isset($pass)){if($pass==$passval){$val10=true;}else{$val10=false;}}
if(isset($year)){if($rules=='yes'){$val11=true;}else{$val11=false;}}
$val12=false;$val13=false;
/* ---- Обработка аватаров ---- */
if(isset($_POST['validpic'])){$validavatar=$_POST['validpic'];}
if(isset($_POST['previewpic'])){$previewavatar=$_POST['previewpic'];}else{$previewavatar='http://claus.net.ua/imgr/userpic/defaultmale.png';}
if(isset($_POST['removepic'])){$removetrashpic=$_POST['removepic'];}
if($_FILES['userpic']['name']!='')
{
$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/imgr/userpic/tmpr/';
$removetrashdir = $_SERVER['DOCUMENT_ROOT'].'/imgr/userpic/';       
require_once('../libr/random_lat.php');
$generatename=randomphraseeng(8);
for($i=0;$i<strlen($_FILES['userpic']['name']);$i++)
{
    if(mb_substr($_FILES['userpic']['name'],$i,1,'utf8')=='.')
    {$userfiletype=mb_substr($_FILES['userpic']['name'],$i,strlen($_FILES['userpic']['name'])-$i,'utf8');}
    elseif(!isset($userfiletype)){$userfiletype='';}
} 
$destination=$uploaddir.$generatename.$userfiletype;
$img='../imgr/userpic/tmpr/'.$generatename.$userfiletype;
$gen=date('YmdHis');
$removetrashpic=$removetrashdir.$gen.$generatename.$userfiletype;
$avatar='../imgr/userpic/'.$gen.$generatename.$userfiletype;
	if (is_uploaded_file($_FILES["userpic"]["tmp_name"]))	
	{ 
		move_uploaded_file($_FILES['userpic']['tmp_name'],$destination);
		require_once('../libr/imgavatar.php');
		$f=avatarresize($img,$avatar,75,75,153,153,153);
		if($f){$val12=true;$previewavatar='http://claus.net.ua/imgr/userpic/'.$gen.$generatename.$userfiletype;$validavatar='valid';}
	}
if(file_exists($destination)){unlink($destination);}
    if(isset($_POST['removepic']))
    {
        if($_POST['removepic']!='' && $removetrashpic!=$_POST['removepic'])
        {
            if(file_exists($_POST['removepic']))
            {
                unlink($_POST['removepic']);
            }
        }
    }
}
else
{$val13=true;
    if(isset($_POST['validpic']) && (($_POST['validpic']!='valid' || $validavatar!='valid')))
    {
        if($man_val)
        {$previewavatar='http://claus.net.ua/imgr/userpic/defaultmale.png';}
        else
        {$previewavatar='http://claus.net.ua/imgr/userpic/defaultfemale.png';}
    }
}
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
<img id="im041" src="http://claus.net.ua/imgr/arrow1.gif">

<?php include("../patr/headr.php"); ?>
  
<table class="tabB" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tdL">
        
			<?php include("../patr/lefmr.php"); ?>
            
       	</td>

        <td rowspan="2" class="tdC">
        
        	<?php include("../patr/cnttr.php"); ?>
            
				<div class="text01"><?php echo $row['text']; ?>
                
                <?php include("../patr/topfilletcabwrapper.php"); ?>
                	
             <?php 
			if($val01 && $val02 && $val03 && $val04 && $val05 && $val06 && $val08 && $val09 && $val10 && $val11 && ($val12 ||$val13) && $val14 && $val15 && $val16 && $val17)
			{
                    if(isset($_POST['previewpic']) && file_exists($removetrashpic))
                    {$userpic=$previewavatar;}
                    elseif(isset($man_val) && !$man_val)
                    {$userpic='http://claus.net.ua/imgr/userpic/defaultfemale.png';}
                    elseif(isset($man_val) && $man_val)
                    {$userpic='http://claus.net.ua/imgr/userpic/defaultmale.png';}
				//if($val12){$userpic='http://claus.net.ua/imgr/userpic/'.$gen.$generatename.$userfiletype;}
				//if($val13){if($man_val){$userpic='http://claus.net.ua/imgr/userpic/defaultmale.png';}
				//else{$userpic='http://claus.net.ua/imgr/userpic/defaultfemale.png';}}
				require_once('../libr/my_crypt.php');
				$pass=myencryption($login.$pass,'RigaardArt','982');
				$dater=date('Y-m-d');
				$timer=date('H:i:s');
				$monthr=ruencodingmonthreverse(mnemocodding($month));
				if($monthr<=9){$monthr='0'.$monthr;}
				$ager=$year.'-'.$monthr.'-'.$day;
				$res5=$db->query("INSERT INTO preauthorisationr (firstname,lastname,userpic,login,password,date,time,man,age,mail,showmail,country,city) VALUES('$firstname','$lastname','$userpic','$login','$pass','$dater','$timer','$man_db','$ager','$mail','$val07','$country','$city')");

if(!$res5){echo "<p class='error'>Ошибка внесения данных в базу. Сообщите об этом администратору admin@claus.net.ua</p>";}
else
	{
		if(!$val07){$showr='(скрытый)';}else{$showr='';}
        
        require_once('../libr/html_mail.php');
        $textinfo=mailR02($firstname,$lastname,$man,$day." ".$month." ".$year,$country,$city,$mail.$showr,$userpic,$login,$passval,$pass);
		mail("admin@claus.net.ua", "Запрос регистрации на сайте CLAUS.NET.UA", $textinfo, 'From:'.$mail."\r\n"."MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8"); 
		echo "<div id='cabInformationTxt'>Заявка на регистрацию отправлена. После того как администратор подтвердит регистрацию, вам на email адрес будет выслано письмо с дальнейшими инструкциями. В случае если администратор по какой то причине не подтвердил регистрацию в течении трех суток, вы можете задать вопросы написав ему письмо на email адрес <a href='mailto:admin@claus.net.ua'>admin@claus.net.ua</a>, либо через форму <a href='http://claus.net.ua/contact.php'>обратной связи</a>.</div>";
        session_destroy();
	}
				
			}
            elseif(isset($_SESSION['seslogin'])){echo "<div id='cabInformationTxt2'>Вы уже зарегистрированы на сайте.</div>";}
								else{
									
                                	echo
									"<form  enctype='multipart/form-data' action='cab2.php#show2' method='post' name='form1'>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Введите Ваше имя:</span><br><input id='textinput' name='firstname' type='text' size='43' maxlength='40' value='";
									
									echo $firstname; 
									
									echo
									"'></label>
                                    <br>";
									
									if(isset($val01))
									{
										if(!$val01){echo "<div id='cabSmallTxtError'>поле обязательно для заполнения!</div>";}
									} 
									
									echo
                                    "</div>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Введите Вашу фамилию:</span><br><input id='textinput' name='lastname' type='text' size='43' maxlength='40' value='";
									
									echo $lastname;
									
									echo
									"'></label>
                                    <br>";
									
									if(isset($val02))
									{
										if(!$val02){echo "<div id='cabSmallTxtError'>поле обязательно для заполнения!</div>";}
									} 
									
									echo
                                    "</div>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Укажите пол:</span><br>
                                        <select name='man' id='man'>
                                          <option";
										  
										  if(!isset($man)||$man=='мужской'){echo ' selected';}
										  
										  echo
										  ">мужской</option>
                                          <option";
										  
										  if($man=='женский'){echo ' selected';}
										  
										  echo
										  ">женский</option>
                                        </select>
                                    </label>
                                    </div>
                                    <div id='cabLoginDiv'><span id='cabLoginTxt'>Укажите дату Вашего рождения:</span><br>
                                    <select name='day' id='day'>";
										
                                        $selectedd=date('d');
										if(isset($day)){$selectedd=$day;}
										$select=' selected';
                                        for ($i=1;$i<32;$i++)
                                        {
                                        echo "<option";if($i==$selectedd){echo $select;} echo ">".$i."</option>";
                                        }
                                        
                                        echo
                                    "</select>
                                    <select name='month' id='month'>";
									
                                        require_once('../libr/monthonly_rus.php');
										require_once('../libr/mnemonik.php');
										$selectedd=date('m');
										if(isset($month)){$selectedd=ruencodingmonthreverse(mnemocodding($month));}
										for($i=1;$i<13;$i++)
										{
										if($i<=9){$j='0'.$i;}else{$j=$i;}
										echo "<option";if($i==$selectedd){echo $select;} echo ">".ruencodingmonth($j)."</option>";
										}
                                        
                                        echo
                                    "</select>
                                    <select name='year' id='year'>";
									
                                        $selectedd=date('Y');
										if(isset($year)){$selectedd=$year;}
										$select=' selected';
                                        for ($i=1911;$i<date('Y')+2;$i++)
                                        {
                                        echo "<option";if($i==$selectedd){echo $select;} echo ">".$i."</option>";
                                        }
                                        
                                        echo
                                    "</select>
                                        <br>";
										
                                        if(isset($val03))
                                        {
                                            if($val03==true && $val04==false){echo "<div id='cabSmallTxtError'>тебе твоя мама разрешила заходить в интернет?</div>";}
											elseif($val03==false && $val04==false)
												{
													if($day<10){$day='0'.$day;}
													$month=ruencodingmonthreverse(mnemocodding($month)); if($month<10){$month='0'.$month;}
												if(date('Ymd')>$year.$month.$day){echo "<div id='cabSmallTxtError'>вы слишком юны!</div>";}
												
												elseif(date('Ymd')==$year.$month.$day){echo "<div id='cabSmallTxtError'>вы сегодня появились на свет?</div>";}
												elseif(date('Ymd')<$year.$month.$day){echo "<div id='cabSmallTxtError'>вы из будущего?</div>";}
                                        		}
										}
                                        
                                        echo
                                    "</div>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Укажите Вашу родную страну:</span><br>
                                        <select name='country' id='country'>";
										
                                            require_once('../libr/allcountry_rus.php');  
                                            $selectedd='&#1059;&#1082;&#1088;&#1072;&#1080;&#1085;&#1072;';
											if(isset($country)){$selectedd=mnemocodding($country);}
											$select=' selected';
											for ($i=0;$i<240;$i++)
											{
												echo "<option";if($getcountry[$i]==$selectedd){echo $select;} echo ">".$getcountry[$i]."</option>";
											}
                                            
                                        echo
                                        "</select>
                                    </label>
                                    </div>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Введите свой населенный пункт:</span><br>
                                    <input id='textinput' name='city' type='text' size='43' maxlength='40' value='";
									
									if(!isset($city)||$city==''){echo 'Киев';} else {echo $city;}
									
									echo
									"'></label>
                                    <br>";
									
                                    if(isset($val05))
									{
										if(!$val05){echo "<div id='cabSmallTxtError'>поле обязательно для заполнения!</div>";}
									} 
									
									echo
                                    "</div>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Введите свой email адрес:</span><br>
                                    <input id='textinput' name='mail' type='text' size='43' maxlength='40' value='";
									
									echo $mail; 
									
									echo
									"'></label>
                                    <br>";
									
                                    if(isset($val06))
									{
										if(!$val06){echo "<div id='cabSmallTxtError'>неправильный email адрес!</div>";}
										elseif(isset($error_mail)){echo "<div id='cabSmallTxtError'>".$error_mail."</div>";}
									} 
									
                                    echo
                                    "</div>
                                    <div id='cabLoginDiv'><span id='cabLoginTxt'>Скрыть email:</span><br>
                                    <label id='lab01'><input name='hiddenemail' type='radio' value='yes'";
									
									if($hiddenemail=='yes'){echo ' checked';}
									
									echo
									"><span id='cabLoginTxt'>да</span></label>
                                    <label id='lab01'><input name='hiddenemail' type='radio' value='no'";
									
									if(!isset($hiddenemail)||$hiddenemail=='no'){echo ' checked';}
									
									echo
									"><span id='cabLoginTxt'>нет</span></label>
                                    </div>
                                    <input type='hidden' name='MAX_FILE_SIZE' value='400000'>
                                    <input type='hidden' name='removepic' value='".$removetrashpic."'>
                                    <input type='hidden' name='previewpic' value='".$previewavatar."'>
                                    <input type='hidden' name='validpic' value='".$validavatar."'>
                                    
                                    <div id='cabLoginDiv'><span id='cabRulesTxt'>Ваш текущий аватар:</span><br><img id='registrationPreviewImg' src='";
                                    
                                    if(isset($_POST['previewpic']) && file_exists($removetrashpic))
                                    {echo $previewavatar;}
                                    elseif(isset($man_val) && !$man_val)
                                    {echo 'http://claus.net.ua/imgr/userpic/defaultfemale.png';}
                                    else
                                    {echo 'http://claus.net.ua/imgr/userpic/defaultmale.png';}
                                    echo "'><br><label id='lab01'><span id='cabLoginTxt'>Загрузить аватар:</span><br><input id='userpic' type='file' name='userpic'></label><br><span id='cabSmallTxt'>Допустимые форматы изображений: gif, jpeg, png,<br>размер файла до 300Kb.</span>
                                    <br>";
									
                                    if(!$val13)
									{
										if(!$val12){echo "<div id='cabSmallTxtError'>ошибка обработки изображения!</div>";}
									} 
									
                                    echo
                                    "</div>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Введите свой логин:</span><br>
                                    <input id='textinput' name='login' type='text' size='43' maxlength='40' value='";
									
									echo $login; 
									
									echo
									"'></label>
                                    <br>";
									
                                    if(isset($val08))
									{
										if(!$val08){echo "<div id='cabSmallTxtError'>поле обязательно для заполнения!</div>";}
										elseif(isset($error_login)){echo "<div id='cabSmallTxtError'>".$error_login."</div>";}
									} 
									
                                    echo
                                    "</div>
									<div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Введите пароль:</span><br><input id='textinput' name='pass' type='password' size='43' maxlength='40' value=''></label>
                                    <br>";
									
                					if(isset($val09))
									{
										if(!$val09){echo "<div id='cabSmallTxtError'>минимальная длинна пароля - 6 символов!</div>";}
									} 
									
                                    echo
                					"</div>
                					<div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Подтвердите пароль:</span><br><input id='textinput' name='passval' type='password' size='43' maxlength='40' value=''></label>
                					<br>";
									
                					if(isset($val10))
									{
										if(!$val10){echo "<div id='cabSmallTxtError'>поля паролей не совпали!</div>";}
									} 
									
                                    echo
                					"</div>
                					<div id='cabLoginDiv'><label id='lab01'><span id='cabRulesTxt'><input name='rules' type='checkbox' value='yes'";
									if($rules=='yes'){echo ' checked';}
									echo ">Я принимаю условия пользовательского соглашения</span></label><br><a href='http://claus.net.ua/cab/cab3.php?showuserguide' target='_blank'>(читать пользовательское соглашение)</a>
                					<br>";
									
                					if(isset($val11))
									{
										if(!$val11){echo "<div id='cabSmallTxtError'>вы не приняли пользовательское соглашение!</div>";}
									} 
									
									echo
                					"</div>
                					<div><input class='su03' id='show2' name='send' type='submit' value='&#1047;&#1072;&#1088;&#1077;&#1075;&#1080;&#1089;&#1090;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100;&#1089;&#1103;'></div>
                                    </form>";
                                	}
                                	?>
                                
                                <?php include("../patr/bottomfilletcabwrapper.php"); ?>
                
                </div>
            
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
