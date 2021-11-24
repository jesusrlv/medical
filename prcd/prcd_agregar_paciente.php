<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

?>

<html>
<header>
        

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</header>

<?php

include('conn.php');

$nombre = $_POST['nombre_paciente'];
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


$sql="INSERT INTO paciente(nombre,direccion,telefono,edad,peso,sexo,alergias,estatura,tipo_sangre,email,nombre_emergencia,telefono_emergencia) 
VALUES('$nombre','$direccion','$telefono','$edad','$peso','$sexo','$alergias','$estatura','$tipo_sangre','$email','$nombre_emergencia','$telefono_emergencia')";
$resultado= $conn->query($sql);
// echo $resultado;
if($resultado){

    echo "<script type=\"text/javascript\">Swal.fire(
        'Proceso exitoso',
        'Paciente agregado',
        'success'
      ).then(function(){location.href='../dashboard.php';}
    
      
    
    );</script>";
}

else{
    echo "<script type=\"text/javascript\">Swal.fire(
        'Advertencia',
        'Paciente no agregado',
        'warning'
      ).then(function(){window.location=history.go(-1);}
    
      
    
    );</script>";

}

?>


</html>