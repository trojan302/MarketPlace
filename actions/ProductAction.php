<?php 

error_reporting(E_ALL);

if (isset($_POST['addItem'])) {
	
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
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?success='. urlencode('Add product successfully'));
	}else{
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?error='. urlencode('Oops! Add product failed!'));
	}

}

if (isset($_GET['detele_product'])) {
	
	$delete = $products->delete_product($_GET['detele_product']);

	if($delete == true){
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?success='. urlencode('delete product successfully'));
	}else{
		header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?error='. urlencode('Oops! delete product failed!'));
	}

}

if (isset($_POST['editProduct'])) {
	
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
			header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?success='. urlencode('Update product successfully'));
		}else{
			header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?error='. urlencode('Oops! Update product failed!'));
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
			header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?success='. urlencode('Update product successfully'));
		}else{
			header('Refresh:0; url=http://localhost/oop-shopping-cart/admin/products.php?error='. urlencode('Oops! Update product failed!'));
		}
	}

}

?>