<?php
        require("../prcd/conn.php");
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.UTF-8');
        $fecha_sistema = strftime("%Y-%m-%d");

          $consulta2 ="SELECT * FROM citas WHERE fecha = '$fecha_sistema' ORDER BY fecha DESC, hora DESC LIMIT 10";
          $resultado_consulta2 = $conn->query($consulta2);
          $n=0;
          while ($row_consulta2 = $resultado_consulta2->fetch_assoc()){
            $n++;
            echo ' <tr class="text-center text-white" style="background-color:#61A0DF;">';
            echo '<th scope="row">'.$n.'</th>';
            echo '<th scope="row" class="fw-light">'.date('d/m/Y',strtotime($row_consulta2['fecha'])).'</th>';
            echo '<th scope="row" class="fw-light">'.date("g:i A",strtotime($row_consulta2['hora'])).'</th>';

            $id_paciente=$row_consulta2['id_paciente'];
              $paciente = "SELECT * FROM paciente WHERE id ='$id_paciente'";
              $resultado_paciente= $conn->query($paciente);
              $row_paciente=$resultado_paciente->fetch_assoc();
              echo '<th scope="row" class="fw-light">'.utf8_encode($row_paciente['nombre']).'</th>';

            $id_diagnostico=$row_consulta2['diagnostico'];
            $diagnostico = "SELECT * FROM diagnostico WHERE id ='$id_diagnostico'";
            $resultado_diagnostico= $conn->query($diagnostico);
            $row_diagnostico=$resultado_diagnostico->fetch_assoc();
            echo '<th scope="row" class="fw-light">'.utf8_encode($row_diagnostico['nombre']).'</th>';

            echo '<th scope="row" class="fw-light">'.$row_consulta2['observaciones'].'</th>';
            if ($row_consulta2['status']==1){
              
              echo '<th scope="row" class="bg-primary text-light fw-light"><i class="bi bi-check-circle-fill"></i> Acudió</th>';
            }
            else{
              echo '<th scope="row" class="bg-danger text-light fw-light"><i class="bi bi-x-circle-fill"></i> No acudió</th>';
            }
            echo '</tr>';
          }

        ?>