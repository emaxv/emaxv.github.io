<?php
session_start();
Header("Content-type: image/jpeg");
Header("Content-type: image/png"); 
$im = imagecreatefromjpeg ("rainbow.png");
$text_color = imagecolorallocate ($im, 32, 178, 170);
$text=rand(100000,999999);
$_SESSION["cap"]=$text;
imagestring ($im, 5, 39,3, $text, $text_color);
Imagejpeg($im);
ImageDestroy($im);
?> 
