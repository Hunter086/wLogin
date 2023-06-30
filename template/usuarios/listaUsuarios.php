<?php include '../../template/base.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Gestión de Usuarios</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/wLogin/public/css/lista.css">
  <link rel="stylesheet" type="text/css" href="/wLogin/public/css/form.css">
  <link rel="stylesheet" type="text/css" href="/wLogin/public/css/title.css">
</head>
<body>
  <h1 class="title">Gestión de Usuarios</h1>
  <!-- Lista de Usuarios -->
  <h2 class="subtitle">Lista de Usuarios</h2>
  <div id="user-list">
    <ul id="users"></ul>
  </div>
  <h2 class="subtitle">Crear/Editar Usuario</h2>
  <div id="user-form">
    <form id="user-form-data">
      <input type="hidden" id="user-id" value="">
      <label for="userName">Username:</label>
      <input type="text" name="userName" id="userName">
      <label for="password">Password:</label>
      <input type="text" name="password" id="password">
      <label for="firtName">Nombre:</label>
      <input type="text" name="firtName" id="firtName" required>
      <label for="userLastName">Apellido:</label>
      <input type="text" name="userLastName" id="userLastName" required>
      <label for="userEmail">Correo:</label>
      <input type="email" name="userEmail" id="userEmail" required>
      <button class="button success" type="submit">Guardar</button>
      <button class="button info" type="button" id="cancelButton">Cancelar</button>
    </form>
  </div>

  <script src="/wlogin/public/js/listaUsuarios.js"></script>
</body>
</html>
