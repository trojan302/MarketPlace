<div class="col-md-10 col-sm-8" style="padding-left: 10px;">

    <h2>Settings</h2>
    <hr>

	<h3>General Settings</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="form-group">
				<div class="row">
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control input-sm" value="<?= $admin_data['firstname'] ?>">
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group">
    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" value="<?= $admin_data['lastname'] ?>">
    					</div>
    				</div>
    			</div>
			</div>

			<div class="form-group">
				<input type="text" name="email" id="email" class="form-control input-sm" value="<?= $admin_data['email'] ?>">
			</div>

			<div class="form-group">
				<input type="text" name="phone" id="phone" class="form-control input-sm" value="<?= $admin_data['phone'] ?>">
			</div>

			<div class="form-group">
				<input type="text" name="zip_code" id="zip_code" class="form-control input-sm" value="<?= $admin_data['zip_code'] ?>">
			</div>

			<div class="form-group">
				<textarea name="address" class="form-control input-sm"><?= $admin_data['address'] ?></textarea>
			</div>

			<input type="hidden" name="id_user" value="<?= $admin_data['id_user'] ?>">

			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
			</div>			
		</form>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h3>Change Password</h3>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="form-group">
				<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Old Password">
			</div>

			<div class="form-group">
				<input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="New Password">
			</div>

			<div class="form-group">
				<input type="text" name="zip_code" id="zip_code" class="form-control input-sm" placeholder="Repeat Password">
			</div>

			<input type="hidden" name="id_user" value="<?= $admin_data['id_user'] ?>">

			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-primary">Update Password</button>
			</div>
		</form>
		</div>
	</div>
		
</div>