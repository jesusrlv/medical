<?php
include('conn.php');

$id = $_POST['id'];

$sql="DELETE FROM citas WHERE id = '$id'";
$resultado= $conn->query($sql);

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