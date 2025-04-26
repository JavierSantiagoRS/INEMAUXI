<?php
header("Content-Type: application/json");

$host = 'localhost'; 
$dbname = 'chatbot_db';
$user = 'root';
$password ="" ;

// La línea corregida:
$conexion = new mysqli($host, $user, $password, $dbname);

if ($conexion->connect_errno) {
    die("No conectado: " . $conexion->connect_error);
} else {
}


// Consulta
$sql = "SELECT pregunta, respuesta FROM chatbot";
$resultado = $conexion->query($sql);

$datos = [];

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
}

echo json_encode($datos);
$conexion->close();
