<?php

include('conn.php');

$nombre = $_POST['nombre_paciente'];
$apellido = $_POST['apellido_paciente'];
$direccion = $_POST['direccion_paciente'];
$telefono = $_POST['telefono_paciente'];
$edad = $_POST['edad_paciente'];
$peso = $_POST['peso_paciente'];
$sexo = $_POST['sexo_paciente'];
$alergias = $_POST['alergias_paciente'];
$estatura = $_POST['estatura_paciente'];
$tipo_sangre = $_POST['tiposangre_paciente'];
$email = $_POST['email_paciente'];
$nombre_emergencia = $_POST['nombre_emergencia'];
$telefono_emergencia = $_POST['telefono_emergencia'];


$sql="INSERT INTO paciente(
    nombre,
    apellido,
    direccion,
    telefono,
    edad,
    peso,
    sexo,
    alergias,
    estatura,
    tipo_sangre,
    email,
    nombre_emergencia,
    telefono_emergencia) 
VALUES(
'$nombre',
'$apellido',
'$direccion',
'$telefono',
'$edad',
'$peso',
'$sexo',
'$alergias',
'$estatura',
'$tipo_sangre',
'$email',
'$nombre_emergencia',
'$telefono_emergencia')";
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