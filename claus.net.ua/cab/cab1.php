<?php session_start();
if(isset($_POST['counter'])){if($_POST['counter']>5){require_once('../patr/hack_attempt.php');}}
include("../patr/bdr.php");
if(isset($_POST['send']))
{$SERVER_ROOT = "http://claus.net.ua/cab/cab1.php";
if(isset($_SERVER['HTTP_REFERER'])){if(!preg_match("#^$SERVER_ROOT#",$_SERVER['HTTP_REFERER'])){require_once('../patr/hack_attempt.php');}}}
else{unset($_POST);}
@date_default_timezone_set (date_default_timezone_get());

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

$resultclean=$db->query("SELECT last_cleardate,every_nday FROM autorunr WHERE id_function='clean'");

$res=$db->query("SELECT title,meta_d,meta_k,text FROM general1 WHERE page='cab1'");

if(!$res || !$resultclean){echo "<h2>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</h2> <h3>Описание: "; exit(mysql_error());}

if($res->num_rows>0){$row=$res->fetch_array(MYSQLI_ASSOC);}
else{echo "<h2>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</h2>"; exit();}

if($resultclean->num_rows>0){$rowclean=$resultclean->fetch_array(MYSQLI_ASSOC);}
else{echo "<h2>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</h2>"; exit();}

$curd=date('Ymd');
if($curd-$rowclean['last_cleardate']>$rowclean['every_nday'])
{
    $userpiclistr=array();
    $readforclean3=$db->query("SELECT userpic FROM preauthorisationr");
    if($readforclean3->num_rows>0)
    {
        $rowforclean3=$readforclean3->fetch_array(MYSQLI_ASSOC);
        do
        {
            $pictmp=mb_substr($rowforclean3['userpic'],33,strlen($rowforclean3['userpic'])-33,'utf8');
            if($pictmp!='defaultmale.png' && $pictmp!='defaultfemale.png' && $pictmp!='riora3.png')
            {
                $userpiclistr[]=$pictmp;
            }
        }
        while($rowforclean3=$readforclean3->fetch_array(MYSQLI_ASSOC));    
    }
                                
    $readforclean4=$db->query("SELECT userpic FROM authorisationr");
    if($readforclean4->num_rows>0)
    {
        $rowforclean4=$readforclean4->fetch_array(MYSQLI_ASSOC);
        do
        {
            $pictmp=mb_substr($rowforclean4['userpic'],33,strlen($rowforclean4['userpic'])-33,'utf8');
            if($pictmp!='defaultmale.png' && $pictmp!='defaultfemale.png' && $pictmp!='riora3.png')
            {
            $userpiclistr[]=$pictmp;
            }
        }
        while($rowforclean4=$readforclean4->fetch_array(MYSQLI_ASSOC));    
    }
                                
    $dh2 = opendir($_SERVER['DOCUMENT_ROOT'].'/imgr/userpic/');
    $filecheck3=array();
    while($filename2 = readdir($dh2))
    {
        if($filename2!='.' && $filename2!='..' && $filename2!='tmpr' && $filename2!='index.html' && $filename2!='defaultfemale.png' && $filename2!='defaultmale.png')
        {
            $filecheck3[]=$filename2;
        }
    }
                                
    $filecheck4=array();
    foreach($filecheck3 as $check2)
    {
        if(date('Ymd')-mb_substr($check2,0,8,'utf8')>1){$filecheck4[]=$check2;}
    }
    unset($filecheck3);
                                
    $deletepic2=array_diff($filecheck4,$userpiclistr);
    unset($filecheck4);
    unset($userpiclistr);
    foreach($deletepic2 as $del2)
    {
        $picpath2=$_SERVER['DOCUMENT_ROOT'].'/imgr/userpic/'.$del2;
        if(file_exists($picpath2)){unlink($picpath2);}
    }
    unset($deletepic2);
    
    $db->query("UPDATE autorunr SET last_cleardate='$curd' WHERE id_function='clean'");
}

$greyauthorisation='hide';

if(isset($_POST['login']))
{
	$login=$_POST['login'];
	$login=trim($login);
	$login=stripslashes($login);
	$login=htmlspecialchars($login);
}
if(isset($_POST['pass']))
{
	$pass=$_POST['pass'];
	include("../patr/write_session.php");
}

if(isset($_GET['addprereg'])){$addprereg=$_GET['addprereg'];}
if(isset($_GET['delprereg'])){$delprereg=$_GET['delprereg'];}

if(isset($_GET['clean'])){$clean=$_GET['clean'];}

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
<img id="im04" src="http://claus.net.ua/imgr/arrow1.gif">

<?php include("../patr/headr.php"); ?>
  
<table class="tabB" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tdL">
        
			<?php include("../patr/lefmr.php"); ?>
            
       	</td>

        <td rowspan="2" class="tdC">
        
        	<?php include("../patr/cnttr.php"); require_once('../patr/save_ses.php');?>
            
				<div class="text01"><?php if (!isset($_SESSION['seslevel'])||$_SESSION['seslevel']==0||$_SESSION['sesactivated']==0){echo $row['text'];} 
                
                    if(isset($_GET['activateuser']) && $_GET['activateuser']!='')
                    {
                        $activateuser=$_GET['activateuser'];
                        $activateread1=$db->query("SELECT activated FROM authorisationr WHERE password='$activateuser'");
                        $activaterow1=$activateread1->fetch_array(MYSQLI_ASSOC);
                        if($activaterow1['activated']=='0')
                        {
                            $activateread=$db->query("UPDATE authorisationr SET activated='1' WHERE password='$activateuser'");
                            if($activateread)
                            {
                                include("../patr/topfilletcabwrapper.php");
    				            echo "<div id='cabInformationTxt2'>Ваша учетная запись активна.<br>Используйте для входа свой логин и пароль.</div>";
    				            include("../patr/bottomfilletcabwrapper.php");
                            }
                        }
                        else 
                        {echo "<meta http-equiv='refresh' content='0;url=http://claus.net.ua/cab/cab1.php'>";}
                    }
                    elseif(isset($addprereg))
						{
							$resread=$db->query("SELECT firstname,lastname,userpic,login,password,date,time,man,age,mail,showmail,country,city FROM preauthorisationr WHERE password='$addprereg'");
							if($resread->num_rows>0)
							{
							$rowread=$resread->fetch_array(MYSQLI_ASSOC);
							$adduser=$db->query("INSERT INTO authorisationr (firstname,lastname,userpic,login,password,date,time,man,age,mail,showmail,country,city) VALUES('$rowread[firstname]','$rowread[lastname]','$rowread[userpic]','$rowread[login]','$rowread[password]','$rowread[date]','$rowread[time]','$rowread[man]','$rowread[age]','$rowread[mail]','$rowread[showmail]','$rowread[country]','$rowread[city]')");
							if($adduser)
							{
		                        require_once('../libr/html_mail.php');
								mail($rowread['mail'],"Регистрация CLAUS.NET.UA",mailR03($addprereg), 'From:'."admin@claus.net.ua"."\r\n"."MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8");
								$delpreuser=$db->query("DELETE FROM preauthorisationr WHERE  password='$addprereg'");
								if($delpreuser)
								{
								echo "<div id='cabInformationAdminTxt'>Пользователь успешно внесен в основную базу.</div>";
								}
								else{echo"<div id='cabInformationErrorTxt'>Произошла ошибка операции. Данные не были удалены из промежуточной базы.</div>";}
							}
							else{echo"<div id='cabInformationErrorTxt'>Произошла ошибка операции. Пользователь не был внесен в базу.</div>";}
							}
							else{echo"<div id='cabInformationErrorTxt'>Пользователь с заданным идентификатором отсутствует в базе. Возможно данные были перемещены в основную базу или удалены.</div>";}
						}
					elseif(isset($delprereg))
						{
							    $delread=$db->query("SELECT mail FROM preauthorisationr WHERE password='$delprereg'");
								if($delread->num_rows>0)
								{
									$userdeleted=$delread->fetch_array(MYSQLI_ASSOC);
                                    require_once('../libr/html_mail.php');
									mail($userdeleted['mail'], "В регистрации отказано CLAUS.NET.UA",mailR04(), 'From:'."admin@claus.net.ua"."\r\n"."MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8");
								$delete=$db->query("DELETE FROM preauthorisationr WHERE  password='$delprereg'");
								if($delete)
								{
								echo "<div id='cabInformationAdminTxt'>Пользователь удален из промежуточной базы.</div>";
								
								}
								else{echo"<div id='cabInformationErrorTxt'>Произошла ошибка операции. Данные не были удалены из промежуточной базы.</div>";}
								}
								else{echo"<div id='cabInformationErrorTxt'>Пользователь с заданным идентификатором отсутствует в базе. Возможно данные уже были удалены.</div>";}
						}
                    elseif(isset($clean))
                        {
                            if($clean=='pic')
                            {
                                $userpiclist=array();
                                
                                $readforclean1=$db->query("SELECT userpic FROM preauthorisationr");
                                if($readforclean1->num_rows>0)
                                {
                                $rowforclean1=$readforclean1->fetch_array(MYSQLI_ASSOC);
                                do
                                {
                                    $pictmp=mb_substr($rowforclean1['userpic'],33,strlen($rowforclean1['userpic'])-33,'utf8');
                                    if($pictmp!='defaultmale.png' && $pictmp!='defaultfemale.png' && $pictmp!='riora3.png')
                                        {
                                        $userpiclist[]=$pictmp;
                                        }
                                }
                                while($rowforclean1=$readforclean1->fetch_array(MYSQLI_ASSOC));    
                                }
                                
                                $readforclean2=$db->query("SELECT userpic FROM authorisationr");
                                if($readforclean2->num_rows>0)
                                {
                                $rowforclean2=$readforclean2->fetch_array(MYSQLI_ASSOC);
                                do
                                {
                                    $pictmp=mb_substr($rowforclean2['userpic'],33,strlen($rowforclean2['userpic'])-33,'utf8');
                                    if($pictmp!='defaultmale.png' && $pictmp!='defaultfemale.png' && $pictmp!='riora3.png')
                                    {
                                    $userpiclist[]=$pictmp;
                                    }
                                }
                                while($rowforclean2=$readforclean2->fetch_array(MYSQLI_ASSOC));    
                                }
                                
                                echo "<div id='cabInformationAdminTxt'>Данные по запросу:</div>";
                                echo "<div id='cabInformationAdminTxtLeft'>найдено в базе:<br><ol>";
                                foreach($userpiclist as $key)
                                {
                                    echo "<li><span id='brownMarker'>".$key."</span></li>";
                                }
                                echo "</ol></div>";
                                
                                echo "<div id='cabInformationAdminTxtLeft'>найдено в директории userpic:<br><ol>";
                                $dh = opendir($_SERVER['DOCUMENT_ROOT'].'/imgr/userpic/');
                                $filecheck=array();
                                while($filename = readdir($dh))
                                {
                                    if($filename!='.' && $filename!='..' && $filename!='tmpr' && $filename!='index.html' && $filename!='defaultfemale.png' && $filename!='defaultmale.png')
                                    {
                                    echo "<li><span id='blueMarker'>".$filename."<span></li>";
                                    $filecheck[]=$filename;
                                    }
                                }
                                echo "</ol></div>";
                                
                                $filecheck2=array();
                                foreach($filecheck as $check)
                                {
                                    if(date('Ymd')-mb_substr($check,0,8,'utf8')>1){$filecheck2[]=$check;}
                                }
                                unset($filecheck);
                                
                                $deletepic=array_diff($filecheck2,$userpiclist);
                                $num=0;
                                unset($filecheck2);
                                unset($userpiclist);
                                echo "<div id='cabInformationAdminTxtLeft'>Удалено: <span id='redMarker'>";
                                foreach($deletepic as $del)
                                {
                                    $num++;
                                    $picpath=$_SERVER['DOCUMENT_ROOT'].'/imgr/userpic/'.$del;
                                    if(file_exists($picpath)){unlink($picpath);}
                                }
                                echo $num."</span> шт.</div>";
                                if($num>0)
                                {
                                    echo "<div id='cabInformationAdminTxtLeft'>список удаленных файлов:<br><ol>";
                                    foreach($deletepic as $key)
                                    {
                                        echo "<li><span id='redMarker'>".$key."</span></li>";
                                    }
                                    echo "</ol></div>";
                                }
                            }
                            else{echo"<div id='cabInformationErrorTxt'>Функция <span>clean</span> не получила идентификатор.</div>";}
                        }
                    else
					{
						if(isset($_SESSION['seslogin']))
						{
							if(!isset($_SESSION['seslevel']))
							{
								include("../patr/topfilletcabwrapper.php");
								echo "<div id='cabInformationTxt2'>Ваша заявка на<br>регистрацию ожидает подтверждения.<br>Если с момента отправки заявки прошло<br>более трех суток - свяжитесь с администратором:<br><a href='mailto:admin@claus.net.ua'>admin@claus.net.ua</a>, либо через форму <a href='http://claus.net.ua/contact.php'>обратной связи</a>.</div>";
								include("../patr/bottomfilletcabwrapper.php");
								session_destroy();
							}
                            elseif($_SESSION['sesactivated']==0)
                            {
                                include("../patr/topfilletcabwrapper.php");
								echo "<div id='cabInformationTxt'>Учетная запись не активна. Для активации учетной записи была отослана ссылка активации на адрес: ".$_SESSION['sesrequestmail']." . Для корректной регистрации указывайте существующие email адреса.</div>";
								include("../patr/bottomfilletcabwrapper.php");
                                session_destroy();
                            }
							elseif($_SESSION['seslevel']==0)
							{
								include("../patr/topfilletcabwrapper.php");
								echo "<div id='cabInformationTxt'>У вас обычный уровень доступа. Для просмотра личного содержимого автора вам нужны привелегии уровня 1 или выше. По умолчанию при регистрации вам выданы привелегии уровня 0. Если вы являетесь моим другом и я забыл вам дать нужные права доступа - сообщите мне об этом лично :)</div>";
								include("../patr/bottomfilletcabwrapper.php");
							}
							elseif(isset($_SESSION['seslevel']))
							{
								// сюда код для юзеров с высоким уровнем доступа!!!
							}
						}
						else{
						echo
					"<div id='cabAuthorisationWrapper'>
                    	
                        <img id='filletAuthorisationLT' src='http://claus.net.ua/cab/cimg/yellowLeftTop.png'>
                        <img id='filletAuthorisationRT' src='http://claus.net.ua/cab/cimg/yellowRightTop.png'>
                        <img id='filletAuthorisationLB' src='http://claus.net.ua/cab/cimg/yellowLeftBottom.png'>
                        <img id='filletAuthorisationRB' src='http://claus.net.ua/cab/cimg/yellowRightBottom.png'>
                        <div id='leftStrokeAuthorisation'></div><div id='rightStrokeAuthorisation'></div>
                        <div id='setRegistration'><br><a href='http://claus.net.ua/cab/cab2.php'>Регистрация</a></div>
                        
                            <div id='cabAuthorisationContentWrapper01'>
                                <div id='cabAuthorisationContentWrapper02'>
                                	
                                    <form action='cab1.php#show2' method='post' name='form1'>
									<input name='counter' type='hidden' value='";
									echo $_POST['counter']+1;
									echo "'>
                                    <div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Логин:</span><br><input id='textinput' name='login' type='text' size='14' maxlength='40' value='";
									//echo $login; -- поправить сессию
									echo
									"'></label></div>
				<div id='cabLoginDiv'><label id='lab01'><span id='cabLoginTxt'>Пароль:</span><br><input id='textinput' name='pass' type='password' size='14' maxlength='40' value=''></label></div>
                					<div><input class='su03' id='show2' name='send' type='submit' value='&#1042;&#1093;&#1086;&#1076;'>
                                    </div>
                                     
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        
                    </div>";
						}
					}
                    ?>
                
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