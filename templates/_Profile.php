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
				<form action="http://localhost<?= $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data" class="panel panel-primary"">
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
					      	<option value="<?= $data['O_ID_ORDER'] ?>">
					      		<?= $data['O_PRODUCT'] ?>  (<?= $data['O_QTY'] ?>)
					      	</option>
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

			<div class="card tabcordion">
			    <ul class="nav nav-tabs" role="tablist">
			    <?php if ($_SESSION['scopes'] == 'user/'): ?>
			        <li role="presentation"><a href="#YourOrders" aria-controls="YourOrders" class="tab" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Your Orders</a></li>
			        <li role="presentation"><a href="#messages" aria-controls="messages" class="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i> Messages</a></li>
			        <li role="presentation"><a href="#settings" aria-controls="settings" class="tab" data-toggle="tab"><i class="fa fa-cogs"></i> Settings</a></li>
			    <?php else: ?>
			        <li role="presentation" class="active">
			        	<a href="#UserOrder" aria-controls="UserOrder" class="tab" data-toggle="tab"><i class="fa fa-shopping-cart"></i> User Orders</a>
			        </li>
			        <li role="presentation"><a href="#YourOrders" aria-controls="YourOrders" class="tab" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Your Orders</a></li>
			        <li role="presentation"><a href="#SaleItem" aria-controls="SaleItem" class="tab" data-toggle="tab"><i class="fa fa-archive"></i> Sale Items</a></li>
			        <li role="presentation"><a href="#messages" aria-controls="messages" class="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i> Messages</a></li>
			        <li role="presentation"><a href="#settings" aria-controls="settings" class="tab" data-toggle="tab"><i class="fa fa-cogs"></i> Settings</a></li>
			    <?php endif; ?>
			    </ul>

			    <!-- Tab panes -->
			    <div class="tab-content">
			    <?php if ($_SESSION['scopes'] != 'user/'): ?>
			        <div role="tabpanel" class="tab-pane active" id="UserOrder">
			        	<?php require_once 'sub_templates/_TableUserOrders.php'; ?>
			        </div>
			    <?php endif; ?>
			        <div role="tabpanel" class="tab-pane" id="YourOrders">
			        	<?php require_once 'sub_templates/_TableDaelerOrders.php'; ?>
			        </div>
			    <?php if ($_SESSION['scopes'] != 'user/'): ?>
			        <div role="tabpanel" class="tab-pane" id="SaleItem">
			        	<?php require_once 'sub_templates/_SaleItems.php'; ?>
			        </div>
			    <?php endif ?>
			        <div role="tabpanel" class="tab-pane" id="messages">
			        	<?php require_once 'sub_templates/_Messages.php'; ?>
			        </div>
			        <div role="tabpanel" class="tab-pane" id="settings">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..</div>
			    </div>
			</div>

		</div>

	</div>

</div>