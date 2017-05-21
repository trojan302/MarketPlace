<?php

if (!isset($_GET['id']) && !isset($_GET['item'])) {
	header('Location: http://localhost/market/');
}

require  __DIR__ . '/bootstrap/bootstrap.php';

require_once './templates/_Header.php';
require_once './templates/_Nav.php';
require_once './templates/_ContainerView.php';
require_once './templates/_Footer.php';


?>