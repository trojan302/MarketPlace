<div class="row-fluid">
  <div class="col-md-2 col-sm-4">
    <ul class="nav nav-pills nav-stacked hidden-xs">
        <li><a href="<?= __SHOP__ ?>admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <hr>
        <li class="list-group-item-heading"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-link"></i> Controllers <i class="pull-right glyphicon glyphicon-chevron-down"></i></a></li>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="<?= __SHOP__ ?>admin/users.php"><i class="fa fa-users"></i> Users</a></li>
            <li><a href="<?= __SHOP__ ?>admin/products.php"><i class="fa fa-shopping-bag"></i> Products</a></li>
            <li><a href="<?= __SHOP__ ?>admin/categories.php"><i class="fa fa-list"></i> Categories</a></li>
          </ul>
        </div>
        <hr>
    </ul>

    <ul class="nav nav-pills nav-stacked hidden-xs">
        <li class="list-group-item-heading"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="fa fa-link"></i> Bussines <i class="pull-right glyphicon glyphicon-chevron-down"></i></a></li>
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="<?= __SHOP__ ?>admin/ordered.php"><i class="fa fa-exchange"></i> Ordered</a></li>
            <li <?php if ($admin->alert_upload_payments() > 0): ?> class="bg-danger" <?php endif ?> >
              <a href="<?= __SHOP__ ?>admin/transactions.php">
                <i class="fa fa-handshake-o"></i> Transactions 
                <?php if ($admin->alert_upload_payments() > 0): ?> 
                  <span class="badge"><?= $admin->alert_upload_payments() ?></span> 
                <?php endif ?>
              </a>
            </li>
          </ul>
    </ul>
    <hr>
    <ul class="nav nav-pills nav-stacked hidden-xs">
        <li class="list-group-item-heading"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><i class="fa fa-money"></i> Report <i class="pull-right glyphicon glyphicon-chevron-down"></i></a></li>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#"><i class="fa fa-folder-open"></i> Product Report</a></li>
            <li><a href="#"><i class="fa fa-folder-open"></i> Ordered Report</a></li>
            <li><a href="#"><i class="fa fa-folder-open"></i> Transactions Report</a></li>
          </ul>
    </ul>
    <hr>
  </div>