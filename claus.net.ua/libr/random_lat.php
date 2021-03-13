<?php
function randomphraseeng($length=0)
{
	$random='';
	$values="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for($i=0;$i<$length;$i++)
	  {
		$random.=$values[rand(0,51)];
	  }
	return $random;	
}
?>