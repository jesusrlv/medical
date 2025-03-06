<?php

include('conn.php');

$id = $_POST['id'];
$estatus = $_POST['estatus'];

$sql="UPDATE citas SET estatus = '$estatus' WHERE id = '$id'";
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