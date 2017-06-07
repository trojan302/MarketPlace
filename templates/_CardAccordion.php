<div class="card tabcordion">
    <ul class="nav nav-tabs" role="tablist">
    <?php if ($_SESSION['scopes'] == 'user/'): ?>
        <li role="presentation"><a href="#YourOrders" aria-controls="YourOrders" class="tab" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Your Orders</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" class="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i> Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" class="tab" data-toggle="tab"><i class="fa fa-cogs"></i> Settings</a></li>
        <li role="presentation"><a href="#!" aria-controls="settings" class="tab" data-toggle="tab"><i class="fa fa-credit-card"></i> <b>No Rekening Admin : </b> &nbsp; <i><?= $admin_rek; ?></i></a></li>
    <?php else: ?>
        <li role="presentation" class="active">
        	<a href="#UserOrder" aria-controls="UserOrder" class="tab" data-toggle="tab"><i class="fa fa-shopping-cart"></i> User Orders</a>
        </li>
        <li role="presentation"><a href="#YourOrders" aria-controls="YourOrders" class="tab" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Your Orders</a></li>
        <li role="presentation"><a href="#SaleItem" aria-controls="SaleItem" class="tab" data-toggle="tab"><i class="fa fa-archive"></i> Sale Items</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" class="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i> Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" class="tab" data-toggle="tab"><i class="fa fa-cogs"></i> Settings</a></li>
        <li role="presentation"><a href="#!" aria-controls="settings" class="tab" data-toggle="tab"><i class="fa fa-credit-card"></i> <b>No Rekening Admin : </b> &nbsp; <i><?= $admin_rek; ?></i></a></li>
    <?php endif; ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
    <?php if ($_SESSION['scopes'] != 'user/'): ?>
        <div role="tabpanel" class="tab-pane active" id="UserOrder">
        	<?php require_once 'sub_templates/_TableUserOrders.php'; ?>
        </div>
    <?php endif; ?>
        <div role="tabpanel" class="tab-pane" id="YourOrders">
        	<?php require_once 'sub_templates/_TableDaelerOrders.php'; ?>
        </div>
    <?php if ($_SESSION['scopes'] != 'user/'): ?>
        <div role="tabpanel" class="tab-pane" id="SaleItem">
        	<?php require_once 'sub_templates/_SaleItems.php'; ?>
        </div>
    <?php endif ?>
        <div role="tabpanel" class="tab-pane" id="messages">
        	<?php require_once 'sub_templates/_Messages.php'; ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="settings">
        	<?php require_once 'sub_templates/_Settings.php'; ?>
        </div>
    </div>
</div>