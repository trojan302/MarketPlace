 <div class="container" style="margin-top: 30px;width: 70%;">

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
  
  <form action="<?= __ACT__ ?>Signup.php" method="POST">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="username"><i class="fa fa-user"></i> Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <label for="firstname"><i class="fa fa-user"></i> Nama Lengkap</label>
        <div class=" form-inline">
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" required>
          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" required>
        </div>
      </div>
      <div class="form-group">
        <label for="phone"><i class="fa fa-phone"></i> Nomor Telepon</label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone number : e.g (+62) 858 xxx xxx xx" required>
      </div>
      <div class="form-group">
        <label for="phone"><i class="fa fa-ticket"></i> Pilih Member</label>
        <select name="member" id="member" class="form-control" required>
          <option value="">-- Pilih Satu --</option>
          <option value="1">Pelanggan</option>
          <option value="2">Pedagang</option>
        </select>
        <div class="help-block">
          <p><i class="glyphicon glyphicon-info-sign"></i> Jika anda mendaftar sebagai Pedagan, anda harus menunggu konfirmasi dari admin terlebih dahulu.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="no_rek"><i class="fa fa-credit-card"></i> Nomor Rekening</label>
        <input type="no_rek" class="form-control" name="no_rek" id="no_rek" placeholder="Nomor Rekening" required>
      </div>
      <div class="form-group">
        <label for="email"><i class="fa fa-envelope-o"></i> Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="password"><i class="fa fa-lock"></i> Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label for="address"><i class="fa fa-building"></i> Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
      </div>
      <div class="form-group">
        <label for="zip_code"><i class="fa fa-building"></i> Postal Code</label>
        <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Postal Code" required>
      </div>
      <button type="submit" class="btn btn-default"><i class="fa fa-sign-in"></i> Sign Up</button>
    </div>
  </div>
</form>
<br><br>
</div> <!-- /container -->