<?php

include('conn.php');

$idPaciente = $_POST['idPaciente'];
$fecha = $_POST['fecha'];
$diagnostico = $_POST['diagnostico'];
$procedimiento = $_POST['procedimiento'];

$sql="INSERT INTO procedimientos(
id_ext,
fecha,
diagnostico,
descripcion
) 
VALUES(
'$idPaciente',
'$fecha',
'$diagnostico',
'$procedimiento'
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