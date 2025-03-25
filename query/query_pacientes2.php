<?php

include('../prcd/conn.php');

// Consulta para obtener las citas
$sql = "SELECT * FROM paciente ORDER BY id ASC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo '

    <tr class="text-center">
        <td>'.$row['nombre'].' '.$row['apellido'].'</td>
        <td>'.$row['direccion'].'</td>
        <td>'.$row['telefono'].'</td>
        <td>'.$row['edad'].'</td>
        <td>'.$row['sexo'].'</td>
        <td>'.$row['peso'].'</td>
        <td><a href="expediente.php?id='.$row['id'].'"><i class="bi bi-clipboard2-pulse"></i></a></td>
    </tr>
    ';
}

?>