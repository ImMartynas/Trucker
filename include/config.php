<?php


// Pradedame sesija

session_start();

// MySQL duomen� baz�s nustatymai
$Host = 'localhost';
$User = 'root';
$Pass = '';
$DB   = 'furistai';

if(!isset($_SESSION['Logged']))	$_SESSION['Logged'] = 0;

$con = mysql_connect($Host,$User,$Pass);
if (!$con){ echo'<div class="errorbox">Nepavyko prisijungti prie duomenu bazes: '. mysql_error() .'</div>';}
mysql_select_db($DB, $con);
		
?>