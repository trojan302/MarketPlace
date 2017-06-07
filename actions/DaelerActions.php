<?php 


if (isset($_POST['daelerAddItem'])) {
	
	$data 	= array(
		'product_id' => $_POST['product_id'],
		'item_name'	 => $_POST['item_name'],
		'stock'		 => $_POST['stock'],
		'id_cat'	 => $_POST['id_cat'],
		'size'	     => $_POST['size'],
		'equity'	 => $_POST['equity'],
		'price'		 => $_POST['price'],
		'id_user'	 => $_POST['id_user'],
		'created'	 => date('Y-m-d'),
		'filename'	 => $_FILES['file']['name'],
		'filetmp'	 => $_FILES['file']['tmp_name'],
		'filesize'	 => $_FILES['file']['size']
	);

	$insert = $products->add_product($data);

	if($insert == true){
		header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('Add product successfully'));
	}else{
		header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! Add product failed!'));
	}

}

if (isset($_GET['detele_product'])) {
	
	$delete = $products->delete_product($_GET['detele_product']);

	if($delete == true){
		header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('delete product successfully'));
	}else{
		header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! delete product failed!'));
	}

}

if (isset($_POST['DaelereditProduct'])) {
	
	// $data 	= array(
	// 	'product_id' => $_POST['product_id'],
	// 	'item_name'	 => $_POST['item_name'],
	// 	'stock'		 => $_POST['stock'],
	// 	'id_cat'	 => $_POST['id_cat'],
	// 	'size'	     => $_POST['size'],
	// 	'equity'	 => $_POST['equity'],
	// 	'price'		 => $_POST['price'],
	// 	'id_user'	 => $_POST['id_user'],
	// 	'created'	 => date('Y-m-d'),
	// 	'filename'	 => $_FILES['file']['name'],
	// 	'filetmp'	 => $_FILES['file']['tmp_name'],
	// 	'filesize'	 => $_FILES['file']['size']
	// );
	
	if (empty($_FILES['images']['name'])) {
		
		$data = array(
			"id_product" => $_POST['id_product'],
			"name" => $_POST['name'],
			"size" => $_POST['size'],
			"stock" => $_POST['stock'],
			"id_cat" => $_POST['id_cat'],
			"equity" => $_POST['equity'],
			"price" => $_POST['price']
		);

		$update = $products->update_product($data);

		if($update == true){
			header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('Update product successfully'));
		}else{
			header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! Update product failed!'));
		}

	}else{

		$data = array(
			"id_product" => $_POST['id_product'],
			"name" => $_POST['name'],
			"size" => $_POST['size'],
			"stock" => $_POST['stock'],
			"id_cat" => $_POST['id_cat'],
			"equity" => $_POST['equity'],
			"price" => $_POST['price'],
			"old_images" => $_POST['old_images'],
			"images" => $_FILES['images']['name'],
			"type" => $_FILES['images']['type'],
			"error" => $_FILES['images']['error'],
			"image_size" => $_FILES['images']['size'],
			"tmp" => $_FILES['images']['tmp_name']
		);

		$update = $products->update_product($data);	

		if($update == true){
			header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('Update product successfully'));
		}else{
			header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! Update product failed!'));
		}
	}

}


if (isset($_POST['user_edit'])) {
	
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
		header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('Updating profile successfully'));
	}else{
		header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! Updating profile failed!'));
	}

}

if (isset($_POST['user_change_password'])) {

	$data = array(
		"id_user" => $_POST['id_user'],
	    "old_pass" => $_POST['old_pass'],
	    "new_pass" => $_POST['new_pass'],
	    "new_pass_retype" => $_POST['new_pass_retype']
	);

	$status = $user->check_pass($data['id_user'], $data['old_pass']);

	if ($status == true) {
		
		header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! password doesn\'t match!'));

		if ($data['new_pass'] != $data['new_pass_retype']) {
			header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! password doesn\'t match!'));
		}else{
			
			$update = $user->update_admin_password($data);

			if($update == true){
				header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('Updating profile successfully'));
			}else{
				header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! Updating profile failed!'));
			}

		}

	}else{

		header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! password doesn\'t match!'));

	}

}


if (isset($_POST['ganti_avatar'])) {
	
	$avatar_name 	= $_FILES['avatar']['name'];
	$avatar_tmp 	= $_FILES['avatar']['tmp_name'];
	$avatar_err 	= $_FILES['avatar']['error'];
	$avatar_size 	= $_FILES['avatar']['size'];
	$avatar_info 	= pathinfo($avatar_name)['extension'];

	$id_user 		= $_POST['id_user'];

	$avatar_upload 	= $id_user.'-AVATAR-'.time().'.'.$avatar_info;
	$destination    = '../assets/images/users/'.$avatar_upload;
	$avatar_url	    = 'http://localhost/market/assets/images/users/'.$avatar_upload;

	$availabe   = array('jpg','jpeg','png','gif');

	if (!file_exists($destination)) {
		
		if (in_array($avatar_info, $availabe)) {
			
			if ($avatar_size < 10485760) {

				$data = array(
					'avatar_url' => $avatar_url,
					'id_user' => $id_user
				);

				$update = $user->ganti_avatar($data);

				if ($update) {
					move_uploaded_file($avatar_tmp, $destination);
					header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('Updating avatar successfully'));
				}else{
					header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! Updating avatar failed!'));
				}

			}else{
				header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Ukuran melebihi standar'));
			}

		}else {
			header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Ekstensi tidak diijinkan. Gunakan file dengan Ekstensi .jpg, .jpeg, .png, atau .gif'));
		}

	}else{

		header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('File sudah ada'));

	}

}



?>