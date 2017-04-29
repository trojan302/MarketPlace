  <div class="col-md-10 col-sm-8" style="padding-left: 10px;">

      <h2>Controllers Products <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target=".add-product-modal">Add Products</button></h2>
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

      <table id="table_products" class="table table-striped table-hover table-condensed table-bordered">
      	<thead>
      		<tr>
      			<th>ID Products</th>
      			<th>Name</th>
      			<th>Categories</th>
      			<th>Size</th>
      			<th>Stock</th>
      			<th>Equity</th>
      			<th>Price</th>
      			<th>Actions</th>
      		</tr>
      	</thead>
      	<tbody>
      	<?php if ($num_products == 0) { ?>
      		<tr>
      			<td colspan="8" align="center" class="bg-danger"><span class="label label-danger">Data Not Found!</span></td>
      		</tr>
      	<?php 
      	} else { 
      		foreach ($all_products as $data) {
      	?>
      		<tr>
      			<td><?= $data['id_product'] ?></td>
      			<td><?= $data['name'] ?></td>
      			<td><?= $data['categories'] ?></td>
      			<td><?= $data['size'] ?></td>
      			<td><?= $data['stock'] ?></td>
      			<td><?= $generator->IDR($data['equity']) ?></td>
      			<td><?= $generator->IDR($data['price']) ?></td>
      			<td>
      				<a href="?detele_product=<?= $data['id_product'] ?>" class="delete-data btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
      				<a href="javascript:;" data-idProduct="<?= $data['id_product'] ?>" class="edit-dataProduct btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
      			</td>
      		</tr>
      	<?php } } ?>
      	</tbody>
      	<tbody>
      		<tr>
      			<td colspan="5">&nbsp;</td>
      			<td><?= $generator->IDR($products->totalModal()); ?></td>
      			<td><?= $generator->IDR($products->totalPricing()); ?></td>
      			<td>&nbsp;</td>
      		</tr>
      	</tbody>
      	<tbody>
      		<tr>
      			<td colspan="5">&nbsp;</td>
      			<td colspan="2" align="center">Total Earning : <?= $generator->IDR($products->earnings()); ?></td>
      			<td>&nbsp;</td>
      		</tr>
      	</tbody>
      </table>

	<div class="modal fade add-product-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			  <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Add Product</h4>
		      </div>
		      <div class="modal-body">
		        <form id="form-add" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
		        <div class="row">
		            <div class="col-md-6">
		                <div class="form-group">
		                    <label>Product ID</label>
		                    <input type="text" id="product_id" name="product_id" readonly value="<?= $generator->productID(); ?>" class="form-control">
		                </div>
		                <div class="form-group">
		                    <label>Item Name</label>
		                    <input type="text" id="item_name" name="item_name" placeholder="Item Name" class="form-control" required>
		                </div>
		                <div class="form-group">
		                    <label>Stock</label>
		                    <input type="number" id="stock" name="stock" placeholder="Stock" class="form-control" min="0" required>
		                </div>
		                <div class="form-group">
		                    <label>File input</label>
		                    <input type="file" id="file" name="file">
		                    <p class="help-block">Image To Item.</p>
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <label>Size</label>
		                    <input type="text" id="size" name="size" class="form-control" placeholder="Create Size" required>
		                </div>
		                <div class="form-group">
		                    <label>Categories</label>
		                    <select id="id_cat" name="id_cat" class="form-control" required>
		                        <option value="">-- Categories --</option>
		                        <?php for ($i=0; $i < sizeof($all_categories); $i++): ?>
		                        <option value="<?= $all_categories[$i]['id_cat'] ?>"><?= $all_categories[$i]['name'] ?></option>
		                    <?php endfor; ?>
		                    </select>
		                </div>
		                <div class="form-group">
		                    <label>Equity</label>
		                    <input type="number" class="form-control" id="equity" name="equity" placeholder="Equity" min="0" required>
		                </div>
		                <div class="form-group">
		                    <label>Price</label>
		                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" min="0" required>
		                    <input type="hidden" id="id_user" name="id_user" value="<?= $_SESSION['users'] ?>">
		                </div>
		            </div>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <input type="submit" name="addItem" class="btn btn-primary" value="Add Product">
		        </form>
		      </div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                <h4 class="modal-title" id="myModalLabel">Edit Products</h4>
	            </div>
	            <form id="form-add" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
	            <div class="modal-body">
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                 <input type="submit" name="editProduct" class="btn btn-primary" value="Update Products">
	            </form>
	            </div>
	        </div>
	    </div>
	</div>

  </div>
</div>