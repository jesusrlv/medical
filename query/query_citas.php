<?php
header('Content-Type: application/json');

include('../prcd/conn.php');

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

// Consulta para obtener las citas
$sql = "SELECT fecha, COUNT(*) as total, SUM(estatus = 1) as concretadas, SUM(estatus = 0) as no_concretadas 
        FROM citas 
        GROUP BY fecha";
$result = $conn->query($sql);

// Crear un arreglo para almacenar los datos
$citas = [];

if ($result->num_rows > 0) {
    // Recorrer los resultados y almacenarlos en el arreglo
    while ($row = $result->fetch_assoc()) {
        $citas[$row['fecha']] = [
            'total' => (int)$row['total'],
            'concretadas' => (int)$row['concretadas'],
            'no_concretadas' => (int)$row['no_concretadas']
        ];
    }
}

// Cerrar la conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($citas);
?>