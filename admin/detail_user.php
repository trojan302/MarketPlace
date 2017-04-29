<?php

$id_user = $_GET['id_user'];

$conn = new MySQLi('localhost','root','','project_ecommerce'); 

$sql    = "SELECT * FROM users WHERE id_user='".$_GET['id_user']."'";
$query  = $conn->query($sql);
$data   = $query->fetch_assoc();

// $sqlmember  = "SELECT * FROM members WHERE id_member!=1";
// $run        = $conn->query($sqlcat);
// $member     = $run->fetch_all(MYSQLI_ASSOC);

$membersql  = "SELECT * FROM members WHERE id_member='".$data['id_member']."'";
$runsql     = $conn->query($membersql);
$sqlmember  = $runsql->fetch_assoc();

?>
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>ID User</label>
            <input type="text" id="id_user" name="id_user" readonly value="<?= $id_user ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="username" name="username" value="<?= $data['username'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <div class="form-inline">
            <label>Firstname &amp; Lastname</label><br>
            <input type="text" id="firstname" name="firstname" value="<?= $data['firstname'] ?>" class="form-control" required>
            <input type="text" id="lastname" name="lastname" value="<?= $data['lastname'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="">-- Status --</option>
                <?php if ($data['status'] == 0) { ?>
                <option value="0" selected>Not Active</option>
                <option value="1">Active</option>
                <?php }else { ?>
                <option value="0">Not Active</option>
                <option value="1" selected>Active</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Members</label>
            <select id="id_member" name="id_member" class="form-control" required>
                <option value="">-- Members --</option>
                <?php if ($sqlmember['id_member'] == 1) { ?>
                <option value="1" selected>Free</option>
                <option value="2">Premium</option>
                <?php }else if ($sqlmember['id_member'] == 2) { ?>
                <option value="1">Free</option>
                <option value="2" selected>Premium</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" name="email" value="<?= $data['email'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" id="address" name="address" value="<?= $data['address'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Zip Code &amp; Phone Number</label>
            <div class="form-inline">
                <input style="width:20%;" type="text" id="zip_code" name="zip_code" value="<?= $data['zip_code'] ?>" class="form-control" required>
                <input style="width:75%;" type="tel" id="phone" name="phone" value="<?= $data['phone'] ?>" class="form-control" required>
            </div>
        </div>
        <input type="hidden" id="id_user" name="id_user" value="<?= $data['id_user'] ?>">
    </div>
    </div>