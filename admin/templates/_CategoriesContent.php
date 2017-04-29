  <div class="col-md-10 col-sm-8" style="padding-left: 10px;">

      <h2>Controllers Categories <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target=".add-categories-modal">Add Categories</button></h2>
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

      <table id="table_categories" class="table table-condensed table-hover table-striped table-bordered">
      	<thead>
      		<tr>
      			<th class="text-center">#</th>
      			<th class="text-center">Name</th>
      			<th class="text-center">Initial</th>
      			<th class="text-center">Actions</th>
      		</tr>
      	</thead>
      	<tbody>
      	<?php $no=1; foreach ($all_categories as $data) { ?>
      		<tr>
      			<td><?= $no++ ?></td>
      			<td><?= $data['name'] ?></td>
      			<td><?= $data['initial'] ?></td>
      			<td>
					<a href="?id_cat=<?= $data['id_cat'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
    				<a href="javascript:;" data-idCategory="<?= $data['id_cat'] ?>" class="edit-dataCategory btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
      			</td>
      		</tr>
      	<?php } ?>
      	</tbody>
      </table>

      <div class="modal fade add-categories-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel">New Categories</h4>
		      </div>
		      <div class="modal-body">
		          <div class="form-group">
		            <label for="category-name" class="control-label">Name:</label>
		            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Name of Category">
		          </div>
		          <div class="form-group">
		            <label for="category-initial" class="control-label">Initial:</label>
		            <input type="text" class="form-control" id="category_initial" name="category_initial" placeholder="Initial of Category">
		          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <input type="submit" name="add_category" class="btn btn-primary" value="Add New Categories">
		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-sm">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
	            </div>
	            <form id="form-add" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	            <div class="modal-body">
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                 <input type="submit" name="editCategory" class="btn btn-primary" value="Update Category">
	            </form>
	            </div>
	        </div>
	    </div>
	</div>

  </div>
</div>