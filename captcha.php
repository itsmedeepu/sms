<?php
session_start();
header('content-type:image/jpeg');
$random = md5(rand(0, 10000));
// $total_lines = 5;
$captcha_code = substr($random, 0, 5);
$_SESSION['captchacode'] = $captcha_code;
$font_size = 18;
$width = 80;
$height =35;
$image = imagecreate($width, $height);

imagecolorallocate($image, 255, 255, 255);

$font_color = imagecolorallocate($image, 0, 0, 0);
// for($i=0;$i<1000;$i++) {
//     imagesetpixel($image,rand()%200,rand()%50,$font_color);
// }  

// for ($i = 1; $i <= $total_lines; $i++) {

//     $x1 = mt_rand(0, 100);
//     $y1 = mt_rand(0, 100);
//     $x2 = mt_rand(0, 100);
//     $y2 = mt_rand(0, 100);
//     imageline($image, $x1, $y1, $x2, $y2, $font_color);
// }
$line_color=rand(10,100);
for($i=0;$i<10;$i++) {
    imageline($image,0,rand()%50,200,rand()%50,$line_color);
}
$angle = rand(-8, 8);
imagettftext($image, $font_size, $angle, 5, 30, $font_color, 'assets/fonts/Roboto-Black.ttf', $captcha_code);

imagejpeg($image);
