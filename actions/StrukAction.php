<?php 


if (isset($_FILES['struk_transfer']['name'])) {
	
	$dir = '../assets/images/struk_payment/';

	$id_user 		= $_POST['id_user'];
	$id_order 		= $_POST['id_order'];

	$s_filename 	= $_FILES['struk_transfer']['name'];
	$s_file_size 	= $_FILES['struk_transfer']['size'];
	$s_file_tmp 	= $_FILES['struk_transfer']['tmp_name'];
	$s_file_type    = pathinfo($s_filename);
	$extension      = $s_file_type['extension'];

	$rename 		= date('dmYhis').'-'.$_POST['id_user'].'-struk-payment.'.$extension;
	$upload_path 	= $dir.$rename;
	$upload_url 	= str_replace('../','http://localhost/market/', $upload_path);

	$availabe   = array('jpg','jpeg','png','gif');

	if (file_exists($upload_path)) {
		echo "<script>window.location.href=window.location.pathname + 'profile.php?error=true'</script>";
		exit;
	}

	if (!in_array($extension, $availabe)) {
		echo "<script>window.location.href=window.location.pathname + 'profile.php?error=true'</script>";
		exit;
	}
	
	if ($s_file_size > 10485760) {
		echo "<script>window.location.href=window.location.pathname + 'profile.php?error=true'</script>";
		exit;
	}

	$data = array(
		'id_user' => $id_user,
		'id_order' => $id_order,
		'upload_path' => $upload_path,
		'upload_url' => $upload_url,
		'tmp' => $s_file_tmp
	);

	$user->user_upload_struk($data);

}

?>