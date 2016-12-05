<?php

session_start();

#Different parameters to affect the captcha
$width = 160;
$height = 60;
$length = 5;
$string = '';
$bordersize = 2;
$fontsize = 30;
$font = "../static/font/Dink.ttf";
$space = 25;

$anglerand = 30;
$sizerand = 5;
$nbrline = 3;
 
#Creation of an image
$image = imagecreatetruecolor($width, $height);

#attribuation of the collors
$textcolor = imagecolorallocate($image, 200, 100, 90);
$white = imagecolorallocate($image, 255, 255, 255);
$bordercolor = imagecolorallocate($image, 150, 60, 50);

for ($i = 0; $i < $length; $i++) {
	$cap = rand(0,1);
	if($cap == 1){
		$string .= chr(rand(97, 122));
	}
	else{
		$string .= chr(rand(65, 90));
	}
}

#We stock in $_SESSION the value of the captcha to verify that it's the good one entered in the following page.
$_SESSION['captcha'] = $string;

#We do a border
imagefilledrectangle($image,0,0,$width-1,$height-1,$bordercolor);
imagefilledrectangle($image,$bordersize,$bordersize,$width-1-$bordersize,$height-1-$bordersize,$white);

#We add the letters on the image
for ($i = 0; $i < $length; $i++) {
	$size = rand(-$sizerand, $sizerand);
	$angle = rand(-$anglerand, $anglerand);
    imagettftext($image, $fontsize, $angle, $fontsize/2 + $space*$i, $height/2 + $fontsize/3, $textcolor, $font, $string[$i]);
}

#We add some lines on the captcha
for ($i = 0; $i < $nbrline; $i++) {
	$x1 = rand($bordersize, $width-1-$bordersize);
	$x2 = rand($bordersize, $width-1-$bordersize);
	$y1 = rand($bordersize, $height-1-$bordersize);
	$y2 = rand($bordersize, $height-1-$bordersize);
	imageline($image, $x1, $y1, $x2, $y2, $bordercolor);
}

#We define that the php page will return the captcha png file
header("Content-type: image/png");
imagepng($image);
?>