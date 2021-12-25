<?php

function make_avatar($character)

{

	$path='avtar/'.time().'.png';
	$image=imagecreate(200, 200);
	$red=rand(0,255);
	$green=rand(0,255);
	$blue=rand(0,255);
	imagecolorallocate($image,$red,$green,$blue);
	$textcolor=imagecolorallocate($image,255,255,255);
	imagettftext($image, 100, 0, 55, 150, $textcolor, 'assets/fonts/Roboto-Medium.ttf', $character);

	// header('content-type:image/png');
	imagepng($image,$path);
	imagedestroy($image);
	return $path;

}





?>