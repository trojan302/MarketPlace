<?php
session_start();

if (!isset($_GET['id']) && !isset($_GET['item'])) {
	header('Location: http://localhost/market/member/');
}

require './bootstraps/autoload.php';

require_once '../templates/_Header.php';
require_once '../templates/_Nav.php';
require_once '../templates/_ContainerView.php';
require_once '../bootstrap/modal.php';
require_once '../templates/_Footer.php';



?>