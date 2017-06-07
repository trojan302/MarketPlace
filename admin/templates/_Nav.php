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
      <a class="navbar-brand" href="#"><i class="fa fa-shopping-bag"></i> E-Marketplace</a>
    </div>
    
    <div class="collapse navbar-collapse" id="button-collapse">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li <?php if (count($messages->get_messages($_SESSION['users'])) > 0): ?> class="bg-info" <?php else: ?> class="" <?php endif ?> ><a href="messages.php"><i class="fa fa-comments"></i> Pesan 
        <?php if ($messages->get_messages($_SESSION['users'])[0]['view'] == 0): ?>
          <sup class="badge"><?= count($messages->get_messages($_SESSION['users'])) ?></sup>
        <?php else: ?>
        <?php endif ?></a></li>
        <li class="navbar-text hidden-xs"><i class="fa fa-user"></i> Hi, <?= $_SESSION['firstname'] ?></li>
        <li <?php if ($admin->alert_notif() > 0): ?> class="bg-danger" <?php else: ?> class="" <?php endif ?> >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell-o"></i> Notifikasi <span class="sr-only">(current)</span>
            <?php if ($admin->alert_notif() > 0): ?> <sup class="badge"><?= $admin->alert_notif() ?></sup> <?php else: ?>  <?php endif ?>
          </a>
          <ul class="dropdown-menu">
          <?php if ($admin->alert_notif() > 0): ?>
            <?php foreach ($notif as $data): ?>

            <li><a href="javascript:;" data-idUser="<?= $data['id_user'] ?>" class="change-status"><i class="fa fa-user"></i> <?= $data['email'] ?></a></li>

            <?php endforeach ?>
            <li class="text-center"><a href="notifications.php">Notifikasi Users <span class="badge"><?= $admin->alert_notif() ?></span></a></li>
          <?php else: ?>
            <li class="text-center"><a href="#">Notifikasi Kosong</a></li>
          <?php endif ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Opsi <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="settings.php"><i class="fa fa-cogs"></i> Pengaturan Umum</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= __SHOP__ ?>admin/logout.php"><i class="fa fa-minus-circle"></i> Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>