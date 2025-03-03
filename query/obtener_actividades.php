<?php
include("../prcd/conn.php");

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

// Obtener la fecha del parámetro GET
$fecha = $_GET['fecha'];

// Consulta para obtener las actividades del día
// $sql = "SELECT CAST(hora AS UNSIGNED) AS hora, observaciones, estatus FROM citas WHERE fecha = '$fecha' ORDER BY hora";
$sql = "SELECT hora, observaciones, estatus FROM citas WHERE fecha = '$fecha' ORDER BY hora";
$result = $conn->query($sql);
// Crear un arreglo para almacenar las actividades
$actividades = [];

if ($result->num_rows > 0) {
    // Recorrer los resultados y almacenarlos en el arreglo
    while ($row = $result->fetch_assoc()) {
        $actividades[] = [
            'hora' => $row['hora'],
            'descripcion' => $row['observaciones'],
            'concretada' => (bool)$row['estatus']
        ];
    }
}

// Cerrar la conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($actividades);
?>