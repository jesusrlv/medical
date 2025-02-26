<?php
include('conn.php');
session_start();

$usuario=$_POST['usr'];
$pwd=$_POST['pwd'];
$query="SELECT * FROM usr WHERE usr='$usuario' AND pwd='$pwd'";
$proceso=$conn->query($query);
$filas = $proceso->num_rows;
$row = $proceso->fetch_assoc();

    if ($filas == 1) {
            $_SESSION['id']=$row['id'];
            $_SESSION['usr']=$row['usr'];
            $_SESSION['privilegio']=$row['privilegio'];
            echo json_encode(array(
                'success' => 1
            ));
        }      
    else if ($filas == 0){
        echo json_encode(array(
            'success' => 0
        ));
    }
?>