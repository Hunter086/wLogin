
<?php
session_start();
try {
  // Conecta a la base de datos
  $config = parse_ini_file('C:\xampp\htdocs\wLogin\config.ini');
  // Conexión a la base de datos
  $servername = $config["servername"];
  $username = $config["username"];
  $password = $config["password"];
  $dbName = $config["dbName"];
  $conn = new mysqli($servername, $username, $password, $dbName);
} catch (PDOException $e) {
  die('Error al conectar con la base de datos: ' . $e->getMessage());
}
// Verifica si la conexión es exitosa
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene los datos de inicio de sesión del formulario
$username = $_POST["username"];
$password = $_POST["password"];

// Escapa los caracteres especiales para evitar ataques de inyección SQL
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Busca el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password_user='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  // Inicio de sesión exitoso
  $_SESSION["username"] = $username;
  $response = array("success" => true);
} else {
  // Inicio de sesión fallido
  $response = array("success" => false, "message" => "Nombre de usuario o contraseña incorrectos");
}

echo json_encode($response);
$conn->close();
?>

