<h3>Your Orders</h3>

<table class="table table-bordered small">
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
		<?php foreach ($user->get_user_order($_SESSION['users']) as $data): ?>
			
		<tr>
			<td><?= $data['O_ID_ORDER'] ?></td>
			<td><?= $data['O_PRODUCT'] ?></td>
			<td><?= $data['O_QTY'] ?></td>
			<td><?= $data['O_SIZE'] ?></td>
			<td><?= $generator->IDR($data['O_AMOUNT']) ?></td>
			<td><?= $generator->IDR($data['O_TAX']) ?></td>
			<td><?= $generator->IDR($data['O_TOTAL_PRICE']) ?></td>
			<td>
			<?php if ($data['O_STATUS'] == 0): ?>
				<span class="text-info">Waiting Process</span>
			<?php else: ?>
				<span class="text-success">In Process</span>
			<?php endif ?>
				
			</td>
		</tr>

		<?php endforeach ?>
	</tbody>
</table>