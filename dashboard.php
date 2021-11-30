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
    
<!-- <svg xmlns="http://www.w3.org/2000/svg" style="display: none;"> -->
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
  </symbol>
  <symbol id="speedometer2" viewBox="0 0 16 16">
    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
  </symbol>
  <symbol id="table" viewBox="0 0 16 16">
    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
  </symbol>
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
  <symbol id="grid" viewBox="0 0 16 16">
    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
  </symbol>
</svg>

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
    <div class="container">
    <p class="h4 mt-5">
  <strong><i class="bi bi-person-circle"></i> Bienvenido</strong> <? echo $usuario ?>.
</p>
<hr>
    </div>
<main>
<div class="container py-4">
<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><i class="bi bi-list-columns-reverse"></i> Agendar citas médicas</h1>
        <p class="col-md-8 fs-4">Agregar citas para los pacientes registrados en el sistema.</p>
        <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle"></i> Agregar cita</button>
        <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCita"><i class="bi bi-calendar-week-fill"></i> Ver citas</button>
        <!-- <a href="citas.php" class="btn btn-primary btn-lg" type="button" ><i class="bi bi-calendar-week-fill"></i> Ver citas</a> -->
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2><i class="bi bi-person-bounding-box"></i> Pacientes registrados</h2>
          <p>Examinar los pacientes registrados y dar de alta.</p>
          <button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalPaciente"><i class="bi bi-plus-circle"></i> Alta de pacientes</button>
          <a href="pacientes.php" class="btn btn-outline-light" type="button"><i class="bi bi-search"></i> Ver pacientes</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2><i class="bi bi-person-lines-fill"></i>  Catálogo de diagnóstico</h2>
          <p>Visualizar el catálogo de diagnñotico con costos.</p>
          <a href="catalogo.php" class="btn btn-outline-secondary" type="button">Ver catálogo</a>
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