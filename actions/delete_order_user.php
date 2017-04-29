<?php 

$idOrder = $_GET['deleteOrder'];

$conn = new MySQLi('localhost','root','','project_ecommerce');

$query_select = "SELECT deleted FROM order_product WHERE id_order='".$idOrder."'";
$sql_select = $conn->query($query_select);
$result_select = $sql_select->fetch_assoc();
$deleted ='';

if ($result_select['deleted'] == 0) {
	$deleted .= 1;
}else{
	$deleted .= 0;
}

$query_update = "UPDATE order_product SET deleted='".$deleted."' WHERE id_order='".$idOrder."'";
$sql_update = $conn->query($query_update);

echo $idOrder;
?>