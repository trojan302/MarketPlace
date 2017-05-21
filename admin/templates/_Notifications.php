<div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Users Notifications</h2>
    <hr>

	<table id="user_confirmations" class="table table-hover table-condensed small">
		<thead>
			<tr>
				<th>#</th>
				<th>Fullname</th>
				<th>Username</th>
				<th>Email</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Member</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1;
		foreach ($user->user_notifications() as $data): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data['Fullname'] ?></td>
				<td><?= $data['Username'] ?></td>
				<td><?= $data['Email'] ?></td>
				<td><?= $data['Address'] ?></td>
				<td><?= $data['Phone'] ?></td>
				<td><?= $data['Member'] ?></td>
				<td>
					<input <?php if ($data['Status'] == 0): ?> checked <?php else: ?>  <?php endif ?> data-toggle="toggle" data-on="Not Active" data-off="Active" data-onstyle="danger" data-offstyle="success" data-size="mini" type="checkbox" id="activated" data-activated="<?= $data['IdUser'] ?>"></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
		
</div>