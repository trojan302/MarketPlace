<?php 


if (isset($_POST['user_send_message'])) {

	$data = array(
		'from_user' => $_POST['from_user'],
		'to_user' => $_POST['to_user'],
		'body' => $_POST['body'],
		'status' => 'user'
	);
	
	$kirim = $messages->kirim_pesan($data);

	if($kirim == true){
		header('Refresh:0; url=http://localhost/market/user/profile.php?success='. urlencode('Pesan Terkirim'));
	}else{
		header('Refresh:0; url=http://localhost/market/user/profile.php?error='. urlencode('Oops! Pesan tidak terkirim!'));
	}

}

if (isset($_POST['member_send_message'])) {

	if ($_FILES['attachment']['name'] == '') {

		$data = array(
			'from_user' => $_POST['from_user'],
			'to_user' => $_POST['to_user'],
			'body' => $_POST['body'],
			'status' => 'user'
		);

	}else{

		$data = array(
			'from_user' => $_POST['from_user'],
			'to_user' => $_POST['to_user'],
			'body' => $_POST['body'],
			'attachment' => $_FILES['attachment']['name'],
			'attachment_tmp' => $_FILES['attachment']['tmp_name'],
			'attachment_size' => $_FILES['attachment']['size'],
			'status' => 'member'
		);

	}
	
	$kirim = $messages->kirim_pesan($data);

	if($kirim == true){
		header('Refresh:0; url=http://localhost/market/member/profile.php?success='. urlencode('Pesan Terkirim'));
	}else{
		header('Refresh:0; url=http://localhost/market/member/profile.php?error='. urlencode('Oops! Pesan tidak terkirim!'));
	}

}

if (isset($_POST['admin_send_message'])) {

	if ($_FILES['attachment']['name'] == '') {

		$data = array(
			'from_user' => $_POST['from_user'],
			'to_user' => $_POST['to_user'],
			'body' => $_POST['body'],
			'status' => 'user'
		);

	}else{

		$data = array(
			'from_user' => $_POST['from_user'],
			'to_user' => $_POST['to_user'],
			'body' => $_POST['body'],
			'attachment' => $_FILES['attachment']['name'],
			'attachment_tmp' => $_FILES['attachment']['tmp_name'],
			'attachment_size' => $_FILES['attachment']['size'],
			'status' => 'member'
		);

	}
	
	$kirim = $messages->kirim_pesan($data);

	if($kirim == true){
		header('Refresh:0; url=http://localhost/market/admin/messages.php?success='. urlencode('Pesan Terkirim'));
	}else{
		header('Refresh:0; url=http://localhost/market/admin/messages.php?error='. urlencode('Oops! Pesan tidak terkirim!'));
	}

}


?>