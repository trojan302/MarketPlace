<?php 

$baca_pesan = $messages->baca_pesan($_GET['msg']);
$messages->update_view($_GET['msg']);

?>

<div class="card" style="padding: 20px;">

	<h1>From : <?= ucwords($messages->user_info($baca_pesan[0]['from_user'])['fullname']) ?></h1>
	<span> 
		<i class="fa fa-envelope-o"></i> 
		&nbsp;&nbsp; 
		<?= $messages->user_info($baca_pesan[0]['from_user'])['email'] ?> 
	</span> 
	&nbsp;&nbsp;&nbsp; 
	<span> 
		<i class="fa fa-calendar"></i> 
		&nbsp;&nbsp; 
		<?= $baca_pesan[0]['date'] ?> 
	</span>

	<div style="padding: 10px;border:1px solid #232323;margin: 10px;">
		<?= $baca_pesan[0]['body'] ?>
	</div>

	<a href="#!" onclick="window.history.back()" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>

</div>