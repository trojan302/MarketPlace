<?php
session_start();

if (!isset($_SESSION['id_user']) && !isset($_SESSION['total_price']) && !isset($_SESSION['total_shipping'])) {
	header('Location: http://localhost/oop-shopping-cart/member/');
}

require_once './bootstraps/autoload.php';

require_once '../templates/_Header.php';
require_once '../templates/_Nav.php';
require_once '../templates/_Checkout.php';
require_once '../templates/_Footer.php';

?>