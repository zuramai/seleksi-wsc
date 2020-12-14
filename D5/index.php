<?php

header('Content-Type: image/jpeg');
$image = imagecreatefromjpeg('image.jpg');
$wm = imagecreatefrompng('logo.png');

$wmSX = imagesx($wm);
$wmSY = imagesy($wm);

$imgSX = imagesx($image);
$imgSY = imagesy($image);

imagecopy($image, $wm, $imgSX - $wmSX, $imgSY - $wmSY, 0, 0, $wmSX, $wmSY);
imagejpeg($image);

?>