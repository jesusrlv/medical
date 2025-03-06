<?php

include('conn.php');

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$paciente = $_POST['paciente'];
$diagnostico = $_POST['diagnostico'];
$observaciones = $_POST['observaciones'];
$estatus = 0;

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