<?php 
function mailR01($name='PUT_NAME_HERE',$text='PUT_TEXT_HERE')
{
return $fulltext="<style  type='text/css'>#rollh1:hover{background-color:#E7E7E7; cursor:pointer;}</style>
<div style='background-color:#D6D6D6'>
<hr> 
	<h1 style='font-size:16px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'><a  id='rollh1' href='http://claus.net.ua' target='_blank' style='text-decoration:none; color:#8D5B5A;'>RigaardArt-CLAUS.net.ua</a></h1>
    <div style='color:#424242; font-size:14px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'>&#1055;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1100; &#1089; &#1080;&#1084;&#1077;&#1085;&#1077;&#1084; - ".$name." &#1087;&#1080;&#1096;&#1077;&#1090;:</div>
    <p style='background-color:#999999; padding:10px; max-width:600px; margin-left:auto; margin-right:auto; color:#FFC000; font-size:14px; text-align:justify; text-indent: 60px; font-weight:bold; font-family:Verdana, Geneva, sans-serif'>".$text."</p>
<hr>    
</div>";
}

function mailR02($firstname='PUT_FIRSTNAME_HERE',$lastname='PUT_LASTNAME_HERE',$sex='PUT_SEX_HERE',$birthday='PUT_BIRTHDAY_HERE',$country='PUT_COUNTRY_HERE',$city='PUT_CITY_HERE',$email='PUT_EMAIL_HERE',$avatar='http://claus.net.ua?PUT_ADRESS_AVATAR_HERE',$login='PUT_LOGIN_HERE',$pass='PUT_PASSWORD_HERE',$cryptcode='PUT_CRYPTCODE_HERE')
{
	return $fulltext="<style  type='text/css'>#roll:hover{background-color:#868686; cursor:pointer;} #rollh1:hover{background-color:#E7E7E7; cursor:pointer;} #yellow{color:#FFC000;}#yellowa{text-decoration:none; color:#FFC000;}#yellowa:hover{color:#B08500;}</style>
<div style='background-color:#D6D6D6'>
<hr> 
	<h1 style='font-size:16px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'><a  id='rollh1' href='http://claus.net.ua' target='_blank' style='text-decoration:none; color:#8D5B5A;'>RigaardArt-CLAUS.net.ua</a></h1>
    <div style='color:#424242; font-size:14px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'>&#1055;&#1086;&#1083;&#1085;&#1099;&#1077; &#1076;&#1072;&#1085;&#1085;&#1099;&#1077; &#1086; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1077;:</div>
    
    <p style='background-color:#999999; padding:10px; max-width:600px; margin-left:auto; margin-right:auto; color:#ffffff; font-size:14px; text-align:justify; font-weight:bold; font-family:Verdana, Geneva, sans-serif'>
    <span id='roll'>&#1048;&#1084;&#1103;:<span id='yellow' style='padding-left:120px'>".$firstname."</span></span><br>
    <span id='roll'>&#1060;&#1072;&#1084;&#1080;&#1083;&#1080;&#1103;:<span id='yellow' style='padding-left:82px'>".$lastname."</span></span><br>
    <span id='roll'>&#1055;&#1086;&#1083;:<span id='yellow' style='padding-left:121px'>".$sex."</span></span><br>
    <span id='roll'>&#1044;&#1072;&#1090;&#1072; &#1088;&#1086;&#1078;&#1076;&#1077;&#1085;&#1080;&#1103;:<span id='yellow' style='padding-left:27px'>".$birthday."</span></span><br>
    <span id='roll'>&#1057;&#1090;&#1088;&#1072;&#1085;&#1072;:<span id='yellow' style='padding-left:95px'>".$country."</span></span><br>
    <span id='roll'>&#1053;&#1072;&#1089;&#1077;&#1083;&#1077;&#1085;&#1085;&#1099;&#1081; &#1087;&#1091;&#1085;&#1082;&#1090;:<span id='yellow' style='padding-left:2px'>".$city."</span></span><br>
    <span id='roll'>email:<span id='yellow' style='padding-left:112px'>".$email."</span></span><br>
    <span id='roll'>&#1040;&#1074;&#1072;&#1090;&#1072;&#1088;:<span id='yellow' style='padding-left:96px'><a id='yellowa' target='_blank' href='".$avatar."'>смотреть</a></span></span><br>
    <span id='roll'>&#1051;&#1086;&#1075;&#1080;&#1085;:<span id='yellow' style='padding-left:104px'>".$login."</span></span><br>
    <span id='roll'>&#1055;&#1072;&#1088;&#1086;&#1083;&#1100;:<span id='yellow' style='padding-left:93px'>".$pass."</span></span><br>
    </p>
    
    <div style='color:#424242; font-size:10px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'><span><a  id='rollh1' href='http://claus.net.ua/cab/cab1.php?addprereg=".$cryptcode."' target='_blank' style='text-decoration:none; color:#8D5B5A;'>&#1055;&#1056;&#1048;&#1053;&#1071;&#1058;&#1068;</a></span><span style='margin-left:40px;'><a  id='rollh1' href='http://claus.net.ua/cab/cab1.php?delprereg=".$cryptcode."' target='_blank' style='text-decoration:none; color:#8D5B5A;'>&#1054;&#1058;&#1050;&#1051;&#1054;&#1053;&#1048;&#1058;&#1068;</a></span></div>
<hr>    
</div>";
}

function mailR03($cryptcode='PUT_CRYPTCODE_HERE')
{
	return $fulltext="<style  type='text/css'>#rollh1:hover{background-color:#E7E7E7; cursor:pointer;} p{background-color:#999999; padding:10px; max-width:600px; margin-left:auto; margin-right:auto; color:#ffffff; font-size:14px; text-align:justify; font-weight:bold; font-family:Verdana, Geneva, sans-serif} #goto{text-decoration:none; color:#FFC000;} #goto:hover{color:#B08500;}</style>
<div style='background-color:#D6D6D6'>
<hr> 
	<h1 style='font-size:16px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'><a  id='rollh1' href='http://claus.net.ua' target='_blank' style='text-decoration:none; color:#8D5B5A;'>RigaardArt-CLAUS.net.ua</a></h1>
    <div style='background-color:#999999; max-width:600px; margin-left:auto; margin-right:auto'>
    <p style='text-indent: 60px;'>&#1042;&#1072;&#1096;&#1072; &#1079;&#1072;&#1103;&#1074;&#1082;&#1072; &#1085;&#1072; &#1088;&#1077;&#1075;&#1080;&#1089;&#1090;&#1088;&#1072;&#1094;&#1080;&#1102; &#1085;&#1072; &#1089;&#1072;&#1081;&#1090;&#1077; CLAUS.NET.UA &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1086; &#1074;&#1099;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1072;. &#1044;&#1083;&#1103; &#1072;&#1082;&#1090;&#1080;&#1074;&#1072;&#1094;&#1080;&#1080; &#1091;&#1095;&#1077;&#1090;&#1085;&#1086;&#1081; &#1079;&#1072;&#1087;&#1080;&#1089;&#1080; &#1086;&#1073;&#1103;&#1079;&#1072;&#1090;&#1077;&#1083;&#1100;&#1085;&#1086; &#1087;&#1088;&#1086;&#1081;&#1076;&#1080;&#1090;&#1077; &#1087;&#1086; &#1089;&#1089;&#1099;&#1083;&#1082;&#1077;: <a id='goto' target='_blank' href='http://claus.net.ua/cab/cab1.php?activateuser=".$cryptcode."'>http://claus.net.ua/cab/cab1.php</a>.</p><p style='text-indent: 60px;'>&#1055;&#1086;&#1089;&#1083;&#1077; &#1095;&#1077;&#1075;&#1086; &#1074;&#1099; &#1084;&#1086;&#1078;&#1077;&#1090;&#1077; &#1074;&#1086;&#1081;&#1090;&#1080; &#1085;&#1072; &#1089;&#1072;&#1081;&#1090; &#1080;&#1089;&#1087;&#1086;&#1083;&#1100;&#1079;&#1091;&#1103; &#1089;&#1074;&#1086;&#1081; &#1083;&#1086;&#1075;&#1080;&#1085; &#1080; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100;. &#1057;&#1087;&#1072;&#1089;&#1080;&#1073;&#1086; &#1079;&#1072; &#1088;&#1077;&#1075;&#1080;&#1089;&#1090;&#1088;&#1072;&#1094;&#1080;&#1102;.</p><p style='text-indent: 60px;'>&#1057; &#1091;&#1074;&#1072;&#1078;&#1077;&#1085;&#1080;&#1077;&#1084; Rigaard.</p>
    </div>
<hr>    
</div> ";
}

function mailR04()
{
	return $fulltext="<style  type='text/css'>#rollh1:hover{background-color:#E7E7E7; cursor:pointer;}</style>
<div style='background-color:#D6D6D6'>
<hr> 
	<h1 style='font-size:16px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'><a  id='rollh1' href='http://claus.net.ua' target='_blank' style='text-decoration:none; color:#8D5B5A;'>RigaardArt-CLAUS.net.ua</a></h1>
    <p style='background-color:#999999; padding:10px; max-width:600px; margin-left:auto; margin-right:auto; color:#FFC000; font-size:14px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'>&#1042;&#1072;&#1096;&#1072; &#1079;&#1072;&#1103;&#1074;&#1082;&#1072; &#1085;&#1072; &#1088;&#1077;&#1075;&#1080;&#1089;&#1090;&#1088;&#1072;&#1094;&#1080;&#1102; &#1085;&#1072; &#1089;&#1072;&#1081;&#1090;&#1077; CLAUS.NET.UA &#1086;&#1090;&#1082;&#1083;&#1086;&#1085;&#1077;&#1085;&#1072;.</p>
<hr>    
</div>";
}

function mailR05($text='PUT_TEXT_HERE')
{
    $leo=array();$num=array();
    $link01="<a id='yellowa' target='_blank' href='";$link02="'>";$link03='</a>';$n=0;
    for($i=0;$i<strlen($text);$i++)
    {
        if(mb_substr($text,$i,7,'utf8')=='http://'){$k=1;$z1=$i;}
        if($k==1 && mb_substr($text,$i,1,'utf8')!=' '){$mylink.=mb_substr($text,$i,1,'utf8');}
        if($k==1 && mb_substr($text,$i,1,'utf8')==' '){$k=0;$n++; $leo[]=$mylink; $mylink=''; $num[]=$z1;}
    }
    $ind=0;$leo=array_unique($leo);$res='';$j=0;
    foreach($leo as $key)
    {
        $replace=$link01.$key.$link02.$key.$link03;$mysrlen=strlen($key);
        $res.=str_replace($key,$replace,mb_substr($text,$j,$num[$ind]+$mysrlen-$j,'utf8'));
        $j=$num[$ind]+$mysrlen;
        $ind++;
    }
    $text=$res.mb_substr($text,$j,strlen($text),'utf8');
	return $fulltext="<style  type='text/css'>#rollh1:hover{background-color:#E7E7E7; cursor:pointer;}#yellowa{text-decoration:none; color:#FFC000;}#yellowa:hover{color:#B08500;}</style>
<div style='background-color:#D6D6D6'>
<hr> 
	<h1 style='font-size:16px; text-align:center; font-weight:bold; font-family:Verdana, Geneva, sans-serif'><a  id='rollh1' href='http://claus.net.ua' target='_blank' style='text-decoration:none; color:#8D5B5A;'>RigaardArt-CLAUS.net.ua</a></h1>
    <p style='background-color:#999999; padding:10px; max-width:600px; margin-left:auto; margin-right:auto; color:#FFC000; font-size:14px; text-align:justify; text-indent: 60px; font-weight:bold; font-family:Verdana, Geneva, sans-serif'>".$text."</p>
<hr>    
</div>";
}

?>