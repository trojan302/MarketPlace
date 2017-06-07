<div class="container" style="padding-top: 30px;margin-bottom: 150px;">
	<?php $dataUser = $user->get_user_details($_SESSION['users']) ?>
	<hr>

	<div class="container row">

		<div class="col-lg-3 text-center">
			<img src="<?= $dataUser['avatar'] ?>" class="img-circle img-responsive">
			<br><br>
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
				<div class="input-group">
			      <input type="file" name="avatar" class="form-control">
			      <input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
			      <span class="input-group-btn">
			        <input type="submit" name="ganti_avatar" value="Ganti Avatar" class="btn btn-primary">
			      </span>
			    </div>
			</form>
			<hr>
			<h3><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></h3>
			<div class="text-left">
				<i class="glyphicon glyphicon-map-marker"></i> <?= $dataUser['address'] ?> <br>
				<i class="glyphicon glyphicon-phone-alt"></i> <?= rtrim(chunk_split($dataUser['phone'], 4, '-'), '-') ?> <br>
				<i class="glyphicon glyphicon-envelope"></i> <?= $dataUser['email'] ?> <br>
				<span><b>Zip Code</b> : </span> <?= $dataUser['zip_code'] ?> <br>
				<span><b>Date Created</b> : </span> <?= $dataUser['created'] ?> <br>
				<span><b>Date Updated</b> : </span> <?= $updated = ($dataUser['updated'] != NULL) ? $dataUser['zip_code'] : 'Not Updated'; ?> <br>
				<?php if ($_SESSION['scopes'] == 'member/'): ?>
				<hr>
					<div class="help-block">
						<i class="glyphicon glyphicon-info-sign"></i> Your are member of Betta Shop, every transaction you have a 3% discount.
					</div>
				<?php endif ?>
				<hr>
				<?php if (isset($_GET['error'])  == 'true'): ?>
				<div class="alert alert-danger" role="alert" id="alert_struk">
				  <p>Error Uploading!</p>
				</div>
				<?php elseif (isset($_GET['success'])  == 'true'): ?>
					<div class="alert alert-success" role="alert" id="alert_struk">
				  <p>Uploading successfully!</p>
				</div>
				<?php endif; ?>
				<form action="" method="POST" enctype="multipart/form-data" class="panel panel-primary"">
				<div class="panel-heading">Upload Payment</div>
					<div class="panel-content form-group" style="padding:10px;">
						<label>Upload Struk Transfer</label>
						<div class="input-group">
					      <input type="file" class="form-control" name="struk_transfer">
					      <span class="input-group-addon">
					        <i class="fa fa-paperclip"></i> Struk Payment
					      </span>
					    </div>
					    <br>
					    <label>Your Orders</label>
					    <div class="form-group">
					      <select name="id_order" class="form-control">
					      	<option value="">-- Your Orders --</option>
					      	<?php foreach ($user->get_user_order($_SESSION['users']) as $data): ?>
					      		<?php if ($data['O_STATUS'] != 1): ?>
							      	<option value="<?= $data['O_ID_ORDER'] ?>">
							      		<?= $data['O_PRODUCT'] ?>  (<?= $data['O_QTY'] ?>)
							      	</option>
					      		<?php endif ?>
					      	<?php endforeach ?>
					      </select>
					    </div>

				        <button class="btn btn-default" type="submit">Send!</button>
						<input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
					</div>
				</form>
			</div>
		</div>

		<div class="col-lg-9">

			<?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Woow!</strong> <?= $_GET['success']; ?>
			</div>
			<?php }elseif (isset($_GET['error'])){ ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Oops!</strong> <?= $_GET['error']; ?>
			</div>
			<?php } ?>

			<?php

				if (!isset($_GET['msg']) && !isset($_GET['view'])) {
					require_once '_CardAccordion.php'; 
				}else{
					require_once '_ReadMessage.php';
				} 
			?>

		</div>

	</div>

</div>