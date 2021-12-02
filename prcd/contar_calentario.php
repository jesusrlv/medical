<?php
// include('conn.php');

$fecha_calcular1=date("$annio,$mtotal,1");
$uno = "SELECT * FROM citas WHERE fecha = '$fecha_calcular1'";
$resultado_uno = $conn->query($uno);
$row_uno = $resultado_uno->fetch_assoc();
$row_cnt1 = $resultado_uno->num_rows;

// arreglo

while (1){
    $día = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

    foreach($age as $x => $val) {
    echo "$x = $val<br>";

}

}
?>