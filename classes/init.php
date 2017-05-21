<?php

$products 		= new Products();
$items 			= $products->getAllProduct(12);
$number 		= $products->getPage(12);
$all_products 	= $products->all_products();
$num_products	= count($all_products);
$categories		= $products->categories();
$details 		= (isset($_GET['id'])) ? $products->get_details_item($_GET['id']) : '';
$num_products 	= $products->num_products();
$num_shopping_cart = $products->num_shopping_cart();

$user 		= new Users();
$all_users 	= $user->all_users();
$num_users	= count($all_users);

$categories 	= new Categories();
$all_categories = $categories->get_all_categories();

$generator 		= new Generators();
$QRCodeReader	= new Libern\QRCodeReader\QRCodeReader();
$cart 			= new Cart();

$daelers 		= new Daelers();

/* Admin Private Initialized */

$payments = new Payments();

$admin = new AdminNotifications();
$notif = $admin->get_user_notifications();

$orders = new Orders();
$scheduler = $orders->delete_scheduler();
$auto_insert_transaction = $orders->auto_insert_data_transaction();
$orders_data = $orders->get_data_order();

/* ========================= */

if (!__SHOP__) {
	$user->is_loggedin($_SESSION['users']);
}

?>