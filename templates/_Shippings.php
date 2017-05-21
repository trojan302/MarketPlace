<div class="container" style="padding-top: 30px;margin-bottom: 150px;">
	
	<h2><i class="fa fa-truck"></i> Shippings</h2>
	<hr>

	<div class="help-block">
		<i class="glyphicon glyphicon-info-sign"></i> If your name is not on the above list, please contact the adminstrator for confirmation. Search anything about your order detail and process in table.
	</div>
	
	<table id="table_all_order" class="table table-condensed table-bordered small">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Shipping Address</th>
				<th>Product Name</th>
				<th>Qty</th>
				<th>Shipping Cost</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			<?php if ($orders->num_order() > 0): ?>
			<?php foreach ($orders->all_user_orders() as $data): ?>
				<tr>
					<td><?= $data['O_ID_ORDER'] ?></td>
					<td><?= $data['O_FULLNAME'] ?></td>
					<td><?= $data['O_ADDR'] ?></td>
					<td><?= $data['O_PRODUCT'] ?></td>
					<td class="text-center"><?= $data['O_QTY'] ?></td>
					<td><?= $generator->IDR($data['O_TOTAL_PRICE']) ?></td>
					<td><?= $status = ($data['O_STATUS'] == 0) ? '<i class="text-info">Waiting...</i>' : '<i class="text-success">Process...</i>'; ?></td>
				</tr>
			<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td colspan="10" align="center">Data Order is Empty</td>
				</tr>
			<?php endif ?>
		</tbody>

	</table>

	<br>

</div>