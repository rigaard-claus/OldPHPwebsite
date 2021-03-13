<?php 
function scriptname($urlname='')
{
	for($i=0;$i<strlen($urlname);$i++)
	{
		if(mb_substr($urlname,$i,1,'utf8')=='/'||mb_substr($urlname,$i,1,'utf8')=='\\')
		{
			$name=mb_substr($urlname,$i+1,strlen($urlname),'utf8');
		}
	}
	return $name;
}
?>