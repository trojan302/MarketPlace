
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
		<tr class="active">
			<td>
				<input type="checkbox" name="" value="">
			</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
			<td>unionmail@iam.com</td>
			<td><?= date('Y-m-d h:i:s') ?></td>
			<td><label class="label label-success">Users</label></td>
		</tr>
		<tr class="active">
			<td>
				<input type="checkbox" name="" value="">
			</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
			<td>bettamarketplace@iam.com</td>
			<td><?= date('Y-m-d h:i:s') ?></td>
			<td><label class="label label-primary">Admin</label></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="" value="">
			</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
			<td>bettamarketplace@iam.com</td>
			<td><?= date('Y-m-d h:i:s') ?></td>
			<td><label class="label label-primary">Admin</label></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="" value="">
			</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
			<td>unionmail@iam.com</td>
			<td><?= date('Y-m-d h:i:s') ?></td>
			<td><label class="label label-success">Users</label></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="" value="">
			</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
			<td>unionmail@iam.com</td>
			<td><?= date('Y-m-d h:i:s') ?></td>
			<td><label class="label label-success">Users</label></td>
		</tr>
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