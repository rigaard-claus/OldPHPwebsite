<?php 
function myencryption($phrase='',$leter,$number)
{
	$phrase=md5($phrase);
	$phrase=reversestring($phrase);
	$num1=floor($number*0.01);
	$num2=floor(($number-$num1*100)*0.1);
	$num3=$number-$num1*100-$num2*10;
	$len1=strlen($leter);
	for($i=0;$i<$len1;$i++)
	{
		$cr01+=($num1+$i)+($num2+$i*$i)+($num3+($i+$i)*$i);
		$let=mb_substr($leter,$i,1,'utf8');
		$let=trim($let);
		switch($let)
		{
			case 'a':$cr02='uv1';break;
			case 'b':$cr02='uu3';break;
			case 'c':$cr02='uu1';break;
			case 'd':$cr02='uuw';break;
			case 'e':$cr02='uu9';break;
			case 'f':$cr02='u9z';break;
			case 'g':$cr02='uuz';break;
			case 'h':$cr02='uu7';break;
			case 'i':$cr02='u9y';break;
			case 'j':$cr02='u9v';break;
			case 'k':$cr02='uuy';break;
			case 'l':$cr02='u9w';break;
			case 'm':$cr02='u9u';break;
			case 'n':$cr02='u99';break;
			case 'o':$cr02='uv0';break;
			case 'p':$cr02='u9x';break;
			case 'q':$cr02='uu8';break;
			case 'r':$cr02='uu2';break;
			case 's':$cr02='uux';break;
			case 't':$cr02='u98';break;
			case 'u':$cr02='uu6';break;
			case 'v':$cr02='uu4';break;
			case 'w':$cr02='uu5';break;
			case 'x':$cr02='uuv';break;
			case 'y':$cr02='uu0';break;
			case 'z':$cr02='uuu';break;
			case 'A':$cr02='u96';break;
			case 'B':$cr02='u8z';break;
			case 'C':$cr02='u91';break;
			case 'D':$cr02='u93';break;
			case 'E':$cr02='u88';break;
			case 'F':$cr02='u85';break;
			case 'G':$cr02='u8x';break;
			case 'H':$cr02='u8u';break;
			case 'I':$cr02='u84';break;
			case 'J':$cr02='u95';break;
			case 'K':$cr02='u83';break;
			case 'L':$cr02='u8w';break;
			case 'M':$cr02='u82';break;
			case 'N':$cr02='u86';break;
			case 'O':$cr02='u97';break;
			case 'P':$cr02='u81';break;
			case 'Q':$cr02='u80';break;
			case 'R':$cr02='u89';break;
			case 'S':$cr02='u8v';break;
			case 'T':$cr02='u90';break;
			case 'U':$cr02='u94';break;
			case 'V':$cr02='u7z';break;
			case 'W':$cr02='u87';break;
			case 'X':$cr02='u7y';break;
			case 'Y':$cr02='u8y';break;
			case 'Z':$cr02='u92';break;
		}
		$cr03.=$cr02;
	}
	for($i=0;$i<strlen($cr01);$i++)
	{
		$cr02=mb_substr($cr01,$i,1,'utf8');
		$cr03=substr_replace($cr03,$cr02,$i*2,0);
	}
		if(strlen($phrase)>strlen($cr03))
			{
				for($i=0;$i<strlen($cr03);$i++)
				{
					$cr04=mb_substr($cr03,$i,1,'utf8');
					$phrase=substr_replace($phrase,$cr04,$i*2+2,0);
				}
				$result=$phrase;
			}
		else
			{
				for($i=0;$i<strlen($phrase);$i++)
				{
					$cr05=mb_substr($phrase,$i,1,'utf8');
					$cr03=substr_replace($cr03,$cr05,$i*2+1,0);
				}
				$result=$cr03;
			}
return $result;
}
function reversestring($str)
{
	for($i=0;$i<strlen($str);$i++)
	{
		$newstr=mb_substr($str,$i,1,'utf8').$newstr;
	}
	return $newstr;
}
?>