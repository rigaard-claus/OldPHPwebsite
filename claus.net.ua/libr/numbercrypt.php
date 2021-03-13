<?php
function rewrite($num)
{
	switch($num)
	{
	case 0:$num='z';break;
	case 1:$num='y';break;
	case 2:$num='x';break;
	case 3:$num='w';break;
	case 4:$num='v';break;
	case 5:$num='u';break;
	case 6:$num='9';break;
	case 7:$num='8';break;
	case 8:$num='7';break;
	case 9:$num='6';break;
	case 10:$num='5';break;
	case 11:$num='4';break;
	case 12:$num='3';break;
	case 13:$num='2';break;
	case 14:$num='1';break;
	case 15:$num='0';break;
	}
	return $num;
}
function my_numbercrypt($n='')
{
	$res='';
	do
	{	
		$ost=$n%16;
		$uno=floor($n/16);
		if($uno<16){$res=rewrite($uno).$res;echo 'res='.$res.'<br>';}
		else{$res=rewrite($ost).$res;echo 'res2='.$res.'<br>';}
		if($uno>=16){$n=$uno;}else{$n=0;}
	}
	while($n>=16);
}
?>