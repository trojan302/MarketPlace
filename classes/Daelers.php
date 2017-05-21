<?php 

class Daelers extends Database {

	public function getUserOrders($id_daeler){

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
						order_product.status AS O_STATUS, 
						order_product.deleted AS O_DELETED 
					FROM 
						order_product 
					JOIN 
						products 
					ON 
						order_product.id_product = products.id_product 
					JOIN 
						users 
					ON 
						order_product.id_user = users.id_user 
					WHERE 
						users.id_user!='".$id_daeler."'
					AND 
						products.id_user='".$id_daeler."'
					GROUP BY 
						order_product.id_order;";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}
	
	public function getDaelerProducts($id_user){

		$query = "SELECT products.*, categories.name AS categories 
				FROM products JOIN categories 
				ON products.id_cat = categories.id_cat 
				JOIN users ON users.id_user = products.id_user
				WHERE products.id_cat=categories.id_cat AND users.id_user = '".$id_user."'
				ORDER BY products.id_product DESC";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

}

?>