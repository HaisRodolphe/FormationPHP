<?php
header ("Content-type: image/png");

/*
$image = imagecreatefromjpeg("fleur.jpg");
$logo = imagecreatefrompng("logo.png");
$largeurImage = imagesx($image);
$hauteurImage = imagesy($image);
$largeurLogo = imagesx($logo);
$hauteurLogo = imagesy($logo);
$blanc = imagecolorallocate($image, 255, 255, 255);

$watermarkX = $largeurImage - $largeurLogo-10;
$watermarkY = $hauteurImage - $hauteurLogo-10;

imagestring($image, 5, 20, $hauteurImage-30, "Vive le PHP", $blanc);
imagecopymerge($image, $logo, $watermarkX, $watermarkY, 0, 0, $largeurImage, $hauteurImage, 50);
*/

if(isset($_GET['l']) && $_GET['l']!="") $largeur = $_GET['l']; else $largeur = "300";
if(isset($_GET['h']) && $_GET['h']!="") $hauteur = $_GET['h']; else $hauteur = "200";
$image = imagecreate(300,200);

$rouge = imagecolorallocate($image, 255, 0, 0);
$vert = imagecolorallocate($image, 0, 255, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);

imagesetpixel($image, 150, 150, $vert);
imageline($image, 10, 10, 60, 60, $bleu);
imageellipse($image, 200, 60, 50, 50, $vert);
imagerectangle($image, 20, 20, 140, 150, $bleu);
$triangle = array(30, 30, 180, 30, 100, 100);
imagepolygon($image, $triangle, 3, $vert);
imagejpeg($image);
?> 