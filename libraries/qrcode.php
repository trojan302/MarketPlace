<?php 

header('Content-type: image/png');

use Endroid\QrCode\QrCode as QrCode;

require_once 'QrCode/vendor/autoload.php';

if (isset($_GET['text'])) {

	$size = isset($_GET['size']) ? $_GET['size'] : 200;
	$padding = isset($_GET['padding']) ? $_GET['padding'] : 10;
	
	$qr = new QrCode();

	$qr->setText($_GET['text']);
	$qr->setSize($size);
	$qr->setPadding($padding);

	$qr->render();

}

?>