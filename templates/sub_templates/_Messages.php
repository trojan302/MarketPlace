
<a href="javascript:;" title="Write Message" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".write-messages"><i class="fa fa-edit"></i> Write</a>

<table class="table small">
	<thead>
		<tr>
			<th colspan="2">Messages</th>
			<th>From</th>
			<th>Date</th>
			<th>Tags</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($messages->get_messages($_SESSION['users']) as $data): ?>
		<?php if (sizeof($data) > 1): ?>
		<tr class="<?php if ($data['view'] == 0): ?> active <?php endif ?>">
			<td>
				<input type="checkbox" name="delete[]">
			</td>
			<td><a href="?msg=<?= $data['id_message'] ?>&view=1"><?= substr($data['body'], 0, 50) ?>...</a></td>
			<td><?= $data['email'] ?></td>
			<td><?= $data['m_date'] ?></td>
			<?php if ($data['member'] == 'Administrator'): ?>
			<td><label class="label label-danger"><?= $data['member'] ?></label></td>
			<?php else: ?>
			<td><label class="label label-success"><?= $data['member'] ?></label></td>
			<?php endif ?>
		</tr>
		<?php else: ?>
		<tr>
			<td>
				<p class="text-center">Inbox is Empty</p>
			</td>
		</tr>
		<?php endif; ?>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="modal fade write-messages" tabindex="-1" role="dialog" aria-labelledby="writeMessages">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Writing Messages</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
	      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
			<div class="input-group input-group-sm">
			  <span class="input-group-addon" id="sizing-addon3">From:</span>
			  <input type="text" class="form-control" disabled value="<?= $_SESSION['firstname'] .' '. $_SESSION['lastname'] ?>" aria-describedby="sizing-addon3">
			  <input type="hidden" name="from_user" value="<?= $_SESSION['users'] ?>">
			</div>
			<br>
          	<div class="input-group input-group-sm">
			  	<span class="input-group-addon" id="sizing-addon3">To:</span>
				<select name="to_user" class="form-control">
						<option value="">- Pilih Daeler -</option>
						<?php if ($_SESSION['scopes'] == 'member/'): ?>
							<option value="USR-0406-17-1"> Administrator </option>
							<?php foreach ($messages->list_pelanggan($_SESSION['users']) as $email) { ?>
								<option value="<?= $email['id_user'] ?>"> <?= $email['email'] ?> </option>
							<?php } ?>
						<?php else: ?>
							<?php foreach ($messages->get_daeler_email() as $email) { ?>
								<option value="<?= $email['id_user'] ?>"> <?= $email['email'] ?> </option>
							<?php } ?>
						<?php endif ?>
				</select>
			</div>
			<br>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control" style="width: 100%;resize: none;height: 160px;"></textarea>
			</div>
			<?php if ($_SESSION['scopes'] == 'member/'): ?>
			<div class="form-group">
				<label>Attactments</label>
				<input type="file" name="attachment" class="form-control">
			</div>
			<?php endif ?>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <?php if ($_SESSION['scopes'] == 'member/'): ?>
        <input type="submit" name="member_send_message" value="Kirim Pesan" class="btn btn-primary">
	    <?php else: ?>
        <input type="submit" name="user_send_message" value="Kirim Pesan" class="btn btn-primary">
        <?php endif ?>
      </div>
      </form>
    </div>
  </div>
</div>