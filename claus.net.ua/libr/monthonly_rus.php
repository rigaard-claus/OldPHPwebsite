<?php 
function ruencodingmonth($month='')
{
	switch ($month)
	{
	case '01':
	$month='&#1103;&#1085;&#1074;&#1072;&#1088;&#1103;';
	break;
	
	case '02':
	$month='&#1092;&#1077;&#1074;&#1088;&#1072;&#1083;&#1103;';
	break;
	
	case '03':
	$month='&#1084;&#1072;&#1088;&#1090;&#1072;';
	break;
	
	case '04':
	$month='&#1072;&#1087;&#1088;&#1077;&#1083;&#1103;';
	break;
	
	case '05':
	$month='&#1084;&#1072;&#1103;';
	break;
	
	case '06':
	$month='&#1080;&#1102;&#1085;&#1103;';
	break;
	
	case '07':
	$month='&#1080;&#1102;&#1083;&#1103;';
	break;
	
	case '08':
	$month='&#1072;&#1074;&#1075;&#1091;&#1089;&#1090;&#1072;';
	break;
	
	case '09':
	$month='&#1089;&#1077;&#1085;&#1090;&#1103;&#1073;&#1088;&#1103;';
	break;
	
	case '10':
	$month='&#1086;&#1082;&#1090;&#1103;&#1073;&#1088;&#1103;';
	break;
	
	case '11':
	$month='&#1085;&#1086;&#1103;&#1073;&#1088;&#1103;';
	break;
	
	case '12':
	$month='&#1076;&#1077;&#1082;&#1072;&#1073;&#1088;&#1103;';
	break;	
	}

return $month;
}

function ruencodingmonthreverse($rusmonth='')
{
	switch ($rusmonth)
	{
	case '&#1103;&#1085;&#1074;&#1072;&#1088;&#1103;':
	$number=1;
	break;
	
	case '&#1092;&#1077;&#1074;&#1088;&#1072;&#1083;&#1103;':
	$number=2;
	break;
	
	case '&#1084;&#1072;&#1088;&#1090;&#1072;':
	$number=3;
	break;
	
	case '&#1072;&#1087;&#1088;&#1077;&#1083;&#1103;':
	$number=4;
	break;
	
	case '&#1084;&#1072;&#1103;':
	$number=5;
	break;
	
	case '&#1080;&#1102;&#1085;&#1103;':
	$number=6;
	break;
	
	case '&#1080;&#1102;&#1083;&#1103;':
	$number=7;
	break;
	
	case '&#1072;&#1074;&#1075;&#1091;&#1089;&#1090;&#1072;':
	$number=8;
	break;
	
	case '&#1089;&#1077;&#1085;&#1090;&#1103;&#1073;&#1088;&#1103;':
	$number=9;
	break;
	
	case '&#1086;&#1082;&#1090;&#1103;&#1073;&#1088;&#1103;':
	$number=10;
	break;
	
	case '&#1085;&#1086;&#1103;&#1073;&#1088;&#1103;':
	$number=11;
	break;
	
	case '&#1076;&#1077;&#1082;&#1072;&#1073;&#1088;&#1103;':
	$number=12;
	break;	
	}

return $number;
}

function validdaymonth($newusermonth='',$newuserday=0)
{
	switch ($newusermonth)
	{
	case '&#1092;&#1077;&#1074;&#1088;&#1072;&#1083;&#1103;':
	if($newuserday>29){$newuserday=29;}
	break;
		
	case '&#1072;&#1087;&#1088;&#1077;&#1083;&#1103;':
	if($newuserday==31){$newuserday=30;}
	break;
	
	case '&#1080;&#1102;&#1085;&#1103;':
	if($newuserday==31){$newuserday=30;}
	break;
	
	case '&#1089;&#1077;&#1085;&#1090;&#1103;&#1073;&#1088;&#1103;':
	if($newuserday==31){$newuserday=30;}
	break;
	
	case '&#1085;&#1086;&#1103;&#1073;&#1088;&#1103;':
	if($newuserday==31){$newuserday=30;}
	break;	
	}
	
return $newuserday;
}
?>