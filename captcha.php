<?php
session_start();

$num1 = rand(1, 10);
$num2 = rand(1, 10);
$sum = $num1 + $num2;
$_SESSION['captcha'] = $sum;

header('Content-Type: image/png');
$img = imagecreatetruecolor(60, 30);
$bg = imagecolorallocate($img, 255, 255, 255);
$textcolor = imagecolorallocate($img, 0, 0, 0);
imagefill($img, 0, 0, $bg);
imagestring($img, 5, 10, 10, $num1.'+'.$num2.'=', $textcolor);
imagepng($img);
imagedestroy($img);
?>