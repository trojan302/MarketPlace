<?php 

class Users extends Database
{
	
	public function logged_in($data){

		$email = $data['email'];
		$pass  = md5($data['password']);

		$query = "SELECT * FROM users WHERE email='".$email."' AND password='".$pass."' AND status != 0";
		$sql   = $this->db->query($query);
		$success = (mysqli_num_rows($sql) > 0) ? true : false;
		$data = $sql->fetch_assoc();

		if($success == true){

			if ($data['id_member'] == 1) {
				
				$_SESSION['users'] = $data['id_user'];
				$_SESSION['firstname'] = $data['firstname'];
				$_SESSION['lastname'] = $data['lastname'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['scopes'] = 'user/';

				header('Location: http://localhost/market/user/index.php');

			}elseif ($data['id_member'] == 2) {

				$_SESSION['users'] = $data['id_user'];
				$_SESSION['firstname'] = $data['firstname'];
				$_SESSION['lastname'] = $data['lastname'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['scopes'] = 'member/';

				header('Location: http://localhost/market/member/index.php');

			}else{

				$_SESSION['users'] = $data['id_user'];
				$_SESSION['firstname'] = $data['firstname'];
				$_SESSION['lastname'] = $data['lastname'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['scopes'] = 'admin/';

				header('Location: http://localhost/market/admin/index.php');
			}


		}else{

			header('Location: http://localhost/market/');

		}

	}

	public function is_loggedin($session_users){

		if (!isset($session_users)) {
			header('Location: http://localhost/market/');
		}

	}

	public function sign_up($data){

		$id_user = $data['id_user'];
		$username = $data['username'];
		$firstname = $data['firstname'];
		$lastname = $data['lastname'];
		$phone = $data['phone'];
		$member = $data['member'];
		$email = $data['email'];
		$password = $data['password'];
		$address = $data['address'];
		$zip_code = $data['zip_code'];
		$created = $data['created'];
		$status = ($data['member'] == 2) ? 0 : 1;

		$query = "INSERT INTO `users`(`id_user`, `username`, `password`, `firstname`, `lastname`, `address`, `zip_code`, `phone`, `email`, `id_member`, `created`, `updated`, `status`) VALUES ('".$id_user."','".$username."','".$password."','".$firstname."','".$lastname."','".$address."','".$zip_code."','".$phone."','".$email."','".$member."','".$created."',NULL,'".$status."')";
		$sql = $this->db->query($query);

		if($sql){
			header('Location: http://localhost/market/signup.php?success=' . urlencode('Thanks for registration...'));
		}else{
			header('Location: http://localhost/market/signup.php?error=' . urlencode('Registration failed!'));
		}

	}

	public function all_users(){

		$query = "SELECT users.*, members.* FROM users JOIN members ON users.id_member=members.id_member WHERE users.id_member!=3 AND users.status=1";
		$sql = $this->db->query($query);
		$res = $sql->fetch_all(MYSQLI_ASSOC);

		return $res;

	}

	public function delete_user($id_user){

		$query = "DELETE FROM users WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);

		return $sql;

	}

	public function update_user($data){

		if (is_array($data)) {
			
			$id_user = $data['id_user'];
			$username = $data['username'];
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];
			$id_member = $data['id_member'];
			$email = $data['email'];
			$address = $data['address'];
			$zip_code = $data['zip_code'];
			$phone = $data['phone'];
			$status = $data['status'];

			$query = "UPDATE `users` SET `username`='".$username."',`firstname`='".$firstname."',`lastname`='".$lastname."',`address`='".$address."',`zip_code`='".$zip_code."',`phone`='".$phone."',`email`='".$email."',`id_member`='".$id_member."',`status`='".$status."' WHERE `id_user`='".$id_user."'";
			$update = $this->db->query($query);

			return $update;

		}

	}

	public function get_user_details($id_user){

		$query = "SELECT * FROM users WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result;

	}

	public function get_num_order($id_user){

		$query = "SELECT * FROM order_product WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);
		$num = mysqli_num_rows($sql);

		return $num;

	}

	public function get_user_order($id_user){
		
		$query = "SELECT order_product.id_order AS O_ID_ORDER, CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT, CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, order_product.account_name AS O_ACCOUNT_NAME, order_product.amount AS O_AMOUNT, order_product.tax AS O_TAX, order_product.total_price AS O_TOTAL_PRICE, order_product.status AS O_STATUS, order_product.deleted AS O_DELETED FROM order_product JOIN products ON order_product.id_product = products.id_product JOIN users ON order_product.id_user = users.id_user WHERE users.id_user='".$id_user."' GROUP BY order_product.id_order";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function user_upload_struk($data){

		$id_user 		= $data['id_user'];
		$id_order 		= $data['id_order'];
		$upload_path 	= $data['upload_path'];
		$upload_url 	= $data['upload_url'];
		$tmp 			= $data['tmp'];

		$query = "INSERT INTO struk_payment (id_struk,id_user,id_order,struk_image,status) VALUES ('','".$id_user."','".$id_order."','".$upload_url."',0)";
		$sql = $this->db->query($query);

		if ($sql) {
			move_uploaded_file($tmp, $upload_path);
			echo "<script>window.location.href='http://localhost/market/user/profile.php?success=true'</script>";
		}else{
			echo "<script>window.location.href='http://localhost/market/user/profile.php?error=true'</script>";
		}

	}

	public function user_notifications(){

		$query = "SELECT 
					users.id_user AS IdUser,
					CONCAT(users.firstname, ' ',users.lastname) AS Fullname,
					users.username AS Username,
					users.email AS Email, 
					users.address AS Address,
					users.phone AS Phone,
					members.name AS Member,
					users.status AS Status
				FROM users JOIN members ON users.id_member = members.id_member WHERE users.status=0";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function settings($id_user){

		$query = "SELECT * FROM users WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result;

	}
	
}


?>