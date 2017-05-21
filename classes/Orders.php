<?php 


class Orders extends Database{

	public function auto_insert_data_transaction(){

		// $month = date('Y-m');
		// $now = date('Y-m-d h:i:s');

		// $query 	= "SELECT order_product.id_product AS ID_PRD, order_product.id_user AS ID_USER, order_product.status AS STATUS, order_product.qty AS QTY_ORD, products.stock AS STOCK, order_product.amount AS TOTAL_AMOUNT, order_product.total_price AS TOTAL_EARNING, order_product.id_order AS ID_ORDER, DATE_FORMAT(order_product.order_date, '%Y-%m') AS ORDER_DATE FROM order_product JOIN products ON order_product.id_product = products.id_product WHERE order_product.status=1";
		// $sql 	= $this->db->query($query);
		// $result = $sql->fetch_assoc();

		// if (!$result['ID_ORDER']) {

		// 	if ( $month >= $result['ORDER_DATE']) {
				
		// 		$query 	= "INSERT INTO `transactions`(`id_transaction`, `id_order`, `id_product`, `id_user`, `gross_income`, `net_income`, `date_transaction`) VALUES ('','".$result['ID_ORDER']."','".$result['ID_PRD']."','".$result['ID_USER']."','".$result['TOTAL_EARNING']."','".$result['TOTAL_AMOUNT']."','".$now."')";
		// 		$sql 	= $this->db->query($query);

		// 	}

		// }

		// return error_reporting(0);

	}

	public function delete_scheduler(){

		$query = "SELECT id_order, out_of_date FROM order_product";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		foreach ($result as $data) {
			
			if ( date('Y-m-d') >= $data['out_of_date']) {
				
				$query = "DELETE FROM order_product WHERE id_order='".$data['id_order']."'";
				$sql = $this->db->query($query);

			}

		}

		return error_reporting(0);

	}

	public function get_data_order(){

		$query = "SELECT order_product.id_order AS O_ID_ORDER, CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT, CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, order_product.account_name AS O_ACCOUNT_NAME, order_product.amount AS O_AMOUNT, order_product.tax AS O_TAX, order_product.total_price AS O_TOTAL_PRICE, order_product.status AS O_STATUS, order_product.id_user AS O_ID_USER FROM order_product JOIN products ON order_product.id_product = products.id_product JOIN users ON order_product.id_user = users.id_user GROUP BY order_product.id_order ORDER BY order_product.id_order DESC";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function num_order(){

		$query = "SELECT * FROM order_product";
		$sql = $this->db->query($query);
		$num = mysqli_num_rows($sql);

		return $num;

	}

	public function auth_accaount_payment($account_name){

		$query = "SELECT account_name FROM order_product WHERE account_name='".$account_name."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result['account_name'];

	}

	public function get_user_order_payment($data){

		$query = "SELECT
					order_product.id_order AS O_ID_ORDER, 
					CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, 
					CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT,
					CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, 
					CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, 
					order_product.account_name AS O_ACCOUNT_NAME, 
					order_product.amount AS O_AMOUNT, 
					order_product.tax AS O_TAX, 
					order_product.total_price AS O_TOTAL_PRICE, 
					order_product.status AS O_STATUS 
				FROM order_product 
				JOIN products ON order_product.id_product = products.id_product 
				JOIN users ON order_product.id_user = users.id_user 
				WHERE order_product.id_order = '".$data."'
				GROUP BY order_product.id_order";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function all_user_orders(){

		$query = "SELECT
				    order_product.id_order AS O_ID_ORDER, 
					CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, 
					CONVERT(GROUP_CONCAT(products.name SEPARATOR '<br> ') USING utf8) AS O_PRODUCT,
					CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR '<br> ') USING utf8) AS O_QTY, 
					CONVERT(GROUP_CONCAT(order_product.size SEPARATOR '<br> ') USING utf8) AS O_SIZE,
					users.address AS O_ADDR,
					order_product.total_price AS O_TOTAL_PRICE,
					order_product.status AS O_STATUS 
				FROM order_product 
				JOIN products ON order_product.id_product = products.id_product 
				JOIN users ON order_product.id_user = users.id_user 
				GROUP BY order_product.id_order ORDER BY order_product.id_order DESC";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQL_ASSOC);

		return $result;

	}

}


?>