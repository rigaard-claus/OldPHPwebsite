                <div class="rightD00">
            	<div class="rightD01">

                <img src="http://claus.net.ua/imgr/Wit01.png">
                </div>
                
                 <?php
                 
                require_once('save_ses.php');
				if($greyauthorisation!='hide')
				{
				echo
                "<div id='greyAuthorisationBlock'>
                <img id='addGreyBlockImg01' src='http://claus.net.ua/art/aimg/avwr/leftTop.png'>
    			<img id='addGreyBlockImg02' src='http://claus.net.ua/art/aimg/avwr/rightTop.png'>
                <img id='addGreyBlockImg03' src='http://claus.net.ua/art/aimg/avwr/leftBottom.png'>
    			<img id='addGreyBlockImg04' src='http://claus.net.ua/art/aimg/avwr/rightBottom.png'>
                <div id='addGreyBlockImg05'></div>
                <div id='addGreyBlockImg06'></div>
                <div id='addGreyBlockImg07'></div>
                <div id='addGreyBlockImg08'></div>
                <div id='setGreyRegistration'><br><a href='http://claus.net.ua/cab/cab2.php'>Регистрация</a></div>
               	<div id='addGreyBlockFrameBrown'>";
				if($_POST['counter']<6 && !isset($_SESSION['seslogin']))
				{
                	echo
				"<form action='' method='post' name='form2'>
									<input name='counter' type='hidden' value='";
									echo $_POST['counter']+1;
									echo 
									"'>
                                    <div id='greyLoginDiv'><label id='lab01'><span id='greyLoginTxt'>&#1051;&#1086;&#1075;&#1080;&#1085;:</span><br><input id='textinput' name='login' type='text' size='12' maxlength='40' value='";
									echo $_POST['login'];
									echo 
									"'></label></div>
				<div id='greyLoginDiv'><label id='lab01'><span id='greyLoginTxt'>&#1055;&#1072;&#1088;&#1086;&#1083;&#1100;:</span><br><input id='textinput' name='pass' type='password' size='12' maxlength='40' value=''></label></div>
                					<div id='greyLoginDiv'><input class='su03grey' id='show2' name='sendgreyform' type='submit' value='&#1042;&#1093;&#1086;&#1076;'></div>
                                    </form>";
				}
                elseif($_POST['counter']>=6 &&  !isset($_SESSION['seslogin']))
                {
                    echo "<div id='greyLoginDivError'><br><img src='http://claus.net.ua/imgr/indr/warriora3.png'><br><br>hack attempt !!!</div>";
                }
				else
				{
					if(!isset($_SESSION['seslevel']) && isset($_SESSION['seslogin'])){echo "<meta http-equiv='refresh' content='0;url=http://claus.net.ua/cab/cab1.php'>";}
                    if($_SESSION['sesactivated']=='0' && isset($_SESSION['seslogin'])){echo "<meta http-equiv='refresh' content='0;url=http://claus.net.ua/cab/cab1.php'>";}
                    if(isset($_SESSION['seslevel']) && isset($_SESSION['seslogin']))
                    {
                        /*Авторизированный пользователь*/
                        echo "<form action='' method='post' name='form2'>";
                        echo "<div id='greyLoginDiv'><img src='";
                        echo $_SESSION['sesuserpic'];
                        echo "' alt='userpic'></div><div id='greyLoginDivUser'>";
                        echo $_SESSION['seslogin']; 
                        echo "</div><div id='greyLoginDivUserTxt'>Возраст - ";
                        @date_default_timezone_set (date_default_timezone_get());
                        $currentdate_user=date('Ymd');
                        $user_day=substr($_SESSION['sesage'],8,2);
                        $user_month=substr($_SESSION['sesage'],5,2);
                        $user_year=substr($_SESSION['sesage'],0,4);
                        $user_age=$user_year.$user_month.$user_day;
                        $result_age=$currentdate_user-$user_age;
                        $result_age=substr($result_age,0,2);
                        echo $result_age;
                        echo "<br>";
                        echo $_SESSION['sescountry'];
                        echo "</div>
                        <div id='greyLoginDivUser'><input class='su03grey' id='show3' name='exit' type='submit' value='&#1042;&#1067;&#1061;&#1054;&#1044;'></div>
                        </form>";
                    }
				}
				echo
				"</div>               
                </div>";
				}
                 ?>
                
                <div class="rightD02">
                  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','100','height','320','src','http://claus.net.ua/swfr/01','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','http://claus.net.ua/swfr/01' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="100" height="320">
                    <param name="movie" value="http://claus.net.ua/swfr/01.swf">
                    <param name="quality" value="high">
                    <embed src="http://claus.net.ua/swfr/01.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="320"></embed>
                  </object>
                </noscript>
                </div>
</div>