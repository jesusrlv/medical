<?php

include('../prcd/conn.php');

// Consulta para obtener las citas
$sql = "SELECT * FROM paciente ORDER BY id ASC"; //
$result = $conn->query($sql);
echo'
<option value="" selected>Selecciona el paciente ...</option>
';
while($row = $result->fetch_assoc()) {
    echo '

    <tr>
        <td>'.$row['nombre'].' '.$row['apellido'].'</td>
        <td>'.$row['domicilio'].'</td>
        <td>'.$row['telefono'].'</td>
        <td>'.$row['edad'].'</td>
        <td>'.$row['sexo'].'</td>
        <td>'.$row['peso'].'</td>
        <td><a href="expediente"><i class="bi bi-clipboard2-pulse"></i></a></td>


    <option value="'.$row['id'].'">'.$row['nombre'].'</option>
    ';
}

?>