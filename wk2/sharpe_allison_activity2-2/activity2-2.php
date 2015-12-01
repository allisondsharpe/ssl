<?php

//creating image
$img = imagecreatefromjpeg("photo.jpg");
header('Content-Type: image/jpeg');

//setting up font, color, and message
$white = imagecolorallocate($img, 255, 255, 255);
$font = "Arial.ttf";
$message = "Wish you were here!";
imagefttext($img, 50, -10, 700, 100, $white, $font, $message);

//create png & destroy $img
imagepng($img);
imagedestroy($img);

// resizing image using $thumbnail
$img = imagecreatefromjpeg("photo.jpg");
$thumbnail = imagecreatetruecolor(80, 60);
imagecopyresampled($thumbnail, $img, 0, 0, 0, 0, 80, 60, 800, 600);
imagepng($thumbnail, "thumbnail.png");
imagedestroy($img);
imagedestroy($thumbnail);

?>