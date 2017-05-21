<?php 

$conn = new MySQLi('localhost','root','','marketplace');

$id_struk = $_GET['id_struk'];

	$query_select = "SELECT status FROM struk_payment WHERE id_struk='".$id_struk."'";
	$sql_select = $conn->query($query_select);
	$result_select = $sql_select->fetch_assoc();
	$status ='';

	if ($result_select['status'] == 0) {
		$status = 1;
	}else{
		$status = 0;
	}

	$query_update = "UPDATE struk_payment SET status='".$status."' WHERE id_struk='".$id_struk."'";
	$sql_update = $conn->query($query_update);
	
	echo $id_struk;

?>