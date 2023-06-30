Para redirigir el archivo index.php a base.html, puedes utilizar el siguiente código en el archivo index.php:

php
<?php
session_start();
session_unset();
session_destroy();
header("Location: template/login/login.html"); // Redirige al usuario al formulario de inicio de sesión después de cerrar sesión
exit();
?>

