<?php

include('../prcd/conn.php');

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

// Consulta para obtener las citas
$sql = "SELECT * FROM diagnostico ORDER BY id ASC"; //
$result = $conn->query($sql);
echo'
<option value="" selected>Selecciona el diagnóstico ...</option>
';
while($row = $result->fetch_assoc()) {
    echo '
    <option value="'.$row['id'].'">'.$row['nombre'].' | '.$row['categoria'].'</option>
    ';
}

// Cerrar la conexión
$conn->close();
?>