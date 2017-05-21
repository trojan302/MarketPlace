<nav class="navbar navbar-default navbar-fixed-top card">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if (!empty($_SESSION['scopes'])) { ?>
      <a class="navbar-brand" href="<?= __SHOP__ . $_SESSION['scopes'] ?>"><i class="fa fa-shopping-bag"></i> E-Market</a>
      <?php }else{ ?>
      <a class="navbar-brand" href="<?= __SHOP__?>"><i class="fa fa-shopping-bag"></i> E-Market</a>
      <?php } ?>
      <ul class="nav navbar-nav">
          <li class="active"> 
          <?php if (!empty($_SESSION['scopes'])): ?> 
            <a href="<?= __SHOP__ . $_SESSION['scopes'] ?>">Home</a>
          <?php else: ?> 
            <a href="<?= __SHOP__?>">Home</a>
          <?php endif ?>
          </li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-info-sign"></i> How To? <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="how-to-order-item.php">Order Items</a></li>
              <li><a href="how-to-transaction.php">Transaction</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Others <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="shippings.php">Shippings</a></li>
              <li><a href="t-o-t-m.php">Transaction of The Mounth</a></li>
              <li><a href="hot_sales.php">Hot Sales</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Utitlities</li>
              <li><a href="payment.php">Order Payment</a></li>
              <li class="disabled"><a href="javascript:;">QrCode Payment System</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <?php if (!empty($_SESSION['users'])) { ?>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Cart (<?= $cart->cart_count($_SESSION['users']) ?>) <span class="caret"></span></a>
          <div class="dropdown-menu dropdown-cart" role="menu">
          <?php if ($cart->cart_count($_SESSION['users']) < 1): ?>
            <p class="text-center">-- Cart is empty --</p>
          <?php else: ?>
            <table class="table table-condensed">
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Size</th>
                <th>QTY</th>
                <th>Price</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($cart->cart_items($_SESSION['users']) as $data) { ?>
              <tr>
                <td><?= $data['C_NAME'] ?></td>
                <td><?= $data['C_SIZE'] ?></td>
                <td><?= $data['C_QTY'] ?></td>
                <td><?= str_replace(',','.',number_format($data['C_PRICE'] * $data['C_QTY'])) ?></td>
                <td><a href="?id_cart=<?= $data['C_ID'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
              </tr>
            <?php } ?>
              <tr>
                <td colspan="5" align="center"><a href="cart.php">View All Cart Item</a></td>
              </tr>
            </tbody>
            </table>
          <?php endif; ?>
          </div>
      </li>
        <li><p class="navbar-text">Sing in as </p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= ucfirst($_SESSION['firstname']) ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#">Change password</a></li>
            <li><a href="#">Change Image Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
    </ul>
    <?php }else{ ?>
      <div id="navbar" class="navbar-collapse collapse small">
      <form class="navbar-form navbar-right" method="POST" action="<?= __ACT__ ?>Login.php">
        <div class="form-group">
          <input type="email" placeholder="Email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control" name="password">
        </div>
        <input type="submit" name="login" value="Sign In" class="btn btn-success">
        <a href="signup.php" class="btn btn-link"> Sign Up</a>
      </form>
    </div>
    <?php } ?>
  </div>
</nav>