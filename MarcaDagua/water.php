<?php
$filename = "images/".$_GET['img'];
header('Content-type: image/jpeg');

//dados da mascara 
$marca           =  "images/m1.gif";
$imagem_marca    =   ImageCreateFromGif($marca);
$pontoX1         =   ImagesX($imagem_marca);
$pontoY1         =   ImagesY($imagem_marca);

// recupera as dimensoes da imagem
list($width, $height) = getimagesize($filename);

//definindo tamanho padrão para as fotos
$new_width = 300;
$new_height = 250;

// redesenhando a imagem
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// Habilitando a opcao abaixo irá criar a mascara com a imagem marca d'agua
ImageCopyMerge($image_p, $imagem_marca, 140, 90, 0, 0, $pontoX1, $pontoY1, 80);

imagejpeg($image_p, null, 100);
imagedestroy($image_p);
?>