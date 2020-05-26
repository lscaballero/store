<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
  <h1>Pedido Confirmado</h1>
  <p>Tu pedido ha sido guardado con exito,  paga ahora</p>

  <?php if (isset($pedido)): ?>
    <h3>Datos del peido</h3>

    Número del pedido :<?= $pedido->id ?></br>
    Total a pagar :<?= $pedido->coste ?> </br>
    Productos :

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()): ?>



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
                  <?= $producto->unidades ?>
              </td>
          </tr>



            <?php endwhile; ?>

    </table>

  <?php endif; ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>

  <h1>Pedido NO Confirmado</h1>
  <p> paga ahora</p>

<?php endif; ?>
