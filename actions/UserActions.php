<?php 

if (isset($_GET['delete_user'])) {
	
	$delete = $user->delete_user($_GET['delete_user']);

	if($delete == true){
		header('Location : http://localhost/market/admin/users.php?success='. urlencode('Deleting user successfully'));
	}else{
		header('Location : http://localhost/market/admin/users.php?error='. urlencode('Oops! Deleting user failed!'));
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
		header('Refresh:0; url=http://localhost/market/admin/users.php?success='. urlencode('Updating user successfully'));
	}else{
		header('Refresh:0; url=http://localhost/market/admin/users.php?error='. urlencode('Oops! Updating user failed!'));
	}

}

if (isset($_POST['admin_edit'])) {
	
	$data = array(
		"id_user" => $_POST['id_user'],
	    "firstname" => $_POST['first_name'],
	    "lastname" => $_POST['last_name'],
	    "email" => $_POST['email'],
	    "address" => $_POST['address'],
	    "zip_code" => $_POST['zip_code'],
	    "phone" => $_POST['phone'],
	    "no_rek" => $_POST['no_rek']
	);

	// echo "<pre>";
	// print_r($data);
	// die();

	$update = $user->update_admin_profile($data);

	if($update == true){
		header('Refresh:0; url=http://localhost/market/admin/settings.php?success='. urlencode('Updating user successfully'));
	}else{
		header('Refresh:0; url=http://localhost/market/admin/settings.php?error='. urlencode('Oops! Updating user failed!'));
	}

}

if (isset($_POST['admin_change_password'])) {

	$data = array(
		"id_user" => $_POST['id_user'],
	    "old_pass" => $_POST['old_pass'],
	    "new_pass" => $_POST['new_pass'],
	    "new_pass_retype" => $_POST['new_pass_retype']
	);

	$status = $user->check_pass($data['id_user'], $data['old_pass']);

	if ($status == true) {
		
		header('Refresh:0; url=http://localhost/market/admin/settings.php?error='. urlencode('Oops! password doesn\'t match!'));

		if ($data['new_pass'] != $data['new_pass_retype']) {
			header('Refresh:0; url=http://localhost/market/admin/settings.php?error='. urlencode('Oops! password doesn\'t match!'));
		}else{
			
			$update = $user->update_admin_password($data);

			if($update == true){
				header('Refresh:0; url=http://localhost/market/admin/settings.php?success='. urlencode('Updating user successfully'));
			}else{
				header('Refresh:0; url=http://localhost/market/admin/settings.php?error='. urlencode('Oops! Updating user failed!'));
			}

		}

	}else{

		header('Refresh:0; url=http://localhost/market/admin/settings.php?error='. urlencode('Oops! password doesn\'t match!'));

	}

}
?>