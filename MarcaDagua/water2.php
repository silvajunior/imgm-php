<?php
$filename = "images/".$_GET['img'];
header('Content-type: image/jpeg');

//dados da mascara 
$marca           =  "images/m2.gif";
$imagem_marca    =   ImageCreateFromGif($marca);
$pontoX1         =   ImagesX($imagem_marca);
$pontoY1         =   ImagesY($imagem_marca);

// recupera as dimensoes da imagem
list($width, $height) = getimagesize($filename);

//definindo novo tamanho
$new_width = 300;
$new_height = 250;

// redesenhando a imagem
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);

imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// Habilitando a opcao abaixo irá criar uma mascara 
ImageCopyMerge($image_p, $imagem_marca, 20, 10, 0, 0, $pontoX1, $pontoY1, 60);

imagejpeg($image_p, null, 100);
imagedestroy($image_p);
?>