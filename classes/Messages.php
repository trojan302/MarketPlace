<?php 

class Messages extends Database {

	public function get_messages($id_user){

		$query = "SELECT 
						messages.id_message AS id_message, 
						messages.to_user AS to_user, 
						messages.from_user AS from_user, 
						messages.view AS view, 
						messages.body AS body, 
						messages.date AS m_date, 
						users.email AS email,
						members.name AS member
						FROM messages JOIN users 
						ON messages.from_user = users.id_user
						JOIN members ON users.id_member = members.id_member 
					WHERE messages.to_user = '".$id_user."' ORDER BY id_message DESC";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function get_daeler_email(){

		$query 	= "SELECT email, id_user FROM users WHERE id_member=2";
		$sql 	= $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result; 

	}

	public function baca_pesan($id_message){

		$query 	= "SELECT * FROM messages WHERE id_message='".$id_message."'";
		$sql 	= $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function update_view($id_message){

		$query = $this->db->query("UPDATE messages SET view=1 WHERE id_message='".$id_message."'");

	}

	public function user_info($id_user){

		$query = "SELECT CONCAT(firstname,' ',lastname) AS fullname, email FROM users WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result;

	}

	public function kirim_pesan($data){

		if ($data['status'] == 'user') {

			$query = "INSERT INTO messages (`from_user`,`to_user`,`body`) VALUES ('".$data['from_user']."','".$data['to_user']."','".$data['body']."')";
			$sql = $this->db->query($query);
			return $sql;

		}else{

			$attachment 		= $data['attachment'];
			$attachment_tmp 	= $data['attachment_tmp'];
			$attachment_size 	= $data['attachment_size'];

			$attachment_todir 	= '../assets/images/attachments/'.$attachment;
			$attachment_tourl 	= 'http://localhost/market/assets/images/attachments/'.$attachment;

			if ($attachment_size < 1000000) {
				
				$query = "INSERT INTO messages (`id_message`,`from_user`,`to_user`,`body`,`attachment`) VALUES ('','".$data['from_user']."','".$data['to_user']."','".$data['body']."','".$attachment_tourl."')";
				$sql = $this->db->query($query);

				move_uploaded_file($attachment_tmp, $attachment_todir);

				return $sql;

			}

		}

	}

	public function list_pelanggan($id_user){

		$query = "SELECT 
					users.id_user AS id_user, 
					users.email AS email
				FROM
					messages
				JOIN
					users
				ON 
					messages.from_user = users.id_user
				WHERE
					messages.to_user = '".$id_user."'";
		$sql 	= $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

}

?>