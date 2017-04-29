<?php
session_start();

if (!isset($_SESSION['billing'])) {
	header('Location: http://localhost/oop-shopping-cart/member/');
}

require './bootstraps/autoload.php';

require_once '../templates/_Header.php';
require_once '../templates/_Nav.php';
require_once '../templates/_PrintBilling.php';
require_once '../templates/_Footer.php';

?>