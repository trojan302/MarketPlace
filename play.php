<?php 

// $dompdf->stream('my.pdf',array('Attachment'=>0));


require_once './vendor/autoload.php';
$QRCodeReader = new Libern\QRCodeReader\QRCodeReader();

$conn = new MySQLi('localhost','root','','project_ecommerce');

function get_user_order($id_order){

	global $conn;
		
	$query = "SELECT order_product.id_order AS O_ID_ORDER, CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT, CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, order_product.account_name AS O_ACCOUNT_NAME, order_product.amount AS O_AMOUNT, order_product.tax AS O_TAX, order_product.total_price AS O_TOTAL_PRICE, order_product.status AS O_STATUS FROM order_product JOIN products ON order_product.id_product = products.id_product JOIN users ON order_product.id_user = users.id_user AND order_product.id_order = '".$id_order."' GROUP BY order_product.id_order";
	$sql = $conn->query($query);
	$result = $sql->fetch_all(MYSQLI_ASSOC);

	if (count($result) < 1) {
		return 'Data Order Not Found!';
	}

	return $result;

}

?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
	<input type="file" name="billing_upload">
	<button type="submit">Scan</button>
</form>

<pre>

<?php 

if (isset($_FILES['billing_upload']['name'])) {

$file_temp = $_FILES['billing_upload']['tmp_name'];
$file_name = $_FILES['billing_upload']['name'];

move_uploaded_file($file_temp, 'assets/images/payments/'.$file_name);


$qrcode_text = $QRCodeReader->decode('assets/images/payments/'.$file_name);

$data = get_user_order($qrcode_text);

	echo '<pre>';
	print_r($data);


}else{

	echo "Information display here...";

}

?>

</pre>
