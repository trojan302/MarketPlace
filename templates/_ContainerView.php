<div class="container" style="padding-top: 30px;margin-bottom: 150px;">

	<div class="col-md-4">
		<img src="<?= $details['images'] ?>" alt="<?= str_replace('_',' ',$_GET['item']) ?>" class="img-responsive">
	</div>
	<div class="col-md-8">
		<h2><?= str_replace('_',' ',$_GET['item']) ?></h2>
		<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
		<table class="table">
			<tr>
				<th style="width:25%;">Pedagang</th>
				<td style="width:75%;">: &nbsp; <?= ucfirst($user->get_user_details($details['id_user'])['firstname']) . ' ' . ucfirst($user->get_user_details($details['id_user'])['lastname'])?> &nbsp; | &nbsp; Email : <?= $user->get_user_details($details['id_user'])['email'] ?></td>
			</tr>
			<tr>
				<th style="width:25%;">Stock</th>
				<td style="width:75%;">: <?= $data = ($details['stock'] != 0) ? $details['stock'] . " Pcs" : "Sold Out"; ?></td>
			</tr>
			<tr>
				<th style="width:25%;">Category</th>
				<td style="width:75%;">: <?= $details['cat_name'] ?></td>
			</tr>
			<tr>
				<th style="width:25%;">Size</th>
				<td style="width:75%;">: <?= $generator->select_size($details['size']) ?></td>
			</tr>
			<?php if (isset($_SESSION['users'])): ?>
			<tr>
				<th style="width:25%;">Qty</th>
				<td style="width:75%;">:
					<input type="number" class="input-sm" style="width: 150px;" name="qty" max="<?= $details['stock'] ?>" min="1" placeholder="How Many?">
				</td>
			</tr>
			<?php endif ?>
			<tr>
				<th style="width:25%;">Price</th>
				<td style="width:75%;">: <?= $generator->IDR($details['price']) ?></td>
			</tr>
			<tr>
				<th style="width:25%;">&nbsp;</th>
				<td style="width:75%;">
				<?php if (!isset($_SESSION['users'])): ?>
					<a href="javascript:;" class="btn btn-primary" disabled><i class="fa fa-shopping-bag"></i> Buy Item</a>
					<span class="help-block">Login for buy this item or Sign Up first.</span>
				<?php elseif ($details['id_user'] == $_SESSION['users']): ?>
					<a href="javascript:;" class="btn btn-primary" disabled><i class="fa fa-shopping-bag"></i> Buy Item</a>
					<span class="help-block">This is your item.</span>
				<?php elseif ($details['stock'] < 1): ?>
					<a href="javascript:;" class="btn btn-primary" disabled><i class="fa fa-shopping-bag"></i> Buy Item</a>
					<span class="help-block">Stock item is empty.</span>
				<?php else: ?>
					<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-bag"></i> Buy Item</button>
				<?php endif ?>
					<input type="hidden" name="id_product" value="<?= $details['id_product'] ?>">
					<input type="hidden" name="id_session" value="<?= $_SESSION['users'] ?>">
				</td>
			</tr>
		</table>
		</form>
	</div>

</div>