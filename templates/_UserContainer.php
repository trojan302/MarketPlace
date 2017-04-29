 <div class="container" style="padding-top: 30px;">
  
  <div class="row" id="products">
  <?php foreach ($items as $data) { ?>
    <div class="col-md-3 col-sm-6">
    <img src="<?= $data['images'] ?>" class="img-responsive">
      <h2><?= $data['name'] ?></h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
  <?php } ?>
  </div>

  <nav class="text-center">
    <ul class="pagination">
      <?php for ($i=1; $i < $number['numPage'] ; $i++) { ?>
      <li><a href="?halaman=<?= $i ?>#products"><?= $i ?></a></li>
      <?php } ?>
    </ul>
  </nav>

  <hr>

  <footer>
    <p>&copy; Betta Shop <?= date('Y') ?></p>
  </footer>
</div>