<?php

$url = $_GET['url'];
$size = $_GET['size'] ?? '250x250';
$finalUrl = "https://chart.googleapis.com/chart?chs={$size}&cht=qr&chl={$url}&choe=UTF-8";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $finalUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com/');
$imageData = curl_exec($ch);

header("Pragma: public"); // required 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false); // required for certain browsers 
header("Content-Type: image/jpg");
header("Content-Transfer-Encoding: binary");

echo $imageData;