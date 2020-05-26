<?php if (isset($edit) && isset($pro) && is_object($pro)): ?>
  <h1>Editar producto <?= $pro->nombre?></h1>
  <?php $url_action = base_url . "producto/save&id=".$pro->id; ?>
<?php else : ?>
  <h1>Crear nuevos productos</h1>
  <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>
<div class="form_container">

    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="type" id="nombre" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"/>

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>"/>

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>"/>

        <label for="Categoria">Categoria</label>

        <?php $categorias = Utils::showCategorias(); ?>
        <select id="categorias" name="categoria">
            <?php while ($cat = $categorias->fetch_object()): ?>
              <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                  <?= $cat->nombre ?>
              </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Subir imagen</label>
        <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
        <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" width="width" height="hight" alt="alt" class="thumb"/>
        <?php endif; ?>
        <input type="file" name="imagen" id="imagen">
        <input type="submit" value="Gurdar" />
    </form>

</div>
