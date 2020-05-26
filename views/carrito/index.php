<h1>Carrito de compra</h1>

<table>
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($carrito as $indice => $elemento) :
          $producto = $elemento['producto'];
          ?>
          <tr>
              <td>
                  <div class="image">
                      <?php if ($producto->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" alt="camiseta">
                      <?php else: ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" alt="alt"/>

                      <?php endif; ?>
                  </div>
              </td>
              <td>
                  <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>">text<?= $producto->nombre ?></a> 
              </td>
              <td>
                  <?= $producto->precio ?>
              </td>
              <td>
                  <?= $elemento['unidades'] ?>
              </td>
          </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>z
<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio total: <?= $stats['total'] ?> </h3>
    <a href="<?=base_url?>pedido/hacer" class="button-pedido">Hacer pedido</a>

</div>