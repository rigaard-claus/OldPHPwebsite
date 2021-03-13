<?php
require_once('my_crypt.php');

function idsessiongen()
{
	return myencryption(randomphraseeng(10),randomphraseeng(10),'789');
}

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