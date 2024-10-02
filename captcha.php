<?php
session_start();
header('Content-Type: image/png');

$captcha_code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6);
$_SESSION['captcha'] = $captcha_code;

$image = imagecreatetruecolor(100, 30);
$bg_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

imagefilledrectangle($image, 0, 0, 100, 30, $bg_color);
imagettftext($image, 12, 0, 10, 20, $text_color, './NotoSans-Regular.ttf', $captcha_code);
imagepng($image);
imagedestroy($image);
?>

