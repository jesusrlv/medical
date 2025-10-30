<?php
header('Content-Type: application/json');
include('../prcd/conn.php');

$id = $_POST['id'];

$sql = "SELECT * FROM procedimientos WHERE id = '$id'";
$result = $conn->query($sql);
if($result){
$row = $result->fetch_assoc();

echo json_encode(array(
    'success' => 1,
    'id' => $row['id'],
    'fecha' => $row['fecha'],
    'diagnostico' => $row['diagnostico'],
    'descripcion' => $row['descripcion']
));
} else {
    echo json_encode(array(
        'success' => 0
    ));
}
?>