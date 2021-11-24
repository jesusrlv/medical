<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

?>

<html>
<header>
        <link rel="shortcut icon" href="../../../img/mini_logo_cigo.ico" />  

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</header>

<?php

include('conn.php');

$nombre = $_POST['nombre'];
$usuario = $_POST['username'];
$pwd = $_POST['password'];
// $hash_pwd = md5($pwd);
$correo = $_POST['correo'];
$perfil = 1;

$sql="INSERT INTO usr(nombre,usuario,pwd,perfil,correo) 
VALUES('$nombre','$usuario','$pwd','$perfil','$correo')";
$resultado= $conn->query($sql);
echo $resultado;
if($resultado){

    echo "<script type=\"text/javascript\">Swal.fire(
        'Proceso exitoso',
        'Usuario agregado',
        'success'
      ).then(function(){location.href='../../index.php';}
    
      
    
    );</script>";
}

else{
    echo "<script type=\"text/javascript\">Swal.fire(
        'Advertencia',
        'Usuario no agregado',
        'warning'
      ).then(function(){window.location=history.go(-1);}
    
      
    
    );</script>";

}

?>


</html>