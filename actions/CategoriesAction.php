<?php 


if (isset($_POST['add_category'])) {
	
	$data = array("initial" => $_POST['category_initial'], "name" => $_POST['category_name']);

	$add = $categories->add_category($data);

	if ($add == true) {
		header('Location: http://localhost/oop-shopping-cart/admin/categories.php');
	}else{
		header('Location: http://localhost/oop-shopping-cart/admin/categories.php');
	}

}

if (isset($_POST['editCategory'])) {
	
	$data = array("id_cat" => $_POST['id_cat'],"initial" => $_POST['initial'], "name" => $_POST['name']);

	$add = $categories->update_category($data);

	if ($add == true) {
		header('Location: http://localhost/oop-shopping-cart/admin/categories.php');
	}else{
		header('Location: http://localhost/oop-shopping-cart/admin/categories.php');
	}

}

if (isset($_GET['id_cat'])) {
	
	$delete = $categories->delete_category($_GET['id_cat']);

	if ($delete == true) {
		header('Location: http://localhost/oop-shopping-cart/admin/categories.php');
	}else{
		header('Location: http://localhost/oop-shopping-cart/admin/categories.php');
	}

}


?>