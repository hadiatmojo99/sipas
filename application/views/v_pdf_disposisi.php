<?php
foreach ($data_disposisi as $tb) {
$file = './assets/berkas/masuk/disposisi/'.$tb['arsip_disposisi'];
header("Content-Length: " . filesize ($file ) ); 
header("Content-type: application/pdf"); 
header("Content-disposition: inline;
filename=".basename($file));
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$filepath = readfile($file);
}
?>