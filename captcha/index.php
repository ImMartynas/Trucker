<?php 

session_start();

header('Content-type: image/gif');
$image = imagecreate(80,30); //Paveiksliuko fonas

$kod = '123456789qwertyuiopASDFGHJKLZXCVBNM';
$kod = str_shuffle($kod);
$kod = substr($kod,0,5);
$_SESSION["code"] = $kod;
$color1= rand(0,255);
$color2=rand (0,225);
$color3=rand(0,255);
imagecolorallocate($image, $color1, $color2, $color3); 
$font = '5667.ttf';
$a=0;

for($i=0; $i < 5; $i++) {
$arr[$i] = substr($kod,$i,1);
$color=imagecolorallocate($image,255-$color1,255-$color2,255-$color3);

imagettftext($image, 15, rand(10,-9), $a+=13, rand(18,27), $color, $font, $arr[$i]);
}
imagegif($image);
imagedestroy($image); 


?>