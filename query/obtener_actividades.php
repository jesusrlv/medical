<?php
include("../prcd/conn.php");

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

// Obtener la fecha del parámetro GET
$fecha = $_GET['fecha'];

// Consulta para obtener las actividades del día
$sql = "SELECT id, hora, observaciones, estatus, id_paciente FROM citas WHERE fecha = '$fecha' ORDER BY hora";
$result = $conn->query($sql);
// Crear un arreglo para almacenar las actividades
$actividades = [];

if ($result->num_rows > 0) {
    // Recorrer los resultados y almacenarlos en el arreglo
    while ($row = $result->fetch_assoc()) {
        $paciente = $row['id_paciente'];
        $sql_paciente = "SELECT apellido, nombre FROM paciente WHERE id = '$paciente'";
        $result_paciente = $conn->query($sql_paciente);
        $row_paciente = $result_paciente->fetch_assoc();
        $nombre_paciente = $row_paciente['apellido']. ", ". $row_paciente['nombre'];
        $actividades[] = [
            'id' => $row['id'],
            'hora' => $row['hora'],
            'descripcion' => $row['observaciones'],
            'concretada' => (bool)$row['estatus'],
            'paciente' => $nombre_paciente
        ];
    }
}

// Cerrar la conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($actividades);
?>