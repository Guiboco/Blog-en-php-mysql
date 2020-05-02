
<!-- SIDEBAR -->

<aside id="sidebar">
    <?php if (isset($_SESSION['usuario'])) : ?>
        <div id="usuario-logeado" class="bloque">
            <h3> !Bienvenido <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?> ¡</h3>
            
            <!-- Botones -->
            <a href="crear-entradas.php" class="boton boton-verde"> Crear entradas </a>
            <a href="crear-categoria.php" class="boton"> Crear categoria </a>
            <a href="logout.php" class="boton boton-naranja"> Mis datos </a>
            <a href="logout.php" class="boton boton-rojo"> Cerrar Sesión </a>
        </div>

    <?php endif ?>

    <?php if (!isset($_SESSION['usuario'])) : ?>
    <div id="login" class="bloque">
        <h3>Identificate</h3>

        <?php if (isset($_SESSION['error_login'])) : ?>
            <div id="usuario-logeado" class="alerta alerta-error">
                <h3> <?= $_SESSION['error_login']; ?> </h3>
            </div>
        <?php endif ?>
        <form action="login.php" method="POST">

            <label for="email"> Email </label>
            <input type="email" name="email">

            <label for="password"> Contraseña </label>
            <input type="password" name="password">

            <input type="submit" class="boton" value="Entrar">
        </form>
    </div>

    <div id="registro" class="bloque">

        <!-- MOSTRAR ERRORES -->
        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif; ?>

        <h3>Registrate</h3>
        <form action="registro.php" method="POST">

            <label for="nombre"> Nombre </label>
            <input type="text" name="nombre">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="apellidos"> Apellidos </label>
            <input type="text" name="apellidos">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

            <label for="email"> Email </label>
            <input type="email" name="email">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <label for="password"> Contraseña </label>
            <input type="password" name="password">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

            <input type="submit" name="submit" class="boton" value="Registrar">

        </form>
        <?php borrarErrores(); ?>
    </div>

    <?php endif ?>
</aside>