<?php 
$servidor = "localhost"; //127.0.0.1
$baseDeDatos = "app";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo "Error de conexión: " . $ex->getMessage();
    exit(); // Termina la ejecución si hay un error de conexión
}
?>
