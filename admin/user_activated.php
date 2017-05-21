<?php 

$conn = new MySQLi('localhost','root','','marketplace');

$id_user = $_GET['id_user'];

	$query_select = "SELECT status FROM users WHERE id_user='".$id_user."'";
	$sql_select = $conn->query($query_select);
	$result_select = $sql_select->fetch_assoc();
	$status ='';

	if ($result_select['status'] == 0) {
		$status = 1;
	}else{
		$status = 0;
	}

	$query_update = "UPDATE users SET status='".$status."' WHERE id_user='".$id_user."'";
	$sql_update = $conn->query($query_update);
	
	echo $id_user;

?>