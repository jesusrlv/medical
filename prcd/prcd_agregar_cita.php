<?php

include('conn.php');

$fecha = $_POST['fecha_cita'];
$hora = $_POST['hora_cita'];
$paciente = $_POST['paciente_cita'];
$diagnostico = $_POST['diagnostico_cita'];
$observaciones = $_POST['observaciones_cita'];
$estatus = 1;

$sql="INSERT INTO citas(
fecha,
hora,
id_paciente,
diagnostico,
observaciones,
estatus
) 
VALUES(
'$fecha',
'$hora',
'$paciente',
'$diagnostico',
'$observaciones',
'$estatus'
)";

$resultado= $conn->query($sql);
// echo $resultado;
if($resultado){

    echo json_encode(array(
        'success' => 1
    ));
}

else{
  $error = $conn->error;
    echo json_encode(array(
        'success' => 0,
        'error' => $error
    ));

}

?>