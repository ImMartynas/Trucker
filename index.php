
<?php
//if (!$query) die(mysql_error());
require '/include/config.php';
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Furistai - naršyklinis žaidimas</title>
<meta name="keywords" content="furistai, dot.tk, tk, idomu, online, TV, furistai.eu, facebook, google, youtube, demotyvacija, žaidimas, žaidimai" />
<meta name="description" content="Naršyklinis furistų žaidimas, jame turite vežioti krovinius uždirbinėti pinigus ir kt. Furistai.tk" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />


<!--////// END  \\\\\\\-->
<?php
echo '
</head>
<body>
<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="tempaltemo_header">
    	<div id="header_content">
        	<div id="site_title">
				<a href="index.html" target="_parent">Furistai</a>            </div>
            <p>'.$_SESSION['Logged'].'Dabar yra Pirmadienis, Gegužės 5</br>
			Šiuo metu prisijungę: 0</br>
			Išviso uždirbta: 654646 LT</br>
			Top žaidėjas: Niekas</p>
		</div>
    </div>
    
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main"><span id="main_top"></span><span id="main_bottom"></span>
    	
        <div id="templatemo_sidebar">
        
        	<div id="templatemo_menu">
                <ul>
                    <li><a href="index.php" target="_parent"';if(!isset($_GET['p']) OR $_GET['p'] == ''){ echo'class="current'; } echo'">Pagrindinis</a></li>
                    <li><a href="index.php?p=duk" target="_parent"';if($_GET['p'] == 'duk'){ echo'class="current'; } echo'">D.U.K</a></li>
					<li><a href="index.php?p=kontaktai" target="_parent"';if($_GET['p'] == 'kontaktai'){ echo'class="current'; } echo'">Kontaktai</a></li>'; 
					if($_SESSION['Logged'] > 0) {
					echo '<li><a href="index.php?p=logout" target="_parent">Atsijungti</a></li>';}
					
					echo'
              </ul>    	
            </div>';
			if($_SESSION['Logged'] == 0){
        	echo '<div class="sidebar_box">
            	<div class="sb_title">Prisijungimas</div>
                <div class="sb_content">
                	<div id="login_form">
                        <form action="index.php" method="post" >
                        	<p><span>Vartotojo vardas:</span>
                            <input type=\"text\" id="username" name="username" class="login_input" />
                            </p>
                            <p><span>Slaptažodis:</span>
                            <input type="password" id="password" name="password" class="login_input" />
                            </p>
                            <input type="submit" name="submit" id="login_submit" value=""/></br>		
                        </form>';
						echo '
						Neturi vartotojo? <a href="index.php?p=register" target="_parent" >Registruokis</a>
					</div>                  
                </div>
                <div class="sb_bottom"></div>            
            </div>';
            }
			else {
			echo '<div class="sidebar_box">
            	<div class="sb_title">Meniu</div>
                <div class="sb_content">
                	<div id="login_form">
						123
					</div>                  
                </div>
                <div class="sb_bottom"></div>            
            </div>';
			}
            echo '<div class="sidebar_box">
            	<div class="sb_title">Naujienos</div>
                <div class="sb_content">
                
                	<div class="sb_news_box">
						<a href="#">Nuolaida deimantams 50%!</a>
                        <span>05 Gegužė 2014</span>					
                    </div>
                    
                    <div class="sb_news_box">
						<a href="#">Startas</a>
                        <span>05 Gegužė 2014</span>					
                    </div>
                        
                    <a href="#"><strong>Žiūrėti visas</strong></a>
               </div>
               
              <div class="sb_bottom"></div>  
                        
            </div>
            
			<div class="sidebar_box">
            	<div class="sb_title">Facebook</div>
                <div class="sb_content">
                	<div id="login_form">
						<facebook įskiepis>
					</div>                  
                </div>
                <div class="sb_bottom"></div>            
            </div>
			
			<div class="sidebar_box">
            	<div class="sb_title">Reklama</div>
                <div class="sb_content">
                	<div id="login_form">
						<center>
						<img src="images/ad.png" alt="ad-1" />
						<img src="images/ad.png" alt="ad-2" />
						<img src="images/ad.png" alt="ad-3" />
						<img src="images/ad.png" alt="ad-4" />
						</center>
					</div>                  
                </div>
                <div class="sb_bottom"></div>            
            </div>
			
			
            <div class="cleaner"></div>
        </div> <!-- end of sidebar -->
        
        <div id="templatemo_content">
        	
            <div class="content_box">
            	<h2>Furistai - Naršyklinis žaidimas</h2>';
				
if(isset($_POST['submit'])) {
$user = $_POST['username'];
$passwor = $_POST['password'];
$password = md5($passwor);
$query = mysql_query("SELECT * FROM `vartotojai` WHERE `vardas`= '$user' AND `slaptazodis`= '$password'");
$arr = mysql_fetch_array($query);
$checkuser = mysql_num_rows($query);
if(!isset($user{3})) { $error='Vartotojo vardas per trumpas.';}
elseif(isset($user{31})) { $error='Vartotojo vardas per ilgas.';}
elseif(!isset($password{3})) { $error='Slaptaždodis per trumpas.';}
elseif(isset($password{35})) { $error='Slaptažodis per ilgas.';}
elseif($checkuser==0){ $error='Neteisingi duomenys.';}

if(isset($error)){
echo'<div class="error_box"><br> <center>'.$error.'</center>'.$password.'</br></div>';
}
else {
		$_SESSION['Logged'] = $arr['ID'];
		?><script> alert('Prisijungta sekmingai!'); 
		location.href = "index.php";</script><?php
}}
if($_GET['p'] == 'logout'){
unset($_SESSION['Logged']);
?><script> alert('Atsijungta sekmingai!');
location.href = "index.php"; </script><?php }



elseif($_GET['p'] == 'register'){
if(isset($_POST['submit-reg'])) {

$user = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$email = htmlspecialchars($_POST['email']);
$captcha = $_POST['captcha'];

$checkuser = mysql_num_rows(mysql_query("SELECT * FROM `vartotojai` WHERE `vardas`= '$user'"));
if(!isset($user{3})) { $error='Vartotojo vardas per trumpas.';}
elseif(isset($user{31})) { $error='Vartotojo vardas per ilgas.';}
elseif(!isset($password{3})) { $error='Slaptaždodis per trumpas.';}
elseif(isset($password{35})) { $error='Slaptažodis per ilgas.';}
elseif(!isset($password{3})) { $error='Slaptaždodis per trumpas.';}
elseif(isset($email{35})) { $error='El.pašto adresas per ilgas.';}
elseif($password != $password1) { $error='Slaptažodžiai nesutampa.';}
elseif($_SESSION['code'] != $captcha ) { $error='Neteisingai pakartotas kodas.';}
elseif($checkuser==1){ $error='Toks vartotojas jau egzistuoja.';}

if(isset($error)){
echo'<div class="error_box">'.$error.'</div></br>';
}
else {
if (empty($email)){$email = 'Nera';}
$password = md5($password);
$query = mysql_query("INSERT INTO furistai.vartotojai (`vardas`, `slaptazodis`, `pastas`, `pinigai`) VALUES ('$user', '$password', '$email', '5000')");

echo '<div class="ok_box">Jūs sekmingai užsiregistravote! Galite dabar prisijungti.</div>';
}
}
//else {
echo '<h3>Registracija</h3></br>';
echo '<form action="index.php?p=register" method="post" >
Vartotojo vardas: </br>
<input type="text" id="username" name="username"/></br>
Slatažodis:</br>

<input type="password" id="password" name="password" /></br>
Pakartoti slapažodį:</br>
<input type="password" id="password1" name="password1"/></br>
El. paštas:</br>
<input type="text" id="email" name="email"/></br>
Captcha:</br>
<img src="captcha/index.php" alt="captcha" />
<input type="text" id="captcha" name="captcha" size="7"/>
</br></br>
<input type="submit" id="submit-reg" name="submit-reg" value="Registruotis"/>

';
}
if (isset($_GET['act'])){
if($_SESSION['Logged'] == 0){ echo '<div class="error_box">J0s esate neprisijungęs</div></br>';}
else {
include 'http://127.0.0.1:8888/furistai/zaidimas.php?veiksmas='.$_GET['act'].'&id='.$_SESSION['Logged'];}}
?>

                <!--<a href="http://www.templatemo.com/page/1" target="_parent"><img class="image_wrapper image_fl" src="images/templatemo_image_01.jpg" alt="Image 1" /></a>
                <h5>Duis vitae velit sed dui malesuada</h5>
                <p>Sliquet ligula. Maecenas adipiscing  um ipsum. Pelsti lentesque vitae magna. Suspendisse a nibh tristique jus us volutpat. Suspos endisse vitae neque eget ante.</p>
                <p><a href="#">Read More</a></p>
              <div class="cleaner h30"></div>
                <a href="http://www.templatemo.com/page/2" target="_parent"><img class="image_wrapper image_fl" src="images/templatemo_image_02.jpg" alt="Image 2" /></a>
              <h5>Savitae velit sed dui malesu donec</h5>
              <p> Maecenas adipiscing elementum ipsum. lentesque vitae magna. Sed nec est. Suspendisse a nibh tristique justo rhoncus volutpat. endisse vitae neque eget ante.</p>
              <p> <a href="#">Read More</a></p>
          </div>
            
            <div class="content_box">
            	
                <div class="col_w290 float_l">
                
                  <h2 class="title_icon why_choose_us">Why Us?</h2>
                    
                    <p>Lorem ipsum dolor sit amet, consectetuer adipis cing elit. Nunc quis sem nec tellus blandit tincid unt. Duis vitae velit sed dui.</p>
                    <ul class="tmo_list">
                    	<li><a href="#">Smalesuada dignissim</a></li>
                      	<li><a href="#">Donec mollis aliquet ligula</a></li>
                      	<li><a href="#">Maecenas adipiscin</a></li>
                  	</ul>
				</div>
                
                <div class="col_w290 cw290_last float_r">
                
                  <h2 class="title_icon new_services">Standards</h2>
                    
                    <p>Nunc quis sem nec tellus blandit tincidunt. Du vitae velit sed dui malesuada dignissim. Don lis aliquet ligula. Maecenas adipiscing.</p>
					<ul class="tmo_list">
                    	<li><a href="#">Pellentesque vitae magna</a></li>
                      	<li><a href="#">Suspendisse uspendisse vitae</a></li>
                        <li><a href="#">Pellentesque dolornulla</a></li>
                  </ul>
				</div>
                
                <div class="cleaner"></div>
            </div>
            
            <div class="content_box last_box">
            	<h2>Web Projects</h2>
                
                <div id="gallery">
					<a href="images/gallery/image_01_b.jpg" class="pirobox" title="Project 1"><img src="images/gallery/image_01.jpg" alt="1" /></a>
                    <a href="images/gallery/image_02_b.jpg" class="pirobox" title="Project 2"><img src="images/gallery/image_02.jpg" alt="2" /></a>
                    <a href="images/gallery/image_03_b.jpg" class="pirobox" title="Project 3"><img src="images/gallery/image_03.jpg" alt="3" /></a>
                </div> <!-- end of Gallery -->
                
              <div class="cleaner h20"></div>    
              <!--<a href="#"><strong>View All Projects</strong></a>--></div>
            
        </div>
        
        <div class="cleaner"></div>    
    </div>
    
    <div id="templatemo_main_bottom">
    </div>

</div> <!-- end of wrapper -->
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
        Copyright © 2014 ImMartynas
    </div>
</div>

</body>
</html>