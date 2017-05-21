<?php

$id_user = $_GET['id_cat'];

$conn = new MySQLi('localhost','root','','marketplace'); 

$sql    = "SELECT * FROM categories WHERE id_cat='".$_GET['id_cat']."'";
$query  = $conn->query($sql);
$data   = $query->fetch_assoc();

?>
        <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" name="name" value="<?= $data['name'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Initial</label>
            <input type="text" id="initial" name="initial" value="<?= $data['initial'] ?>" class="form-control" required>
        </div>
        <input type="hidden" id="id_cat" name="id_cat" value="<?= $data['id_cat'] ?>">