<?php
foreach ($data_keluar as $tb) {
$file = './assets/berkas/keluar/'.$tb['arsip_keluar'];
header("Content-Length: " . filesize ($file ) ); 
header("Content-type: application/pdf"); 
header("Content-disposition: inline;     
filename=".basename($file));
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$filepath = readfile($file);
}
?>