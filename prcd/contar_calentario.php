<?php
// include('conn.php');



// ------------------------- uno ----------------------------------------------
$fecha_calcular1=date("$annio,$mtotal,1");
$dia1 = date('l', strtotime($fecha_calcular1));

$uno = "SELECT * FROM citas WHERE fecha = '$fecha_calcular1'";
$resultado_uno = $conn->query($uno);
// $row_uno = $resultado_uno->fetch_assoc();
$row_cnt1 = $resultado_uno->num_rows;

$uno_si = "SELECT * FROM citas WHERE fecha = '$fecha_calcular1' AND status = 1";
$resultado_uno_si = $conn->query($uno_si);
$row_cnt1_si = $resultado_uno_si->num_rows;

$uno_no = "SELECT * FROM citas WHERE fecha = '$fecha_calcular1' AND status = 0";
$resultado_uno_no = $conn->query($uno_no);
$row_cnt1_no = $resultado_uno_no->num_rows;



// ------------------------- dos ----------------------------------------------
$fecha_calcular2=date("$annio,$mtotal,2");
$dia2 = date('l', strtotime($fecha_calcular2));

$dos = "SELECT * FROM citas WHERE fecha = '$fecha_calcular2'";
$resultado_2 = $conn->query($dos);
$row_cnt2 = $resultado_2->num_rows;

$dos_si = "SELECT * FROM citas WHERE fecha = '$fecha_calcular2' AND status = 1";
$resultado_dos_si = $conn->query($dos_si);
$row_cnt2_si = $resultado_dos_si->num_rows;

$dos_no = "SELECT * FROM citas WHERE fecha = '$fecha_calcular2' AND status = 0";
$resultado_dos_no = $conn->query($dos_no);
$row_cnt2_no = $resultado_dos_no->num_rows;









?>