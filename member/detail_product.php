<?php

$id_product = $_GET['id_product'];

$conn = new MySQLi('localhost','root','','marketplace'); 

$sql    = "SELECT products.*, categories.name AS category FROM products, categories WHERE products.id_cat = categories.id_cat AND products.id_product='".$id_product."'";
$query  = $conn->query($sql);
$data   = $query->fetch_assoc();

?>
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>ID Product</label>
            <input type="text" id="id_product" name="id_product" readonly value="<?= $id_product ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" name="name" value="<?= $data['name'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Size</label>
            <input type="text" id="size" name="size" value="<?= $data['size'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input type="number" id="stock" name="stock" value="<?= $data['stock'] ?>" class="form-control" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Categories</label>
            <select id="id_cat" name="id_cat" class="form-control" required>
                <option value="">-- Categories --</option>
                <?php if ($data['id_cat'] == 1) { ?>
                <option value="1" selected>Batik Tulis</option>
                <option value="2">Batik Cap</option>
                <option value="3">Batik Printing</option>
                <?php }else if ($data['id_cat'] == 2) { ?>
                <option value="1">Batik Tulis</option>
                <option value="2" selected>Batik Cap</option>
                <option value="3">Batik Printing</option>
                <?php }else if ($data['id_cat'] == 3) { ?>
                <option value="1">Batik Tulis</option>
                <option value="2">Batik Cap</option>
                <option value="3" selected>Batik Printing</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Equity</label>
            <input type="number" id="equity" name="equity" value="<?= $data['equity'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" id="price" name="price" value="<?= $data['price'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Zip Code &amp; Phone Number</label>
            <input type="file" name="images" id="images">
        </div>
        <input type="hidden" id="id_user" name="id_user" value="<?= $data['id_user'] ?>">
        <input type="hidden" id="old_images" name="old_images" value="<?= $data['images'] ?>">
    </div>
    <div class="col-md-4">
        <img src="<?= $data['images'] ?>" alt="<?= $data['name'] ?>" class="img-responsive" style="width: 75%;margin: auto;">
    </div>
    </div>