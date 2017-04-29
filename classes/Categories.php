<?php 

class Categories extends Database
{
	public function get_all_categories(){
		
		$query = "SELECT * FROM categories";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function add_category($data){

		$query = "INSERT INTO categories (initial, name) VALUES ('".$data['initial']."','".$data['name']."')";
		$sql = $this->db->query($query);

		return true;

	}

	public function update_category($data){

		$query = "UPDATE categories SET name='".$data['name']."', initial='".$data['initial']."' WHERE id_cat='".$data['id_cat']."'";
		$sql = $this->db->query($query);

		return true;

	}

	public function delete_category($data){
		$query = "DELETE FROM categories WHERE id_cat='".$data."'";
		$sql = $this->db->query($query);

		return true;
	}
}


?>