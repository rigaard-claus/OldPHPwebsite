<?php
function avatarresize($img,$newimg,$w,$h,$Rcolor=0,$Gcolor=0,$Bcolor=0)
{
	list($img_width,$img_height,$extn)=getimagesize($img);
	if (!$img_width || !$img_height) {return;}
	$all=array('','gif','jpeg','png');
	$newextn=$all[$extn];
	if($newextn){$func='imagecreatefrom'.$newextn; $img=$func($img);}else{return;}
    
    if($img_width>$w || $img_height>$h)
    {
    if($img_height>$img_width){$w=$w/($img_height/$img_width);}
    if($img_height<$img_width){$h=$h/($img_width/$img_height);}
    }
    else {$w=$img_width;$h=$img_height;}
    
	$imgn=imagecreatetruecolor($w,$h);
    if ($extn == 3) 
    {
    	imagesavealpha($imgn, true);
    	$trans_colour = imagecolorallocatealpha($imgn, 0, 0, 0, 127);
    	imagefill($imgn, 0, 0, $trans_colour);
    }
    else
    {
        $trans_colour = imagecolorallocate($imgn, $Rcolor, $Gcolor, $Bcolor);
        imagefill($imgn, 0, 0, $trans_colour);
    }
	imagecopyresampled($imgn,$img,0,0,0,0,$w,$h,$img_width,$img_height);
	if ($extn == 2){return imagejpeg($imgn,$newimg,100);} 
	else {$func = 'image'.$newextn; return $func($imgn,$newimg);
	}
}
?>