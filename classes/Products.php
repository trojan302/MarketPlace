<?php 

class Products extends Database {

	public $earnings;

	public function getAllProduct($num){

		$perPage = $num;
		$page    = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

		$start 	 = ($page > 1) ? ($page * $perPage) - $perPage : 0;

		$products = "SELECT * FROM products  ORDER BY RAND() LIMIT $start, $perPage";
		$pResult  = $this->db->query($products);
		$data     = array();
		while ($result = $pResult->fetch_assoc()) {
			$data[] = $result;
		}

		return $data;

	}

	public function getPage($perPage){

		$result = $this->db->query("SELECT * FROM products");
		$total  = mysqli_num_rows($result);
		$data = array();
		while ($res = $result->fetch_assoc()) {
			$data[] = $res;
		}

		$pages = ceil($total/$perPage)+1;

		$pagination = array(
			"numPage" => $pages,
			"total" => $data
		);

		return $pagination;

	}

	public function all_products(){

		$query = "SELECT products.*, categories.name AS categories FROM products JOIN categories ON products.id_cat = categories.id_cat WHERE products.id_cat=categories.id_cat ORDER BY products.id_product DESC";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function categories(){

		$query = "SELECT * FROM categories LIMIT 5";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function totalModal(){

		$query = "SELECT SUM(stock*equity) AS TotalModal FROM products";
		$sql   = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result['TotalModal'];

	}

	public function totalPricing(){

		$query = "SELECT SUM(stock*price) AS TotalPricing FROM products";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result['TotalPricing'];
		
	}

	public function earnings(){

		$this->earnings = ($this->totalPricing() - $this->totalModal());

		return $this->earnings;
		
	}

	public function add_product($data){

		if (is_array($data)) {

		if (isset($data['product_id'])) {
	
				$id_product = $data['product_id'];
				$id_user 	= $data['id_user'];
				$item_name 	= $data['item_name'];
				$stock 		= $data['stock'];
				$id_cat		= $data['id_cat'];
				$size 		= $data['size'];
				$equity		= $data['equity'];
				$price 		= $data['price'];
				$created 	= $data['created'];

				$filename	= $data['filename'];
				$filetmp 	= $data['filetmp'];
				$filesize   = $data['filesize'];

				$fileinfo   = pathinfo($filename)['extension'];
				$fileupload = $id_product.'-'.str_replace(' ', '-',  $item_name).'.'.$fileinfo;  
				$filepath	= '../assets/images/product-img/' . $fileupload;
				$filehost 	= str_replace('../','http://localhost/market/', $filepath);

				$availabe   = array('jpg','jpeg','png','gif');

				if (file_exists($filepath)) {
					return "File Sudah Ada";
				}else{

					if (in_array($fileinfo, $availabe)) {
						
						if ($filesize < 10485760) {
							

							$sql = "INSERT INTO `products`(`id_product`, `id_user`, `name`, `images`, `stock`, `id_cat`, `size`, `equity`, `price`, `created`, `updated`) VALUES ('".$id_product."','".$id_user."','".$item_name."','".$filehost."','".$stock."','".$id_cat."','".$size."','".$equity."','".$price."','".$created."',NULL)";

							$insert = $this->db->query($sql)or die(mysqli_error($this->db));

							if ($insert) {
								move_uploaded_file($filetmp, $filepath);
								return true;
							}else{
								return false;
							}

					}else{
								return "Ukuran melebihi standar";
							}

						}else {
							return "Ekstensi tidak diijinkan";
						}

					}

			}
		}

	}

	public function getImages($id_product){
		
		$query = "SELECT images FROM products WHERE id_product='".$id_product."' LIMIT 1";
		$sql = $this->db->query($query);
		$data = $sql->fetch_assoc();

		$images = str_replace('http://localhost/market/','../', $data['images']);

		return $images;

	}

	public function delete_product($id_product){

		$images = $this->getImages($id_product);

		$query = "DELETE FROM products WHERE id_product='".$id_product."'";
		$sql = $this->db->query($query);
		
		unlink($images);

		return true;

	}

	public function update_product($data){

		if (!in_array('images', $data)) {

				$id_product = $data['id_product'];
				$name 		= $data['name'];
				$size 		= $data['size'];
				$stock		= $data['stock'];
				$id_cat 	= $data['id_cat'];
				$equity 	= $data['equity'];
				$price 		= $data['price'];
				$updated	= date('Y-m-d'); 
			
			$query = "UPDATE products SET name='".$name."', size='".$size."', stock='".$stock."', id_cat='".$id_cat."', equity='".$equity."', price='".$price."', updated='".$updated."' WHERE id_product='".$id_product."'";
			$sql = $this->db->query($query);

			return true;

		}else{

			$id_product = $data['id_product'];
			$name 		= $data['name'];
			$size 		= $data['size'];
			$stock		= $data['stock'];
			$id_cat 	= $data['id_cat'];
			$equity 	= $data['equity'];
			$price 		= $data['price'];
			$updated	= date('Y-m-d'); 
			$old_images	= $data['old_images'];
			$images		= $data['images'];
			$type 		= $data['type'];
			$error 		= $data['error'];
			$image_size = $data['image_size'];
			$tmp 		= $data['tmp'];

			$fileinfo   = pathinfo($images)['extension'];
			$fileupload = $id_product.'-'.str_replace(' ', '-',  $name).'.'.$fileinfo;  
			$filepath	= '../assets/images/product-img/' . $fileupload;
			$filehost 	= str_replace('../','http://localhost/market/', $filepath);
			$fileremove	= str_replace('http://localhost/market/','../', $old_images);

			$query = "UPDATE products SET name='".$name."', size='".$size."', stock='".$stock."', id_cat='".$id_cat."', equity='".$equity."', price='".$price."', images='".$filehost."', updated='".$updated."' WHERE id_product='".$id_product."'";
			$sql = $this->db->query($query);

			if ($sql) {
				unlink($fileremove);
				move_uploaded_file($tmp, $filepath);
			}

			return true;

		}

	}

	public function get_details_item($id_product){
		
		$query = "SELECT products.*, categories.name AS cat_name FROM products, categories WHERE products.id_product = '".$id_product."' AND products.id_cat = categories.id_cat";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result;

	}

	public function num_products(){

		$query = "SELECT * FROM products";
		$sql = $this->db->query($query);
		$num = mysqli_num_rows($sql);

		return $num;

	}

	public function num_shopping_cart(){

		$query = "SELECT COUNT(qty) AS ShoppingCart FROM order_product";
		$sql = $this->db->query($query);
		$num = $sql->fetch_assoc();

		return $num['ShoppingCart'];

	}


}

?>