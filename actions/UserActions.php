<?php 

if (isset($_GET['delete_user'])) {
	
	$delete = $user->delete_user($_GET['delete_user']);

	if($delete == true){
		header('Location : http://localhost/oop-shopping-cart/admin/users.php?success='. urlencode('Deleting user successfully'));
	}else{
		header('Location : http://localhost/oop-shopping-cart/admin/users.php?error='. urlencode('Oops! Deleting user failed!'));
	}

}

if (isset($_POST['editUser'])) {
	
	$data = array(
		"id_user" => $_POST['id_user'],
	    "username" => $_POST['username'],
	    "firstname" => $_POST['firstname'],
	    "lastname" => $_POST['lastname'],
	    "id_member" => $_POST['id_member'],
	    "email" => $_POST['email'],
	    "address" => $_POST['address'],
	    "zip_code" => $_POST['zip_code'],
	    "phone" => $_POST['phone'],
	    "status" => $_POST['status']
	);

	$update = $user->update_user($data);

	if($update == true){
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/users.php?success='. urlencode('Updating user successfully'));
	}else{
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/users.php?error='. urlencode('Oops! Updating user failed!'));
	}

}


?>