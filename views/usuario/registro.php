<h1>Registro de usuario</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
<strong class="alert_green">Registro completado correctamente</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
<strong class="alert_red">siga participando, Introduce bien los datos</strong>

<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?= base_url ?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="nombre" required/>
    <label for="apellidos">Apellidos</label>
    <input type="text" id="nombre" name="apellidos" placeholder="apellidos" required/>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="email" required/>
    <label for="password">Contraseña</label>
    <input type="text" id="password" name="password" placeholder="contraseña" required/>

    <input type="submit" value="registrarse" />
</form>