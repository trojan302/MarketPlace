
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
			<td><?= substr($data['body'], 0, 50) ?>...</td>
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
          <form action="" method="get" accept-charset="utf-8">
			<div class="input-group input-group-sm">
			  <span class="input-group-addon" id="sizing-addon3">From:</span>
			  <input type="text" class="form-control" placeholder="Email to user..." aria-describedby="sizing-addon3">
			</div>
			<br>
          	<div class="input-group input-group-sm">
			  <span class="input-group-addon" id="sizing-addon3">To:</span>
			  <input type="text" class="form-control" placeholder="Email to user..." aria-describedby="sizing-addon3" list="Daelers">
			<datalist id="Daelers">
				<option value="ronimuhamad@gmail.com">
				<option value="ratnasetya209@gmail.com">
				<option value="imamalimustofa@iam.com">
				<option value="wafiqmuhandis@gmail.com">
				<option value="mthariq@gmail.com">
			</datalist>
			</div>
			<br>
			<div class="form-group">
				<label>Body</label>
				<textarea name="" class="form-control" style="width: 100%;resize: none;height: 160px;"></textarea>
			</div>
			<div class="form-group">
				<label>Attactments</label>
				<input type="file" name="" class="form-control" multiple>
			</div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Messages</button>
      </div>
    </div>
  </div>
</div>