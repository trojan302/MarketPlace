<?php 
session_start();

require './bootstraps/autoload.php';

$user_data = $user->settings($_SESSION['users']);

require_once '../templates/_Header.php';
require_once '../templates/_Nav.php';
require_once '../templates/_Profile.php';
require_once '../templates/_Footer.php';
?>