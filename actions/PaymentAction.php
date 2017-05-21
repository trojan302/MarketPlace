<?php 

// $dompdf->stream('my.pdf',array('Attachment'=>0));

if (isset($_FILES['billing_upload']['name'])) {

	$id_order 		= $_POST['id_order'];
	$account_name 	= $_POST['account_name'];
	$account_number = $_POST['account_number'];
	$filename 		= $_FILES['billing_upload']['name'];
	$filetmp 		= $_FILES['billing_upload']['tmp_name'];
	$filetype 		= pathinfo($filename)['extension'];

	// var_dump($_FILES);

	// die();

	if ($filetype == 'png') {

		move_uploaded_file($filetmp, '../assets/images/payments/'.$filename);
		$qrcode 		= $QRCodeReader->decode('../assets/images/payments/'.$filename);

		if ($account_name == $orders->auth_accaount_payment($account_name)) {

			if ($id_order == $qrcode) {

				$payment = $orders->get_user_order_payment($qrcode);

				if (count($payment) == 0) {
					header('Location: http://localhost/market/member/payment.php#alert-messages');
				}

			}else{
				unlink('../assets/images/payments/'.$filename);
				header('Location: http://localhost/market/member/payment.php#alert-messages');
			}

		}else{
			unlink('../assets/images/payments/'.$filename);
			header('Location: http://localhost/market/member/payment.php#alert-messages');
		}

	}else{

		header('Location: http://localhost/market/member/payment.php#alert-messages');		

	}


}

?>
