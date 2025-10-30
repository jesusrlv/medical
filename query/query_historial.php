<?php

include('../prcd/conn.php');

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

$id = $_POST['idPaciente'];
$x = 0;
// Consulta para obtener las citas
$sql = "SELECT * FROM procedimientos WHERE id_ext = '$id' "; //
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $x++;
    echo '
    <tr>
        <td>' . $x . '</td>
        <td>' . $row['fecha'] . '</td>
        <td>' . $row['diagnostico'] . '</td>
        <td>' . $row['descripcion'] . '</td>
        <td>
            <a href="bucal.php?id='.$row['id'].'" class="btn btn-primary btn-sm"><i class="bi bi-folder-symlink-fill"></i></a>
        </td>
        <td>
            <a href="#" class="btn btn-warning btn-sm" onclick="modalEditarExpediente('.$row['id'].')"><i class="bi bi-pencil-square"></i></a>
        </td>
        <td>
            <a href="bucal.php?id='.$row['id'].'" class="btn btn-danger btn-sm" onclick="eliminarExpediente('.$row['id'].')"><i class="bi bi-trash"></i></a>
        </td>
    </tr>
    ';
}

// Cerrar la conexión
$conn->close();
?>