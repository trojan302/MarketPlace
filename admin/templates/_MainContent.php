<div class="col-md-10 col-sm-8" style="padding-left: 10px;">
   
   <div class="row-fluid">
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body users">
            <i class="fa fa-users fa-3x"></i> &nbsp; <span class="counter"><?= $num_users ?></span>
          </div>
          <div class="panel-footer">Total Users</div>
        </div>
     </div>
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body cart">
            <i class="fa fa-shopping-cart fa-3x"></i> &nbsp; <span class="counter"><?= $num_shopping_cart ?></span>
          </div>
          <div class="panel-footer">Shopping Cart</div>
        </div>
     </div>
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body tasks">
            <span style="font-size: 2.5em;"><small><?= $generator->IDR($payments->get_total_earnings()) ?></small></span>
          </div>
          <div class="panel-footer">Total Earnings</div>
        </div>
     </div>
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body products">
            <i class="fa fa-shopping-bag fa-3x"></i> &nbsp; <span class="counter"><?= $num_products ?></span>
          </div>
          <div class="panel-footer">Products</div>
        </div>
     </div>
     <div class="clearfix"></div>
   </div>


   <div class="row-fluid">
     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Transactions</b></div>
        <div class="panel-body">
          <div id="line-chart" style="width:100%"></div>
        </div>
      </div>
     </div>

     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Earnings</b></div>
        <div class="panel-body">
          <div id="area-chart" style="width:100%;"></div>
        </div>
      </div>
     </div>

     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Pages</b></div>
        <div class="panel-body">
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Date Transactions</th>
                <th>Total</th>
                <th>Gross Income</th>
                <th>Net Income</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($payments->get_all_data_payments() as $data): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['DateTrasaction'] ?></td>
                <td><?= $data['Total'] ?></td>
                <td><?= $generator->IDR($data['Gross']) ?></td>
                <td><?= $generator->IDR($data['Net']) ?></td>
              </tr>
            <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
     </div>

     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Categories</b></div>
        <div class="panel-body">
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Categories Initial</th>
                <th>Categories Name</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; 
            foreach ($products->categories() as $data): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['initial'] ?></td>
                <td><?= $data['name'] ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
     </div>
   </div>

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


  <div class="row">
    <!-- Tasks Content -->
    <div class="col-md-4">
      <ul class="list-group">
        <h4 class="list-group-item-heading"><i class="fa fa-tasks"></i> Tasks Rountine</h4>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
      </ul>
    </div>
    <div class="col-md-8">
      <div class="list-group">
        <h4>Contact Form</h4>
        <a href="#" class="list-group-item active">
          <h4 class="list-group-item-heading">Jhon Doe</h4>
          <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, saepe! Accusamus quasi mollitia laborum eligendi quibusdam! At maiores earum expedita vero recusandae vel consectetur natus! Suscipit eligendi, deserunt iste magni!</p>
        </a>
        <a href="#" class="list-group-item">
          <h4 class="list-group-item-heading">Jane Doe</h4>
          <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, saepe! Accusamus quasi mollitia laborum eligendi quibusdam! At maiores earum expedita vero recusandae vel consectetur natus! Suscipit eligendi, deserunt iste magni!</p>
        </a>
        <a href="#" class="list-group-item">
          <h4 class="list-group-item-heading">Thomson</h4>
          <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, saepe! Accusamus quasi mollitia laborum eligendi quibusdam! At maiores earum expedita vero recusandae vel consectetur natus! Suscipit eligendi, deserunt iste magni!</p>
        </a>
      </div>
    </div>
  </div>
  </div>
</div>

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