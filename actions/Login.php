<?php 

session_start();

require_once '../classes/Database.php';
require_once '../classes/Users.php';

$user = new Users();

if (isset($_POST['login'])) {
	
	$data = array(
		"email" => $_POST['email'],
		"password" => $_POST['password']
	);

	$user->logged_in($data);

}


?>