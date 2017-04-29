<?php 

if (isset($_POST['id_product'])) {

	$data = array(
		"id_product" => $_POST['id_product'],
		"id_session" => $_POST['id_session'],
		"size" => $_POST['size'],
		"qty" => $_POST['qty'],
	);

	$add_to_cart = $cart->add_to_cart($data);

	if ($add_to_cart == false) {
		header('Location: '.$_SERVER['REQUEST_URI'].'#item_exists');
	}else{
		header('Location: '. $_SERVER['REQUEST_URI']);
	}

}

if (isset($_GET['id_cart'])) {

	$delete_cart = $cart->delete_cart($_GET['id_cart']);

	if ($delete_cart == true) {
		echo "<script>window.history.back();</script>";
	}else{
		echo "<script>window.history.back();</script>";
	}

}

if (isset($_POST['id_cart'])) {
	
	$data = array(
		"id_cart" => $_POST['id_cart'],
		"qty" => $_POST['qty'],
		"size" => $_POST['size']
	);

	$update_cart = $cart->update_cart($data);

	if ($update_cart == true) {
		header('Location: '.$_SERVER['REQUEST_URI']);
	}else{
		header('Location: '.$_SERVER['REQUEST_URI']);
	}

}

if (isset($_POST['total_shipping'])) {
	
	$_SESSION['id_user'] 		= $_POST['id_user'];
	$_SESSION['total_price'] 	= $_POST['total_price'];
	$_SESSION['total_shipping'] = $_POST['total_shipping'];

	header('Location: http://localhost/oop-shopping-cart/member/chekout.php');

}

if (isset($_POST['amount'])) {

	$data = array(
		"id_order" => $_POST['id_order'],
		"name_of_account" => $_POST['name_of_account'],
		"amount" => $_POST['amount'],
		"id_user" => $_POST['id_user'],
		"cart_count" => $_POST['cart_count'],
		"tax" => ($_POST['amount']*0.03),
		"total_price" => $cart->cart_rules($_POST['id_user'], $_POST['amount'])
	);

	$user_checkout = $cart->user_checkout($data);
	
	if ($user_checkout == true) {

		$_SESSION['billing'] = $_POST['id_user'];
		$_SESSION['id_order'] = $_POST['id_order'];
		
		header('Location: http://localhost/oop-shopping-cart/member/print_billing.php');
	}else{
		header('Location: http://localhost/oop-shopping-cart/member/chekout.php?error=' . urlencode('Account Number not define!'));
	}
	
}

?>