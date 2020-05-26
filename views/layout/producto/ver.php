<?php if (isset($product)) : ?>
  <h1><?= $product->nombre ?></h1>
  <div id="detail-product">
      <div class="image">
          <?php if ($product->imagen != null) : ?>
            <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="camiseta">
          <?php else: ?>
            <img src="<?= base_url ?>assets/img/camiseta.png"  alt="alt"/>

          <?php endif; ?>
      </div>
      <div class="data">
          <p class="price"><?= $product->precio ?></p>
          <a href="<?=base_url?>/carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
      </div>
  </div>
<?php else: ?>
  <p>El producto no existe</p>
<?php endif; ?>
