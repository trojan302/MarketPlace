<?php 

class Generators extends Database{

	public function userID(){

		$query = "SELECT (CASE WHEN (LENGTH(id_user) > 12) THEN MAX(CAST(REPLACE(SUBSTR(id_user, -3), '-','') AS UNSIGNED)) ELSE MAX(CAST(REPLACE(SUBSTR(id_user, -2), '-','') AS UNSIGNED)) END) AS NEW_ID FROM users";
		$sql = $this->db->query($query);
		$last_id = $sql->fetch_assoc();

		return "USR-".date('md').'-'.date('y').'-'. ($last_id['NEW_ID']+1);

	}

	public function productID(){

		$query = "SELECT (CASE WHEN (LENGTH(id_product) > 14) THEN MAX(CAST(REPLACE(SUBSTR(id_product, -3), '-','') AS UNSIGNED)) ELSE MAX(CAST(REPLACE(SUBSTR(id_product, -2), '-','') AS UNSIGNED)) END) AS NEW_ID FROM products";
		$sql = $this->db->query($query);
		$last_id = $sql->fetch_assoc();

		return "PRD-".date('md').'-'.date('y').'-'.($last_id['NEW_ID']+1);

	}

	public function orderID(){

		$query = "SELECT (CASE WHEN (LENGTH(id_order) > 14) THEN MAX(CAST(REPLACE(SUBSTR(id_order, -3), '-','') AS UNSIGNED)) ELSE MAX(CAST(REPLACE(SUBSTR(id_order, -2), '-','') AS UNSIGNED)) END) AS NEW_ID FROM order_product";
		$sql = $this->db->query($query);
		$last_id = $sql->fetch_assoc();

		return "ORD-".date('md').'-'.date('y').'-'.($last_id['NEW_ID']+1);

	}

	public function transactionsID(){

		$query = "SELECT (CASE WHEN (LENGTH(id_order) > 14) THEN MAX(CAST(REPLACE(SUBSTR(id_order, -3), '-','') AS UNSIGNED)) ELSE MAX(CAST(REPLACE(SUBSTR(id_order, -2), '-','') AS UNSIGNED)) END) AS NEW_ID FROM transactions";
		$sql = $this->db->query($query);
		$last_id = $sql->fetch_assoc();

		return "TR-".date('md').'-'.date('y').'-'.($last_id['NEW_ID']+1);

	}

	public function IDR($number) {  
	    $idr = '<sup><i>IDR</i></sup> '.number_format($number, 2, ',', '.');  
	    return $idr;  
	}

	public function select_size($size){
		$size_data = explode(', ', $size);
		echo '<select name="size" required>';
				echo '<option value="">-- Select Size --</option>';
		foreach ($size_data as $data) {
				echo '<option value="'.$data.'">'.$data.'</option>';
		}
		echo '</select>';
	}

	public function user_select_size($id_product){

		$query = "SELECT products.size AS P_SIZE, cart.size AS C_SIZE FROM cart, products WHERE cart.id_product = products.id_product AND products.id_product = '".$id_product."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		$size_data = explode(', ', $result['P_SIZE']);
		echo '<select name="size" required>';
				echo '<option value="">-- Select Size --</option>';
				echo '<option value="'.$result['C_SIZE'].'" selected>'.$result['C_SIZE'].'</option>';
		foreach ($size_data as $data) {
				echo '<option value="'.$data.'">'.$data.'</option>';
		}
		echo '</select>';

	}

	public function get_tokens($length = 150) {
	    $randstr='';
	    srand((double) microtime(TRUE) * 1000000);
	    $chars = array(
	        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
	        'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
	        '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 
	        'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

	    for ($rand = 0; $rand <= $length; $rand++) {
	        $random = rand(0, count($chars) - 1);
	        $randstr .= $chars[$random];
	    }
	    return $randstr;
	}

}

?>