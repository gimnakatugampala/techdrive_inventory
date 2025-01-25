<?php
require_once('../lib/phpqrcode/qrlib.php');

// Use forward slashes consistently in the directory path
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$baseUrl = "{$protocol}://{$host}" . dirname($_SERVER['PHP_SELF'], 2);


// Ensure the directory exists
$path = __DIR__ . '/qrimg/';

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

// Save the QR IMAGE & Get the File Name
$qrcode = time() . ".png";
$qrcod_save_path = $path . $qrcode;

// GENERATE SALES ORDER LINK

// DEVELOPMENT
// $qr_link = $baseUrl . "/order/track.php?code=$socode";


// PRODUCTION
$qr_link = $baseUrl . "order/track.php?code=$socode";

QRcode::png($qr_link, $qrcod_save_path, 'H', 4, 4);
// echo "<img src='" . $qrcod_save_path . "'>";

?>
