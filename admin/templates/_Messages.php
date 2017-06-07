<div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Inbox Pesan</h2>
    <hr>

<?php if (!isset($_GET['msg']) && !isset($_GET['view'])) { ?>
	
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
							<?php foreach ($messages->get_daeler_email() as $email) { ?>
								<option value="<?= $email['id_user'] ?>"> <?= $email['email'] ?> </option>
							<?php } ?>
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
		    <?php elseif ($_SESSION['scopes'] == 'member/'): ?>
	        <input type="submit" name="user_send_message" value="Kirim Pesan" class="btn btn-primary">
		    <?php else: ?>
		    <input type="submit" name="admin_send_message" value="Kirim Pesan" class="btn btn-primary">
	        <?php endif ?>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<?php }else{ ?>

		<?php 

		$baca_pesan = $messages->baca_pesan($_GET['msg']);
		$messages->update_view($_GET['msg']);

		?>

		<div class="card" style="padding: 20px;">

			<h1>From : <?= ucwords($messages->user_info($baca_pesan[0]['from_user'])['fullname']) ?></h1>
			<span> 
				<i class="fa fa-envelope-o"></i> 
				&nbsp;&nbsp; 
				<?= $messages->user_info($baca_pesan[0]['from_user'])['email'] ?> 
			</span> 
			&nbsp;&nbsp;&nbsp; 
			<span> 
				<i class="fa fa-calendar"></i> 
				&nbsp;&nbsp; 
				<?= $baca_pesan[0]['date'] ?> 
			</span>

			<div style="padding: 10px;border:1px solid #232323;margin: 10px;">

				<?php if ($baca_pesan[0]['attachment'] != ''): ?>
				<div class="row">
					<div class="col-md-4 text-center">
						<img src="<?= $baca_pesan[0]['attachment'] ?>" id="imgPesan">
					</div>
					<div class="col-md-8">
						<?= $baca_pesan[0]['body'] ?>
					</div>
				</div>
				<?php else: ?>
				<?= $baca_pesan[0]['body'] ?>
				<?php endif ?>
			</div>

			<a href="#!" onclick="window.history.back()" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>

		</div>

	<?php } ?>
		
</div>