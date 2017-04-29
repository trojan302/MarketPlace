<?php 

require_once '../classes/Database.php';
require_once '../classes/Users.php';
require_once '../classes/Generators.php';

$user = new Users();
$gen = new Generators();

if (isset($_POST['username'])) {
	
	$data = array(
		"id_user" => $gen->userID(),
		"username" => $_POST['username'],
		"firstname" => $_POST['firstname'],
		"lastname" => $_POST['lastname'],
		"phone" => $_POST['phone'],
		"member" => $_POST['member'],
		"email" => $_POST['email'],
		"password" => md5($_POST['password']),
		"address" => $_POST['address'],
		"zip_code" => $_POST['zip_code'],
		"created" => date('Y-m-d'),
	);

	$user->sign_up($data);

}

?>