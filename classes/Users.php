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

	public function update_admin_profile($data){

		if (is_array($data)) {
			
			$id_user = $data['id_user'];
			$firstname = $data['firstname'];
			$lastname = $data['lastname'];
			$email = $data['email'];
			$address = $data['address'];
			$zip_code = $data['zip_code'];
			$phone = $data['phone'];
			$no_rek = $data['no_rek'];

			$query = "UPDATE `users` SET `username`='".$username."',`firstname`='".$firstname."',`lastname`='".$lastname."',`address`='".$address."',`zip_code`='".$zip_code."',`phone`='".$phone."',`email`='".$email."', `no_rek`='".$no_rek."' WHERE `id_user`='".$id_user."'";
			$update = $this->db->query($query);

			return $update;

		}

	}

	public function check_pass($id_user, $old_pass){
		
		$query = "SELECT password FROM users WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();
		$status='';

		if (md5($old_pass) != $result['password']) {
			$status = false;
		}else{
			$status = true;
		}

		return $status;

	}

	public function update_admin_password($data){

		if (is_array($data)) {
			
			$id_user = $data['id_user'];
			$old_pass = $data['old_pass'];
			$new_pass = $data['new_pass'];
			$updated   = date('Y-m-d');

			$query = "UPDATE `users` SET `password`='".md5($new_pass)."', `updated`='".$updated."' WHERE `id_user`='".$id_user."'";
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

	public function send_to($id_user){

		$query = "SELECT CONCAT(firstname, ' ' ,lastname) AS fullname, email FROM users WHERE id_user = '".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result;

	}

	public function send_message($id_user){

		$to_id 		= $id_user;
		$from_id	= 'USR-0406-17-1';

		$to_name 	= $this->send_to($to_id);
		$from_name 	= $this->send_to($from_id);

		$body = "
			Terimakasih ".ucwords($to_name['fullname'])." telah melakukan transaksi di situs kami. Barang yang anda pesan akan segera kami proses. Untuk pertannyaan lebih lanjut silahkan hubungi kami via messager yang telah kami sediakan.
			<br><br>
			The Best Regards,
			". ucwords($from_name['fullname']);

		$query = "INSERT INTO messages (`from`,`to`,`body`) VALUES ('".$to_id."','".from_id."','".$body."')";
		$sql = $this->db->query($query);

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
			$this->send_message($id_user);
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

	public function get_admin_rekening(){

		$query = "SELECT no_rek FROM users WHERE id_user='USR-0406-17-1'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result['no_rek'];

	}

	public function ganti_avatar($data){

		$avatar_url = $data['avatar_url'];
		$id_user 	= $data['id_user'];

		$sql = "UPDATE users SET avatar='".$avatar_url."' WHERE id_user='".$id_user."'";
		$update = $this->db->query($sql);

		return $update;

	}

	public function get_user_avatar($id_user){

		$query 	= "SELECT avatar FROM users WHERE id_user='".$id_user."'";
		$sql 	= $this->db->query($quer);
		$result = $sql->fetch_assoc();

		return $result['avatar'];

	}
	
}


?>