	<?php 

	$idOrder = $_GET['idOrder'];

	$conn = new MySQLi('localhost','root','','marketplace');

	$query_select = "SELECT order_product.id_product AS ID_PRD, order_product.id_user AS ID_USER, order_product.status AS STATUS, order_product.qty AS QTY_ORD, products.stock AS STOCK, order_product.amount AS TOTAL_AMOUNT, order_product.total_price AS TOTAL_EARNING, order_product.id_order AS ID_ORDER, DATE_FORMAT(order_product.order_date, '%Y-%m') AS ORDER_DATE FROM order_product JOIN products ON order_product.id_product = products.id_product WHERE order_product.id_order='".$idOrder."'";
	$sql_select = $conn->query($query_select);
	$result_select = $sql_select->fetch_assoc();
	$status ='';

	if ($result_select['STATUS'] == 0) {
		$status = 1;
	}else{
		$status = 0;
	}

	$query_update = "UPDATE order_product SET status='".$status."' WHERE id_order='".$idOrder."'";
	$sql_update = $conn->query($query_update);

	if ($status == 0) {
		
		$query = "DELETE FROM transactions WHERE id_order='".$idOrder."'";
		$sql 	= $conn->query($query);

	}else{

		$now = date('Y-m-d h:i:s');
		
		$query 	= "INSERT INTO `transactions`(`id_transaction`, `id_order`, `id_product`, `id_user`, `gross_income`, `net_income`, `date_transaction`) VALUES ('','".$result_select['ID_ORDER']."','".$result_select['ID_PRD']."','".$result_select['ID_USER']."','".$result_select['TOTAL_EARNING']."','".$result_select['TOTAL_AMOUNT']."','".$now."')";
		$sql 	= $conn->query($query);
	}

	if ($sql_update == TRUE) {

		$query_select_product = "SELECT order_product.id_product AS ID_PRD, order_product.status AS STATUS, order_product.qty AS QTY_ORD, products.stock AS STOCK FROM order_product JOIN products ON order_product.id_product = products.id_product WHERE order_product.id_order ='".$idOrder."'";
		$sql = $conn->query($query_select_product);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		for ($i=0; $i < count($result); $i++) { 

			if ($result[$i]['STATUS'] == 0) {

				$stock_update = ($result[$i]['STOCK']+$result[$i]['QTY_ORD']);

			}else{

				$stock_update = ($result[$i]['STOCK']-$result[$i]['QTY_ORD']);

			}
			
			$update_product = "UPDATE products SET stock='".$stock_update."' WHERE id_product='".$result[$i]['ID_PRD']."'";
			$sql_update_product = $conn->query($update_product);

		}	

	}

	echo $idOrder;
	?>