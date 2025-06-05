<?php
$conexion = new mysqli("localhost", "root", "", "voley_db");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $posicion = $_POST['posicion'];

    $stmt = $conexion->prepare("INSERT INTO jugadores (nombre, edad, posicion) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nombre, $edad, $posicion);

    if ($stmt->execute()) {
        echo json_encode(["estado" => "ok", "mensaje" => "Jugador insertado correctamente"]);
    } else {
        echo json_encode(["estado" => "error", "mensaje" => "Error al insertar"]);
    }

    $stmt->close();
}
$conexion->close();
?>
