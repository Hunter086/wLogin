<?php
header('Content-Type: application/json');

$config = parse_ini_file('C:\xampp\htdocs\wLogin\config.ini');
// Conexión a la base de datos
$servername = $config["servername"];
$username = $config["username"];
$password = $config["password"];
$dbName = $config["dbName"];

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error al conectar con la base de datos: ' . $e->getMessage());
}
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'getUsers':
        getUsers();
        break;
    case 'createUser':
        createUser();
        break;
    case 'editUser':
        editUser();
        break;
    case 'deleteUser':
        deleteUser();
        break;
    default:
        echo json_encode([]);
}

function getUsers() {
    global $db;
    $query = $db->query('SELECT * FROM usuarios ORDER BY id ASC');
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
}

function createUser() {
    global $db;
    $data = json_decode(file_get_contents('php://input'), true);
    $userName= $data['userName'];
    $firtName = $data['firtName'];
    $userLastName = $data['userLastName'];
    $userEmail= $data['userEmail'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $query = $db->prepare('INSERT INTO usuarios (username, nombre, apellido, correo, password_user) VALUES (:username, :firtName, :apellido, :correo, :password_user)');
    $query->execute(array('username' => $userName,'firtName' => $firtName,'apellido' => $userLastName,'correo' => $userEmail, 'password_user' => $password));

    echo json_encode(['message' => 'Usuario creado correctamente']);
}

function editUser() {
    global $db;
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $firtName = $data['firtName'];
    $userLastName = $data['userLastName'];
    $userEmail= $data['userEmail'];

    $query = $db->prepare('UPDATE usuarios SET nombre = :firtName, apellido = :apellido, correo =:correo WHERE id = :id');
    $query->execute(array('firtName' => $firtName,'apellido' => $userLastName,'correo' => $userEmail,'id' => $id));

    echo json_encode(['message' => 'Usuario actualizado correctamente']);
}

function deleteUser() {
    global $db;
    $id = $_GET['id'];

    $query = $db->prepare('DELETE FROM usuarios WHERE id = :id');
    $query->execute(array('id' => $id));

    echo json_encode(['message' => 'Usuario eliminado correctamente']);
}