<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tienda de camisetas</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div id="container">
            <!--Head-->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                    <a href="index.php">Tienda de camisetas</a>
                </div>
            </header>

            <!--MENU-->
            <nav id="menu">
                <ul>
                    <li><a href="">Inicio</a></li>
                </ul>
            </nav>

            <div id="content">
                <!--BARRTA LATERAL-->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <h3>Login</h3>
                        <form action="#" method="post">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="email"/>
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" placeholder="****"/>
                            <input type="submit" value="login" />
                        </form>
                        <ul>
                            <li><a href="#">Mis pedidos</a></li>
                            <li><a href="#">Gestionar pedidos</a></li>
                            <li><a href="#">Gestionar categorias</a></li>
                        </ul>
                    </div>
                </aside>
                <!--CONTENIDO-->
                <div id="central">
                    <h1>Productos destacados</h1>
                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="camiseta">
                        <h2>Camiseta Azul Ancha</h2>
                        <a href="#" class="button">Comprar</a>
                    </div>

                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="camiseta">
                        <h2>Camiseta Azul Ancha</h2>
                        <a href="" class="button">Comprar</a>
                    </div>

                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="camiseta">
                        <h2>Camiseta Azul Ancha</h2>
                        <a href="" class="button">Comprar</a>
                    </div>
                </div>
            </div>

            <!--FOOTER-->
            <footer id="footer">
                <p>Desarrollado por LuCa &copy; <?= date('Y') ?></p>
            </footer>
        </div>
    </body>
</html>