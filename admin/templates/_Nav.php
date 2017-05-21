<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#button-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-shopping-bag"></i> Betta Shop</a>
    </div>
    
    <div class="collapse navbar-collapse" id="button-collapse">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="navbar-text hidden-xs"><i class="fa fa-user"></i> Hi, <?= $_SESSION['firstname'] ?></li>
        <li <?php if ($admin->alert_notif() > 0): ?> class="bg-danger" <?php else: ?> class="" <?php endif ?> >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell-o"></i> Notifications <span class="sr-only">(current)</span>
            <?php if ($admin->alert_notif() > 0): ?> <sup class="badge"><?= $admin->alert_notif() ?></sup> <?php else: ?>  <?php endif ?>
          </a>
          <ul class="dropdown-menu">
          <?php if ($admin->alert_notif() > 0): ?>
            <?php foreach ($notif as $data): ?>

            <li><a href="javascript:;" data-idUser="<?= $data['id_user'] ?>" class="change-status"><i class="fa fa-user"></i> <?= $data['email'] ?></a></li>

            <?php endforeach ?>
            <li class="text-center"><a href="notifications.php">Notifications Users <span class="badge"><?= $admin->alert_notif() ?></span></a></li>
          <?php else: ?>
            <li class="text-center"><a href="#">Notifications is Empty</a></li>
          <?php endif ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Options <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="settings.php"><i class="fa fa-cogs"></i> General Settings</a></li>
            <li><a href="#"><i class="fa fa-fort-awesome"></i> Sosial Media</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= __SHOP__ ?>admin/logout.php"><i class="fa fa-minus-circle"></i> Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>