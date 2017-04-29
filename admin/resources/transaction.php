<?php 

$conn = new MySQLi('localhost','root','','project_ecommerce');

$query_select = "SELECT
  DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m') AS `DateTrasaction`,
  COUNT(`transactions`.`id_product`) AS `Total`,
  SUM(`transactions`.`gross_income`) AS `Gross`,
  SUM(`transactions`.`net_income`) AS `Net`
FROM `transactions` WHERE DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
  BETWEEN '2017-01' AND DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
GROUP BY DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
ORDER BY `date_transaction`";

$sql_select = $conn->query($query_select);
$data = array();

while($result_select = $sql_select->fetch_assoc()){

	$data[] = array(
		'm' => $result_select['DateTrasaction'],
		'a' => $result_select['Total']
	);

}

echo json_encode($data);

?>