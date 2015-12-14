<?php
$Host = 'localhost';
$User = 'root';
$Pass = '';
$DB   = 'furistai';
$con = mysql_connect($Host,$User,$Pass);
mysql_select_db($DB, $con);

include 'http://127.0.0.1:8888/furistai/include/config.php';
$ID = $_GET['id'];
$arr = mysql_fetch_array(mysql_query("SELECT * FROM `vartotojai` WHERE `ID`= '$ID'"));
if (!$arr) die(mysql_error());
if($_GET['veiksmas'] == 'pagrindinis'){
echo 'hello';
}
elseif($_GET['veiksmas'] == 'pagr'){
echo 'hello2-'.$arr['vardas'];}
?>