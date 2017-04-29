<div class="container" style="padding-top: 30px;margin-bottom: 150px;">
	<?php $dataUser = $user->get_user_details($_SESSION['users']) ?>
	<hr>

	<div class="container row">

		<div class="col-lg-3 text-center">
			<img src="http://fakeimg.pl/250x250/222/fff/?text=<?= $_SESSION['firstname'] ?>&font=lobster" class="img-circle">
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
						<i class="glyphicon glyphicon-info-sign"></i> Your are member of Betta Shop, every transaction you have a 5% discount.
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
				<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Upload Struk Transfer</label>
						<div class="input-group">
					      <input type="file" class="form-control" name="struk_transfer">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="submit">Send!</button>
					      </span>
					    </div>
						<input type="hidden" name="id_user" value="<?= $_SESSION['users'] ?>">
					</div>
				</form>
			</div>
		</div>

		<div class="col-lg-9">
			
			<h2>Your Orders!</h2>
			<hr>

			<table id="table_order_user" class="table table-bordered table-hover table-striped small">
				<thead>
					<tr>
						<th class="text-center">ORDER ID</th>
						<th class="text-center">Product Name</th>
						<th class="text-center">Qty</th>
						<th class="text-center">Size</th>
						<th class="text-center">Amount</th>
						<th class="text-center">Tax</th>
						<th class="text-center">Total Shipping</th>
						<th class="text-center">Order Status</th>
					</tr>
				</thead>
				<tbody>
				<?php if ($user->get_num_order($_SESSION['users']) > 0): ?>
				<?php foreach ($user->get_user_order($_SESSION['users']) as $data): ?>
					<?php if ($data['O_DELETED'] != 1): ?>
						
					<tr <?php if ($data['O_STATUS'] == 1): ?> class="success" <?php else: ?> class="danger" <?php endif ?> >
						<td><?= $data['O_ID_ORDER'] ?></td>
						<td><?= $data['O_PRODUCT'] ?></td>
						<td><?= $data['O_QTY'] ?></td>
						<td><?= $data['O_SIZE'] ?></td>
						<td><?= $generator->IDR($data['O_AMOUNT']) ?></td>
						<td><?= $generator->IDR($data['O_TAX']) ?></td>
						<td><?= $generator->IDR($data['O_TOTAL_PRICE']) ?></td>
						<td class="text-center">
							<?php if ($data['O_STATUS'] == 0): ?>
								<label class="label label-danger">Pending...</label>
							<?php else: ?>
								<a id="delete_order_user" href="javascipt:;" data-user-order="<?= $data['O_ID_ORDER'] ?>" title="delete from order table"><label class="label label-success"><i class="fa fa-truck"></i> Process...</label></a>
							<?php endif ?>
						</td>
					</tr>
					<?php endif ?>
					
				<?php endforeach ?>
				<?php else: ?>
					<tr>
						<td colspan="10" align="center">Data Order is Empty</td>
					</tr>
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>

</div>