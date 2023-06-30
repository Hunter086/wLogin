<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["username"])) {
header("Location: index.html"); // Redirige al usuario al formulario de inicio de sesión si no ha iniciado sesión
exit();
}

// Si el usuario ha iniciado sesión, muestra el contenido de la página
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menú con botón de inicio de sesión</title>
    <link rel="stylesheet" type="text/css" href="/wLogin/public/css/base.css">
</head>
<body>
<div id="background"></div>
    <nav class="menu">
        <div class="menu-toggle">
          <i class="fas fa-bars"></i>
        </div>
        <ul class="menu-list">
          <div>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Acerca</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="/wLogin/template/usuarios/listaUsuarios.php">Usuarios</a></li>
          </div>
          <li><a href="/wLogin/src/Controller/LogoutController.php">Cerrar sesión</a></li>
        </ul>
    </nav>
      
      
    <!--<h1>Bienvenido, <?php echo $_SESSION["username"]; ?></h1>
    <p>Esta es la página protegida que solo puedes ver si has iniciado sesión.</p>-->
    <script src="/wLogin/public/js/base.js"></script>
    <script src="/wLogin/public/js/background.js"></script>
    
</body>
</html>
