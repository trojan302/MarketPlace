<div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Bussines Transaction</h2>
    <hr>

	<table id="table_payment" class="table table-bordered table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Fullname</th>
				<th>Struk Images</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1; foreach ($payments->get_all_payments() as $data): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data['FULLNAME'] ?></td>
				<td style="width: 20%; height: 10%;" align="center">
					<img src="<?= $data['IMAGES'] ?>" alt="<?= $data['FULLNAME'] ?>" style="width: 20%; height: 10%;">
				</td>
				<td>
					<input <?php if ($data['STATUS'] == 0): ?> checked <?php endif ?> data-toggle="toggle" data-on="Pending" data-off="Confirm" data-onstyle="danger" data-offstyle="success" data-size="mini" type="checkbox" id="update_payment" data-payments="<?= $data['ID_STRUK'] ?>">
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
		
</div>