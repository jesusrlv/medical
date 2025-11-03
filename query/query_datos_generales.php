<?php

include('../prcd/conn.php');

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

$id = $_POST['id'];
// Consulta para obtener las citas
$sql = "SELECT * FROM paciente WHERE id = '$id' ORDER BY id ASC"; //
$result = $conn->query($sql);

$row = $result->fetch_assoc();
    echo json_encode(array(
        'nombre' => $row['nombre'],
        'apellido_p' => $row['apellido'],
        'edad' => $row['edad'],
        'peso' => $row['peso'],
        'telefono' => $row['telefono'],
        'alergias' => $row['alergias']
    ));
// Cerrar la conexión
$conn->close();
?>