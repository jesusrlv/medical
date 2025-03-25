<?php

include('../prcd/conn.php');

$id = $_POST['id'];

// Consulta para obtener las citas
$sql = "SELECT * FROM paciente WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sexo = $row['sexo'];
$tipoSangre = $row['tipo_sangre'];
if($sexo == 1){
    $sexo = "Masculino";
}
else{
    $sexo = "Masculino";
}

$sqlTipoSangre = "SELECT * FROM tiposangre WHERE id = '$tipoSangre'";
$resultadoTipoSangre = $conn->query($sqlTipoSangre);
$rowTipoSangre = $resultadoTipoSangre->fetch_assoc();
$tipoSangre = $rowTipoSangre['tipoSangre'];

    echo json_encode(array(
        'success' => 1,
        'nombre' => $row['nombre'],
        'apellido' => $row['apellido'],
        'peso' => $row['peso'],
        'sexo' => $sexo,
        'alergia' => $row['alergias'],
        'estatura' => $row['estatura'],
        'tipoSangre' => $tipoSangre,
        'nombreEmergencia' => $row['nombre_emergencia'],
        'telefonoEmergencia' => $row['telefono_emergencia']
    ));


?>