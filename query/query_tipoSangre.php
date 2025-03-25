<?php

    require("../prcd/conn.php");
    echo'
    <option selected>Seleccionar tipo de sangre del paciente</option>
    ';
    $sql = "SELECT * FROM tiposangre ORDER BY id ASC";
    $resultado = $conn->query($sql);
    while($row= $resultado->fetch_assoc()){
        echo '
        <option value="'.$row['id'].'">'.$row['tipoSangre'].'</option>
        ';
    }

?>