<?php 

class Payments extends Database
{
	public function get_user_payments_status($id_user)
	{

		$query = "SELECT status FROM struk_payment WHERE id_user='".$id_user."'";
		$sql = $this->db->query($query);
		$result = $sql->fetch_assoc();

		return $result['status'];

	}

	public function get_all_payments(){

		$query = "SELECT 
					struk_payment.id_struk AS ID_STRUK,
					CONCAT(users.firstname, ' ' ,users.lastname) AS FULLNAME,
					struk_payment.struk_image AS IMAGES,
					struk_payment.status AS STATUS
				FROM struk_payment JOIN users
				ON struk_payment.id_user = users.id_user ORDER BY struk_payment.id_struk DESC";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function get_all_data_payments(){

		$query = "SELECT
				  DATE_FORMAT(`transactions`.`date_transaction`, '%d, %M %Y') AS `DateTrasaction`,
				  COUNT(`transactions`.`id_product`) AS `Total`,
				  SUM(`transactions`.`gross_income`) AS `Gross`,
				  SUM(`transactions`.`net_income`) AS `Net`
				FROM `transactions` WHERE DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
				  BETWEEN '2017-01' AND DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
				GROUP BY DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
				ORDER BY `date_transaction` DESC LIMIT 5";
		$sql = $this->db->query($query);
		$result = $sql->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	public function get_total_earnings(){

		$query_select = "SELECT
			SUM(Total_Data) AS TotalTransaction,
			SUM(Gross) AS TotalGrossIncome,
			SUM(Net) AS TotalNetIncome
		FROM (
				SELECT COUNT(id_product) AS Total_Data,
				SUM(gross_income) AS Gross,
				SUM(net_income) AS Net
				FROM transactions
					WHERE DATE_FORMAT(date_transaction, '%Y-%m')
		  		BETWEEN '2017-01' AND DATE_FORMAT(date_transaction, '%Y-%m')
		  		GROUP BY id_transaction, DATE_FORMAT(date_transaction, '%Y-%m') 
		  		ORDER BY DATE_FORMAT(date_transaction, '%Y-%m') 
		) AS DataTotal";

		$sql_select = $this->db->query($query_select);
		$data = array();
		$result_select = $sql_select->fetch_all(MYSQLI_ASSOC);
		$earnings = ($result_select[0]['TotalGrossIncome']-$result_select[0]['TotalNetIncome']);

		return $earnings;

	}
}

?>