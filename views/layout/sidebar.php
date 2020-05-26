<!--BARRTA LATERAL-->
<aside id="lateral">
    
        <div id="login" class="block_aside">
            <h3>Carrito</h3>
            <ul>
                <?php $stats = Utils::statsCarrito() ?>
                <li> <a href="<?=base_url?>carrito/index">Productos(<?=$stats['count']?>)</a></li>
                <li> <a href="<?=base_url?>carrito/index">Total $<?=$stats['total']?></a></li>
                <li> <a href="<?=base_url?>carrito/index">Ver carrito</a></li>
            </ul>
    </div>
    
    <div id="login" class="block_aside">
        <?php if(!isset($_SESSION['identity'])): ?>
        <h3>Login</h3>
        <form action="<?=base_url?>usuario/login" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="email"/>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="****"/>
            <input type="submit" value="login" />
        </form>

        <?php else : ?>
        <h1><?= $_SESSION['identity']->nombre ?></h1>
        <?php endif; ?>
        
        <ul>
           <?php if(isset($_SESSION['admin'])): ?>
            <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
            <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
            <li><a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a></li>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['identity'])): ?>
             <li><a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
             <li><a href="<?=base_url?>usuario/logout">Cerrar Session</a></li>
             
             <?php else: ?>
                      <li><a href="<?=base_url?>usuario/logout">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>

<!--CONTENIDO-->
<div id="central">  