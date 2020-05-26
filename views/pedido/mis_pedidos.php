<?php if (isset($gestion)): ?>
  <h1>GESTIONAR PEDIDOS</h1>

<?php else: ?>
  <h1>MIS PEDIDOS</h1>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <th>N° pedido</th>
            <th>Coste</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($ped = $pedidos->fetch_object()) :
          ?>
          <tr>
              <td>
                  <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"> <?= $ped->id ?></a>
              </td>
              <td>
                  <?= $ped->coste ?>  $
              </td>
              <td>
                  <?= $ped->fecha ?>
              </td>
              
              </td>
              <td>
                  <?= Utils::showStatus($ped->estado) ?>
              </td>
          </tr>
        <?php endwhile; ?>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>