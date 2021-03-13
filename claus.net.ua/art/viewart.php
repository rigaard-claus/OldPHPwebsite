<?php session_start();
include("../patr/bdr.php");

$db->query ("set character_set_client='utf8'");
$db->query ("set character_set_results='utf8'");
$db->query ("set collation_connection='utf8_general_ci'");

?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title></title>
<link rel='icon' href='http://claus.net.ua/favicon.ico' type='image/x-icon'>
<link rel='shortcut icon' href='http://claus.net.ua/favicon.ico' type='image/x-icon'>
<link href='http://claus.net.ua/cssr/rstyle01.css' rel='stylesheet' type='text/css'>
<link href='http://claus.net.ua/cssr/rstyle02.css' rel='stylesheet' type='text/css'>
<link href='http://claus.net.ua/cssr/rstyle03.css' rel='stylesheet' type='text/css'>
<script src="http://claus.net.ua/Scripts/R01.js" type="text/javascript"></script>
<script src="http://claus.net.ua/Scripts/TextArea01.js" type="text/javascript"></script>
</head>
<body onLoad="MM_preloadImages(
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonLeftOver_03.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonLeftDown_03.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonLeftOver_02.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonLeftDown_02.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonCenterOver_01.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonCenterDown_01.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonRightOver_02.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonRightDown_02.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonRightOver_03.jpg',
'http://claus.net.ua/art/aimg/avwr/navr/brownButtonRightDown_03.jpg',
'http://claus.net.ua/art/aimg/avwr/btnLeftOver.png',
'http://claus.net.ua/art/aimg/avwr/btnLeftDown.png',
'http://claus.net.ua/art/aimg/avwr/btnRightOver.png',
'http://claus.net.ua/art/aimg/avwr/btnRightDown.png')">

<div id='borderWrapper'>
<div id='contentWrapper'>
<div id='addGreyWrapper'>
<div id='addMargin10'></div>
<div id='addGreyBorderTop'>
    <img id='addGreyImg01' src='http://claus.net.ua/art/aimg/avwr/leftTop.png'>
    <img id='addGreyImg02' src='http://claus.net.ua/art/aimg/avwr/rightTop.png'>
    <div id='addGreyStrokeTop'></div>
</div>

<div id='addGreyStrokeLeft'></div>
<div id='addGreyStrokeRight'></div>

    <div id='addImg01'>
    <img id='addFillGrayTitle' src='http://claus.net.ua/art/aimg/avwr/greyTitle.png'>
    
    	<img src='http://claus.net.ua/art/aimg/avwr/btnLeft.png' width="29" height="40" id='addLeftBtn' onMouseDown="MM_swapImage('addLeftBtn','','http://claus.net.ua/art/aimg/avwr/btnLeftDown.png',1)" onMouseOver="MM_swapImage('addLeftBtn','','http://claus.net.ua/art/aimg/avwr/btnLeftOver.png',1)" onMouseOut="MM_swapImgRestore()">
        <img src='http://claus.net.ua/art/aimg/avwr/btnRight.png' width="29" height="40" id='addRightBtn' onMouseDown="MM_swapImage('addRightBtn','','http://claus.net.ua/art/aimg/avwr/btnRightDown.png',1)" onMouseOver="MM_swapImage('addRightBtn','','http://claus.net.ua/art/aimg/avwr/btnRightOver.png',1)" onMouseOut="MM_swapImgRestore()">
        
    <div id='addGreyTitle'><span id='addTitleText'>Название рисунка</span></div>
    
    	<img src='aimg/01/big/b007.jpg'>
    
    </div>
   		<div id='addGreyToolbar'>
        
     		<?php include("../patr/gnavr.php"); ?>
            
            <img id='fillGrey2'src='http://claus.net.ua/art/aimg/avwr/greyFill.jpg'>
                <div id='addGreyContent'>
                	<span id='addGreyContentTxt'>Автор: </span><span id='addGreyContentAuthor'>Rigaard</span><br>
                    <span id='addGreyContentViews'>Дата: 26 октября 2011 11:40</span><br>
                    <span id='addGreyContentViews'>Комментариев: 0</span><br>
                    <span id='addGreyContentViews'>Просмотров: 0</span>
                </div>
                
                <div id='addGrayStroke'></div>
                <img id='addGrayCircle' src='http://claus.net.ua/art/aimg/avwr/greyCircle2.png'>
                <img id='addMainR' src='http://claus.net.ua/art/aimg/avwr/main.png'>
                <img id='fillGreyLeft3' src='http://claus.net.ua/art/aimg/avwr/greyFilletLeft3.png'>
                <img id='fillGreyRight3' src='http://claus.net.ua/art/aimg/avwr/greyFilletRight3.png'>
                <div id='addDisplay'></div>
                
            <div id='addGreyFlyNumber01'><span id='flyNumberTxt01'>998</span></div>
            <div id='addGreyFlyNumber02'><span id='flyNumberTxt02'>997</span></div>
            <div id='addGreyFlyNumber03'><span id='flyNumberTxt03'>996</span></div>
            <div id='addGreyFlyNumber04'><span id='flyNumberTxt02'>999</span></div>
            <div id='addGreyFlyNumber05'><span id='flyNumberTxt03'>999</span></div>
    
  		</div>

<div id='addGreyBorderBottom'>
    <img id='addGreyImg03' src='http://claus.net.ua/art/aimg/avwr/leftBottom.png'>
    <img id='addGreyImg04' src='http://claus.net.ua/art/aimg/avwr/rightBottom.png'>
    <div id='addGreyStrokeBottom'></div>
</div>
<div id='addMargin10'></div>

	<div id='addCommentWrapper'>
    
    	<div id='papperWrapper'>
         
    		<?php include("../patr/comtr.php"); ?>
        
    		<div class='text01'>
            	
            	<div id='titleCommentsDiv'><span id='titleComments'>Написать новый комментарий</span></div>
                <form action="viewart.php#show1" method="post" name="form1">
                <div class="area01"><textarea id="atext" name="atext" cols="64" rows="4"  onclick="length_check(10000, 'atext', 'counter')" onkeyup="length_check(10000, 'atext', 'counter')"><?php echo $atext; ?></textarea></div></label>
<div id="sp01">
Осталось символов: <span id="counter">10000 / 10000</span>
				<?php 
				@date_default_timezone_set (date_default_timezone_get()); 
				$xid=ceil((date('s')+1)/4);				
				$res2=$db->query("SELECT img FROM antispamr WHERE id=$xid");
					if(!$res2){echo "<p class='error'>Запрос не может быть выполнен. Ошибка соединения с базой данных. Сообщите об этом администратору admin@claus.net.ua</p>";}
	
					if($res2->num_rows>0)
					{
					$row2=$res2->fetch_array(MYSQLI_ASSOC);
					}
					else{echo "<p class='error'>Запрос не может быть выполнен. В базе данных отсутствуют записи. Сообщите об этом администратору admin@claus.net.ua</p>";}
				printf ("<div class='box01'>
				<p><label id='lab01'><span id='titleComments'>Введите слово с картинки:</span><input id='textinput' name='ant' type='text' size='16' maxlength='20'></label></p><img id='genant' src='%s'>
				</div>
				
				<div class='box02'>
				<input class='su03' id='show1' name='send' type='submit' value='&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;'>
				</div>
				<input name='rowd' type='hidden' value='$xid'>
				</form>",$row2['img']);
				?>
            
            </div>
            
            <?php include("../patr/combr.php"); ?>   
        
        </div>
        
    </div>

</div>
</div>
</div>

</body>
</html>
