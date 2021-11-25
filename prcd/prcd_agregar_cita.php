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

$fecha = $_POST['fecha_cita'];
$hora = $_POST['hora_cita'];
$paciente = $_POST['paciente_cita'];
$diagnostico = $_POST['diagnostico_cita'];
$observaciones = $_POST['observaciones_cita'];

$sql="INSERT INTO citas(fecha,hora,id_paciente,diagnostico,observaciones) 
VALUES('$fecha','$hora','$paciente','$diagnostico','$observaciones')";
$resultado= $conn->query($sql);
// echo $resultado;
if($resultado){

    echo "<script type=\"text/javascript\">Swal.fire(
        'Proceso exitoso',
        'CIta agregada',
        'success'
      ).then(function(){location.href='../dashboard.php';}
    
      
    
    );</script>";
}

else{
    echo "<script type=\"text/javascript\">Swal.fire(
        'Advertencia',
        'Cita no agregada',
        'warning'
      ).then(function(){window.location=history.go(-1);}
    
      
    
    );</script>";

}

?>


</html>