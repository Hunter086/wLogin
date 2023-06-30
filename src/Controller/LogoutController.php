<?php
session_start();
session_unset();
session_destroy();
header("Location: /wLogin/template/login/login.html"); // Redirige al usuario al formulario de inicio de sesión después de cerrar sesión
exit();
?>
