<?php 

class Cart extends Database{

	public $discount;

	public function discount($total_price){
		$this->discount = ($total_price - ($total_price*0.03) + ($total_price*0.05));

		return $this->discount;
	}  

	public function cart_rules($id_user, $total_price){

		$query = "SELECT members.name AS Member  FROM users JOIN members ON users.id_member = members.id_member WHERE users.id_user='$id_user'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		if ($result['Member'] == 'Premium') {

			$total_plus_discount = $total_price - ($total_price * 0.03) + ($total_price * 0.05);

			return $total_plus_discount;

		}else{

			$tax_ppn = ($total_price * 0.05);
			$total_price_plus_ppn = ($total_price + $tax_ppn);

			return $total_price_plus_ppn;

		}

	}

	public function add_to_cart($data){

		$id_product = $data['id_product'];
		$id_session	= $data['id_session'];
		$size 		= $data['size'];
		$qty 		= $data['qty'];

		$cek_cart = "SELECT id_product FROM cart WHERE id_product='".$id_product."'";
		$sql_cek  = $this->db->query($cek_cart);

		if (mysqli_num_rows($sql_cek) > 0) {

			return false;

		}else{

			$query = "INSERT INTO `cart`(`id_cart`, `id_product`, `id_session`, `qty`, `size`) VALUES ('','".$id_product."','".$id_session."','".$qty."','".$size."')";
			$sql = $this->db->query($query);

			return true;

		}

	}

	public function cart_count($id_session){

		$query = "SELECT * FROM cart WHERE id_session='".$id_session."'";
		$sql = $this->db->query($query);
		$num_rows = mysqli_num_rows($sql);

		return $num_rows;

	}

	public function cart_items($id_session){

		$query = "SELECT cart.id_product AS C_ITEM, cart.id_cart AS C_ID, products.name AS C_NAME, products.price AS C_PRICE, cart.qty AS C_QTY, cart.size AS C_SIZE FROM cart,products WHERE cart.id_session = '".$id_session."' AND cart.id_product = products.id_product";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function delete_cart($id_cart){

		$query = "DELETE FROM cart WHERE id_cart='".$id_cart."'";
		$sql = $this->db->query($query);

		return $sql;

	}

	public function update_cart($data){

		$qty 		= $data['qty'];
		$size 		= $data['size'];
		$id_cart 	= $data['id_cart'];

		$query = "UPDATE cart SET qty='".$qty."', size='".$size."' WHERE id_cart='".$id_cart."'";
		$sql = $this->db->query($query);

		return $sql;

	}

	public function total_price_cart($id_session){

		$query = "SELECT SUM(products.price) AS PRICE, cart.qty AS QTY FROM cart JOIN products ON products.id_product = cart.id_product WHERE cart.id_session='".$id_session."' GROUP BY cart.qty";
		$sql = $this->db->query($query);
		$sum = 0;
		while($result = $sql->fetch_assoc()){

			$sum += ($result['PRICE']*$result['QTY']);

		}

		return $sum;

	}

	public function check_account_number($account_number){

		$query = "SELECT account_number FROM order_product WHERE account_number='".$account_number."'";
		$sql = $this->db->query($query);
		$res = mysqli_num_rows($sql);

		return $res;

	}

	public function user_checkout($params){

		$date = new DateTime(date('Y-m-d'));
		$date->modify('+3 day');
		$out_of_date = $date->format('Y-m-d');
		$order_date = date('Y-m-d');

		$data_order = array();

		$query = "SELECT * FROM cart WHERE id_session='".$params['id_user']."'";
		$sql = $this->db->query($query);
		while($result = $sql->fetch_assoc()){

			$data_order[] = $result;

		}


		for ($i=0; $i < count($data_order); $i++) { 
			$sql = "INSERT INTO `order_product`(`id_order`, `id_product`, `id_user`, `qty`, `size`, `account_name`, `amount`, `tax`, `total_price`, `out_of_date`, `order_date`, `status`, `deleted`) VALUES ('".$params['id_order']."','".$data_order[$i]['id_product']."','".$data_order[$i]['id_session']."','".$data_order[$i]['qty']."','".$data_order[$i]['size']."','".$params['name_of_account']."','".$params['amount']."','".$params['tax']."','".$params['total_price']."','".$out_of_date."','".$order_date."',0,0)";
			$query_insert = $this->db->query($sql);
		}

		if ($query_insert === TRUE) {
			$msg = true;
			$query = "DELETE FROM cart WHERE id_session='".$params['id_user']."'";
			$sql = $this->db->query($query);
		}else{
			$msg = $this->db->error;
		}

		return $msg;

	}

	public function get_billing($billing, $id_order){

		$date = date('Y-m-d');

		$query = "SELECT order_product.*, products.name AS name, products.price AS price FROM order_product JOIN products ON order_product.id_product = products.id_product WHERE order_product.id_user='".$billing."' AND order_product.order_date='".$date."' AND order_product.id_order='".$id_order."' " ;
		$sql = $this->db->query($query);
		$data = array();
		while($result = $sql->fetch_assoc()){
			$data[] = $result;
		}

		return $data;

	}

}


?>