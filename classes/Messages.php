<?php 

class Messages extends Database {

	public function get_messages($id_user){

		$query = "SELECT 
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
					WHERE messages.to_user = '".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

}

?>