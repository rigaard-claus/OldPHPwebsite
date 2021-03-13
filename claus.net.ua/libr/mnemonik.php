<?php
function mnemocodding($str='')
{

	for($i=0;$i<strlen($str);$i++)
	{
		$n=mb_substr($str,$i,1,'utf8');
		switch($n)
		{
			case 'а':$n='&#1072;';break;
			case 'А':$n='&#1040;';break;
			case 'б':$n='&#1073;';break;
			case 'Б':$n='&#1041;';break;
			case 'в':$n='&#1074;';break;
			case 'В':$n='&#1042;';break;
			case 'г':$n='&#1075;';break;
			case 'Г':$n='&#1043;';break;
			case 'д':$n='&#1076;';break;
			case 'Д':$n='&#1044;';break;
			case 'е':$n='&#1077;';break;
			case 'Е':$n='&#1045;';break;
			case 'ж':$n='&#1078;';break;
			case 'Ж':$n='&#1046;';break;
			case 'з':$n='&#1079;';break;
			case 'З':$n='&#1047;';break;
			case 'и':$n='&#1080;';break;
			case 'И':$n='&#1048;';break;
			case 'й':$n='&#1081;';break;
			case 'Й':$n='&#1049;';break;
			case 'к':$n='&#1082;';break;
			case 'К':$n='&#1050;';break;
			case 'л':$n='&#1083;';break;
			case 'Л':$n='&#1051;';break;
			case 'м':$n='&#1084;';break;
			case 'М':$n='&#1052;';break;
			case 'н':$n='&#1085;';break;
			case 'Н':$n='&#1053;';break;
			case 'о':$n='&#1086;';break;
			case 'О':$n='&#1054;';break;
			case 'п':$n='&#1087;';break;
			case 'П':$n='&#1055;';break;
			case 'р':$n='&#1088;';break;
			case 'Р':$n='&#1056;';break;
			case 'с':$n='&#1089;';break;
			case 'С':$n='&#1057;';break;
			case 'т':$n='&#1090;';break;
			case 'Т':$n='&#1058;';break;
			case 'у':$n='&#1091;';break;
			case 'У':$n='&#1059;';break;
			case 'ф':$n='&#1092;';break;
			case 'Ф':$n='&#1060;';break;
			case 'х':$n='&#1093;';break;
			case 'Х':$n='&#1061;';break;
			case 'ц':$n='&#1094;';break;
			case 'Ц':$n='&#1062;';break;
			case 'ч':$n='&#1095;';break;
			case 'Ч':$n='&#1063;';break;
			case 'ш':$n='&#1096;';break;
			case 'Ш':$n='&#1064;';break;
			case 'щ':$n='&#1097;';break;
			case 'Щ':$n='&#1065;';break;
			case 'ъ':$n='&#1098;';break;
			case 'Ъ':$n='&#1066;';break;
			case 'ы':$n='&#1099;';break;
			case 'Ы':$n='&#1067;';break;
			case 'ь':$n='&#1100;';break;
			case 'Ь':$n='&#1068;';break;
			case 'э':$n='&#1101;';break;
			case 'Э':$n='&#1069;';break;
			case 'ю':$n='&#1102;';break;
			case 'Ю':$n='&#1070;';break;
			case 'я':$n='&#1103;';break;
			case 'Я':$n='&#1071;';break;
			case 'ё':$n='&#1105;';break;
			case 'Ё':$n='&#1025;';break;
		}
		$res.=$n;
	
	}
	
	return $res;
	
}
?>