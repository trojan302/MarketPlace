<h3>Pengaturan Akun</h3>

<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="form-group">
				<div class="row">
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group">
	    					<label for="">Nama Depan</label>
                            <input type="text" name="first_name" id="first_name" class="form-control input-sm" value="<?= $user_data['firstname'] ?>">
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group">
	    					<label for="">Nama Belakang</label>
    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" value="<?= $user_data['lastname'] ?>">
    					</div>
    				</div>
    			</div>
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" id="email" class="form-control input-sm" value="<?= $user_data['email'] ?>">
			</div>

			<div class="form-group">
				<label for="">Telepon</label>
				<input type="text" name="phone" id="phone" class="form-control input-sm" value="<?= $user_data['phone'] ?>">
			</div>

			<div class="form-group">
				<label for="">Kode Pos</label>
				<input type="text" name="zip_code" id="zip_code" class="form-control input-sm" value="<?= $user_data['zip_code'] ?>">
			</div>

			<div class="form-group">
				<label for="">Alamat</label>
				<textarea name="address" class="form-control input-sm"><?= $user_data['address'] ?></textarea>
			</div>

			<div class="form-group">
				<label for="">No Rekening</label>
				<input type="text" name="no_rek" class="form-control input-sm" value="<?= $user_data['no_rek'] ?>">
			</div>

			<input type="hidden" name="id_user" value="<?= $user_data['id_user'] ?>">

			<div class="form-group">
				<input type="submit" name="user_edit" class="btn btn-sm btn-primary" value="Update Profile">
			</div>			
		</form>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h3>Change Password</h3>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="form-group">
				<input type="password" name="old_pass" id="old_pass" class="form-control input-sm" placeholder="Old Password">
			</div>

			<div class="form-group">
				<input type="password" name="new_pass" id="old_pass_retype" class="form-control input-sm" placeholder="New Password">
			</div>

			<div class="form-group">
				<input type="password" name="new_pass_retype" id="new_pass" class="form-control input-sm" placeholder="Repeat Password">
			</div>

			<input type="hidden" name="id_user" value="<?= $user_data['id_user'] ?>">

			<div class="form-group">
				<input type="submit" name="user_change_password" class="btn btn-sm btn-primary" value="Update Password">
			</div>
		</form>
		</div>
	</div>