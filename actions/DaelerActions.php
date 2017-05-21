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


?>