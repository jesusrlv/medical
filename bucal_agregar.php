<?php
session_start();

if (isset($_SESSION['usr'])) {
  if($_SESSION['privilegio']==1){

  }
  else{
    header('Location: prcd/sort.php');
    die();
  }
  
} else {

  header('Location: prcd/sort.php');
  die();
}

include('prcd/conn.php');

// variables de sesión

    $usuario = $_SESSION['usr'];
    $id = $_SESSION['id'];
    $perfil = $_SESSION['privilegio'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dental | Inicio</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    
<link rel="icon" type="image/png" href="css/assets/brand/dental.png" />
    <!-- Bootstrap core CSS -->
<link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">

<link rel="stylesheet" href="css/dientes.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
  </head>
  <body>  

<main>
  <h1 class="visually-hidden">Dental | Inicio</h1>

  

  

  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="dashboard.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg> -->
          <img src="css/assets/brand/dental.png" alt="" width="32">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="dashboard.php" class="nav-link px-2 text-secondary">Inicio</a></li>
          <li><a href="citas.php" class="nav-link px-2 text-white"><i class="bi bi-list-columns-reverse"></i> Agenda</a></li>
          <!-- <li><a href="#" class="nav-link px-2 text-white"><i class="bi bi-card-list"></i> Diagnóstico</a></li> -->
          <li><a href="pacientes.php" class="nav-link px-2 text-white"><i class="bi bi-person-bounding-box"></i> Pacientes</a></li>
          <li><a href="catalogo.php" class="nav-link px-2 text-white"><i class="bi bi-person-lines-fill"></i> Catálogo</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <!-- <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search"> -->
        </form>

        <div class="text-end">
          <!-- <button type="button" class="btn btn-outline-light me-2">Login</button> -->
          <a href="prcd/sort.php" type="button" class="btn btn-warning"><i class="bi bi-door-open-fill"></i> Salir</a>
        </div>
      </div>
    </div>
  </header> 
  <div class="b-example-divider"></div>

  
</main>

<body>
    <div class="container mb-5">
    <p class="h4 mt-5">
      <strong><i class="bi bi-person-circle"></i> Bienvenido</strong> <? echo $usuario ?>.
    </p>
    <hr>

    <p class="h4 mt-5 bg-info text-light p-4 rounded">
      <strong><i class="bi bi-list-columns-reverse"></i> Expediente (alta de procedimiento)</strong> 
    </p>
    <hr>
    <p class="h5 mt-2 bg-light text-secondary p-4 rounded">
      <strong><i class="bi bi-person-circle"></i> Nombre del paciente: </strong>XXXX XXXX XXXXX 
    </p>
    </div>
<main>

<div class="container container-fluid mb-3">

      <div class="row row-cols-2">
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
          <select class="form-select form-select-lg mb-3 w-100" aria-label=".form-select-lg example">
            <option selected>Seleccione pieza dental</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
            <!-- <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action"><img src="assets/4x/1.png" id="" width="14" alt=""> diente 1</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-primary"><img src="assets/4x/2.png" id="" width="14" alt=""> diente 2</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-secondary"> <img src="assets/4x/3.png" id="" width="14" alt=""> diente 3</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-success"> <img src="assets/4x/4.png" id="" width="14" alt=""> diente 4</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-danger"><img src="assets/4x/5.png" id="" width="14" alt=""> diente 5</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-warning"><img src="assets/4x/6.png" id="" width="14" alt=""> diente 6</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-info"><img src="assets/4x/7.png" id="" width="14" alt=""> diente 7</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-light"><img src="assets/4x/8.png" id="" width="14" alt=""> diente 8</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-dark"><img src="assets/4x/9.png" id="" width="14" alt=""> diente 9</a>
              <a href="#" class="list-group-item list-group-item-action"><img src="assets/4x/1.png" id="" width="14" alt=""> diente 10</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-primary"><img src="assets/4x/2.png" id="" width="14" alt=""> diente 11</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-secondary"> <img src="assets/4x/3.png" id="" width="14" alt=""> diente 12</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-success"> <img src="assets/4x/4.png" id="" width="14" alt=""> diente 13</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-danger"><img src="assets/4x/5.png" id="" width="14" alt=""> diente 14</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-warning"><img src="assets/4x/6.png" id="" width="14" alt=""> diente 15</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-info"><img src="assets/4x/7.png" id="" width="14" alt=""> diente 16</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-light"><img src="assets/4x/8.png" id="" width="14" alt=""> diente 8</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-dark"><img src="assets/4x/9.png" id="" width="14" alt=""> diente 9</a>
            </div> -->


          </div>
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <strong><i class="bi bi-person-bounding-box"></i> Historial clínico</strong>
                <hr>
                <p>
                <label for="inputState" class="form-label"><strong><i class="bi bi-clipboard-data"></i> Diagnóstico: </strong></label>
                <textarea type="text" class="form-control" id="formGroupExampleInput" placeholder="Escriba DX..."></textarea> 
                </p>
                <p><strong><i class="bi bi-image"></i> Imágenes:</strong> 
                <a href="#"><i class="bi bi-plus-circle"></i></a>
                <!-- inicia galeria -->
                <div class="row row-cols-auto">
                  <div class="col-md-2">
                    <div class="thumbnail rounded">
                      <a href="#">
                        <img src="assets/img_dental/dental_01.jpg" alt="Lights" class="border" style="max-width:100px; height:100px; border-radius:5px;">
                        <!-- <div class="caption">
                          <p>Lorem ipsum...</p>
                        </div> -->
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="thumbnail rounded">
                      <a href="#">
                        <img src="assets/img_dental/dental_02.jpg" alt="Lights" class="border" style="max-width:100px; height:100px; border-radius:5px;">
                        <!-- <div class="caption">
                          <p>Lorem ipsum...</p>
                        </div> -->
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="thumbnail rounded">
                      <a href="#">
                        <img src="assets/img_dental/dental_03.jpg" alt="Lights" class="border" style="max-width:100px; height:100px; border-radius:5px;">
                        <!-- <div class="caption">
                          <p>Lorem ipsum...</p>
                        </div> -->
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="thumbnail rounded">
                      <a href="#">
                        <img src="assets/img_dental/dental_04.jpg" alt="Lights" class="border" style="max-width:100px; height:100px; border-radius:5px;">
                        <!-- <div class="caption">
                          <p>Lorem ipsum...</p>
                        </div> -->
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="thumbnail rounded">
                      <a href="#">
                        <img src="assets/img_dental/dental_04.jpg" alt="Lights" class="border" style="max-width:100px; height:100px; border-radius:5px;">
                        <!-- <div class="caption">
                          <p>Lorem ipsum...</p>
                        </div> -->
                      </a>
                    </div>
                  </div>
                   <div class="col-md-2"> <!-- Imágen de agregar -->
                    <div class="thumbnail rounded bg-light" style="width:100px; height:100px;">
                      <a href="#">
                      <i class="bi bi-plus-circle p-1" style="max-width:100px; height:100px; border-radius:5px;font-size:4.3rem; border-style: dashed;"></i></a>
                        <!-- <img src="assets/img_dental/dental_04.jpg" alt="Lights" class="border" style="max-width:100px; height:100px; border-radius:5px;"> -->
                        <!-- <div class="caption">
                          <p>Lorem ipsum...</p>
                        </div> -->
                      </a>
                    </div>
                  </div>
                  
                </div><!-- fin galeria -->
                </p>
                 <p> 
                    <label for="inputState" class="form-label"><strong><i class="bi bi-clipboard-plus"></i> Procedimiento: </strong></label>
                    <select id="inputState" class="form-select"></p>
                      <option selected>Seleccione el procedimiento...</option>
                      <option>...</option>
                    </select>
              </div>
              <div class="d-grid gap-2 p-3">
                <button class="btn btn-primary" type="button"><i class="bi bi-cloud-plus-fill"></i> Guardar</button>
                <button class="btn btn-danger" type="button"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
              </div>
              <!-- <p class="mb-2"><button type="button" class="btn btn-primary bt-lg"><i class="bi bi-cloud-plus-fill"></i> Guardar</button></p> -->
            </div>
          </div>
      </div>

</div>


</main>
</body>

<div class="b-example-divider"></div>

<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li><a href="#" class="nav-link px-2 text-secondary">Inicio</a></li>
        <li><a href="#" class="nav-link px-2 text-dark"><i class="bi bi-list-columns-reverse"></i> Agenda</a></li>
        <!-- <li><a href="#" class="nav-link px-2 text-dark"><i class="bi bi-card-list"></i> Diagnóstico</a></li> -->
        <li><a href="#" class="nav-link px-2 text-dark"><i class="bi bi-person-bounding-box"></i> Pacientes</a></li>
        <li><a href="#" class="nav-link px-2 text-dark"><i class="bi bi-person-lines-fill"></i> Catálogo</a></li>
    </ul>
    <p class="text-center text-muted">REDDeploy &copy; 2021</p>
  </footer>
</div>
</div>


    <script src="css/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>


<!-- Modal agendar cita -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Agendar cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="prcd/prcd_agregar_cita.php" method="POST">

      <div class="modal-body">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-calendar-week-fill"></i> Fecha</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="dd/mm/aaaa" name="fecha_cita" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-stopwatch-fill"></i> Hora</label>
            <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="dd/mm/aaaa" name="hora_cita" required>
        </div>
      
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-person-bounding-box"></i> Paciente</label>
                <select class="form-select" aria-label="Default select example" name="paciente_cita">
                    <option selected>Seleccionar paciente</option>
    
                    <?php

                      $consulta ="SELECT * FROM paciente ORDER BY id ASC";
                      $resultado_consulta = $conn->query($consulta);
                      while ($row_consulta = $resultado_consulta->fetch_assoc()){
                        echo '<option value="'.$row_consulta['id'].'">'.$row_consulta['nombre'].'</option>';
                      }
                      
                    ?>

                </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-person-bounding-box"></i> Diagnóstico</label>
                <select class="form-select" aria-label="Default select example" name="diagnostico_cita">
                    <option selected>Seleccionar diagóstico</option>
                    <?php

                      $consulta2 ="SELECT * FROM diagnostico ORDER BY id ASC";
                      $resultado_consulta2 = $conn->query($consulta2);
                      while ($row_consulta2 = $resultado_consulta2->fetch_assoc()){
                        echo '<option value="'.$row_consulta2['id'].'">'.$row_consulta2['nombre'].'</option>';
                      }
                      
                    ?>
                </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"><i class="bi bi-card-list"></i> Observaciones</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observaciones_cita"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-square-fill"></i> Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Guardar cita</button>
    
    </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal agregar paciente -->

<div class="modal fade" id="exampleModalPaciente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Agregar paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="prcd/prcd_agregar_paciente.php" method="POST">

      <div class="modal-body">

      <div class="alert" style="background-color:#A7B6DB; color:#183FDB;" role="alert">
      <span class="h4"><i class="bi bi-exclamation-circle-fill"></i> Datos del paciente</span>
        <hr>
<!-- </div> -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-person-bounding-box"></i> Nombre</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agregar nombre" name="nombre_paciente" required>
        </div>

        <div class="row">
          <div class="col">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-house-door-fill"></i> Dirección</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agregar dirección" name="direccion_paciente" required>
            </div>
          </div>
            <div class="col">
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-telephone-plus-fill"></i> Teléfono</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agregar teléfono" name="telefono_paciente" required>
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-chat-square-quote"></i> Edad</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Edad del paciente" name="edad_paciente" required>
            </div>
          </div>

          <div class="col">  
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-person-bounding-box"></i> Peso</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Agregar peso" name="peso_paciente" required>
            </div>
          </div>

          <div class="col"> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-gender-ambiguous"></i> Sexo</label>
                    <select class="form-select" aria-label="Default select example" name="sexo_paciente">
                        <option selected>Seleccionar ...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
            </div>
          </div>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-journal-medical"></i> Alergias</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agregar alergias" name="alergias_paciente" required>
        </div>

        <div class="row">
          <div class="col"> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-123"></i> Estatura</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agregar estatura" name="estatura_paciente" required>
            </div>
          </div>
          <div class="col"> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-droplet-fill"></i> Tipo de sangre</label>
                    <select class="form-select" aria-label="Default select example" name="tiposangre_paciente">
                        <option selected>Seleccionar sexo del paciente</option>
                        <option value="1">O +</option>
                        <option value="2">O -</option>
                        <option value="3">A +</option>
                        <option value="4">A -</option>
                        <option value="5">AB +</option>
                        <option value="6">AB -</option>
                    </select>
            </div>
          </div>
        </div>



        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-envelope-check-fill"></i> Correo electrónico</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Agregar email" name="email_paciente" required>
        </div>
      
        </div>
        <!-- fin alert -->

        <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-circle-fill"></i> Contacto de emergencia

        <hr>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-person-bounding-box"></i> Nombre</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agregar nombre" name="nombre_emergencia" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="bi bi-telephone-plus-fill"></i> Teléfono</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Agregar teléfono" name="telefono_emergencia" required>
        </div>
        </div>
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-square-fill"></i> Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Guardar paciente</button>
    
    </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal ver cita -->

<div class="modal fade" id="exampleModalCita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-calendar-week-fill"></i> CITAS PROGRAMADAS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="prcd/prcd_agregar_paciente.php" method="POST">

      <div class="modal-body">

      <div class="alert" style=" color:#918383;" role="alert">
      <span class="h4"><i class="bi bi-list-columns-reverse"></i> AGENDA</span>
        <hr>

        <div class="container py-4">

      <table class="table table-bordered table-sm table-hover table-responsive">
        <thead class="table-dark">
        <tr class="text-center fw-lighter">
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Nombre</th>
            <th scope="col">Diagnóstico</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Estatus</th>
        </thead>
        <tbody>
        <?php

          // date_default_timezone_set('America/Mexico_City');
          // setlocale(LC_TIME, 'es_MX.UTF-8');
          // $fecha_actual=strftime("%Y-%m-%d");
          // $hora_actual=strftime("%H:%M:%S");

          date_default_timezone_set('America/Mexico_City');
                  setlocale(LC_TIME, 'es_MX.UTF-8');
                  $fecha_sistema = strftime("%Y-%m-%d");

          $consulta2 ="SELECT * FROM citas WHERE fecha = '$fecha_sistema' ORDER BY fecha DESC, hora DESC LIMIT 10";
          $resultado_consulta2 = $conn->query($consulta2);
          $n=0;
          while ($row_consulta2 = $resultado_consulta2->fetch_assoc()){
            echo ' <tr class="text-center text-white" style="background-color:#61A0DF;">';
            $n++;
            echo '<th scope="row">'.$n.'</th>';
            echo '<th scope="row" class="fw-light">'.date('d/m/Y',strtotime($row_consulta2['fecha'])).'</th>';
            // echo '<th scope="row" class="fw-light">'.date("H:i",time($row_consulta2['hora'])).'</th>';
            echo '<th scope="row" class="fw-light">'.date("g:i A",strtotime($row_consulta2['hora'])).'</th>';
            // echo '<th scope="row">'.$row_consulta2['id_paciente'].'</th>';
              $id_paciente=$row_consulta2['id_paciente'];
              $paciente = "SELECT * FROM paciente WHERE id ='$id_paciente'";
              $resultado_paciente= $conn->query($paciente);
              $row_paciente=$resultado_paciente->fetch_assoc();
              echo '<th scope="row" class="fw-light">'.utf8_encode($row_paciente['nombre']).'</th>';

            // echo '<th scope="row">'.$row_consulta2['diagnostico'].'</th>';
            $id_diagnostico=$row_consulta2['diagnostico'];
            $diagnostico = "SELECT * FROM diagnostico WHERE id ='$id_diagnostico'";
            $resultado_diagnostico= $conn->query($diagnostico);
            $row_diagnostico=$resultado_diagnostico->fetch_assoc();
            echo '<th scope="row" class="fw-light">'.utf8_encode($row_diagnostico['nombre']).'</th>';

            echo '<th scope="row" class="fw-light">'.$row_consulta2['observaciones'].'</th>';
            // echo '<th scope="row">'.$row_consulta2['status'].'</th>';
            if ($row_consulta2['status']==1){
              
              echo '<th scope="row" class="bg-primary text-light fw-light"><i class="bi bi-check-circle-fill"></i> Acudió</th>';
            }
            else{
              echo '<th scope="row" class="bg-danger text-light fw-light"><i class="bi bi-x-circle-fill"></i> No acudió</th>';
            }
            echo '</tr>';
          }

        ?>
          </tr>
          
        </tbody>
      </table>

          </div>
        </div>

        </div>
        <!-- fin alert -->

        
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-square-fill"></i> Cerrar</button>
        <a href="calendar.php" type="submit" class="btn btn-primary"><i class="bi bi-link"></i> Ver agenda completa</a>
    
    </form>

      </div>
    </div>
  </div>
</div>