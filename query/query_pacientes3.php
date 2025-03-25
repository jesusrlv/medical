<?php

include('../prcd/conn.php');

$id = $_POST['id'];

// Consulta para obtener las citas
$sql = "SELECT * FROM paciente WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    echo json_encode(array(
        'success' => 1,
        'nombre' => $row['nombre'],
        'apellido' => $row['apellido'],
        'peso' => $row['peso'],
        'sexo' => $row['sexo'],
        'alergia' => $row['alergias'],
        'estatura' => $row['estatura'],
        'tipoSangre' => $row['tipo_sangre'],
        'nombreEmergencia' => $row['nombre_emergencia'],
        'telefonoEmergencia' => $row['telefono_emergencia']
    ));


?>