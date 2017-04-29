  <div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Controllers Users</h2>
    <hr>

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

    <table id="table_user" class="table table-bordered table-condensed table-hover table-striped" style="font-size: 10px;">
    	<thead>
    		<tr>
    			<th>ID User</th>
    			<th>Username</th>
    			<th>Fullname</th>
    			<th>Email</th>
    			<th>Address</th>
    			<th>Zip Code</th>
    			<th>Phone Number</th>
    			<th>Member</th>
    			<th>Actions</th>
    		</tr>
    	</thead>
    	<tbody>
    	<?php foreach ($all_users as $data) { ?>
    		<tr <?php if ($data['status'] != 1): ?> class="danger" <?php endif ?>>
    			<td><?= $data['id_user'] ?></td>
    			<td><?= $data['username'] ?></td>
    			<td><?= $data['firstname'] .' '. $data['lastname'] ?></td>
    			<td><?= $data['email'] ?></td>
    			<td><?= $data['address'] ?></td>
    			<td><?= $data['zip_code'] ?></td>
    			<td><?= $data['phone'] ?></td>
    			<td><?= $data['name'] ?></td>	
    			<td>
    				<div class="btn-group">
	    				<a href="?delete_user=<?= $data['id_user'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
	    				<a href="javascript:;" data-idUser="<?= $data['id_user'] ?>" class="edit-data btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
    				</div>
    			</td>
    		</tr>
    	<?php } ?>
    	</tbody>
    </table>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                <h4 class="modal-title" id="myModalLabel">Edit Users</h4>
	            </div>
	            <form id="form-add" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
	            <div class="modal-body">
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                 <input type="submit" name="editUser" class="btn btn-primary" value="Update Users">
	            </form>
	            </div>
	        </div>
	    </div>
	</div>

  </div>
</div>