<?php

include('conn.php');

$id = $_POST['id'];
$diagnostico = $_POST['diagnostico'];
$procedimiento = $_POST['procedimiento'];

$sql="UPDATE procedimientos SET 
diagnostico = '$diagnostico',
descripcion = '$procedimiento'
WHERE id = '$id'";

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