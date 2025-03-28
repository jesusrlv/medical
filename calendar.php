<?php

session_start();

// if (isset($_SESSION['usr'])) {
//   if($_SESSION['privilegio']==1){

//   }
//   else{
//     header('Location: prcd/sort.php');
//     die();
//   }
  
// } else {

//   header('Location: prcd/sort.php');
//   die();
// }

include('prcd/conn.php');

// variables de sesión

    $usuario = $_SESSION['usr'];
    $id = $_SESSION['id'];
    $perfil = $_SESSION['privilegio'];
    // $nombre = $_SESSION['nombre'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dental | Agenda</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    
<link rel="icon" type="image/png" href="css/assets/brand/dental.png" />
    <!-- Bootstrap core CSS -->
<link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
      #contenedorCalendario {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 1px;
      }

    .card {
        min-height: 200px; /* Ajusta la altura según sea necesario */

    }
    /* Estilos para los encabezados de los días de la semana */
    .card-header {
        background-color: #343a40; /* Fondo oscuro */
        color: white; /* Texto blanco */
        font-weight: bold; /* Texto en negrita */
        text-align: center; /* Centrar texto */
        padding: 10px; /* Espaciado interno */
    }
    /* Estilos para las cards vacías */
    .card.border-secondary {
        border-color: #6c757d !important; /* Borde gris */
    }

    .card.bg-secondary {
        background-color: #6c757d !important; /* Fondo gris */
    }

    .card.bg-secondary .card-title {
        opacity: 0.5; /* Texto semi-transparente */
    }

    /* Estilos para el header del calendario */
    .header-day {
       min-height: 100px; /* Reducir a la mitad la altura */
    }

    .header-day .card-body {
        padding: 5px; /* Reducir el espaciado interno */
    }

    .header-day h5 {
        font-size: 14px; /* Reducir el tamaño del texto */
        font-weight: bold; /* Texto en negrita */
        margin: 0; /* Eliminar margen */
    }

    /* Efecto hover para dispositivos de escritorio */
    .cardActivo:hover {
        transform: scale(1.05); /* Escalar la card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
        transition: transform 0.2s, box-shadow 0.2s; /* Transición suave */
    }

    /* Efecto para dispositivos móviles (clase activa) */
    .cardActivo.active {
        transform: scale(1.05); /* Escalar la card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
        transition: transform 0.2s, box-shadow 0.2s; /* Transición suave */
    }
    /* Estilo para actividades concretadas */
.actividad-concretada {
    background-color: rgba(0, 123, 255, 0.1); /* Azul leve */
    border-left: 4px solid #007bff; /* Borde azul */
}

/* Estilo para actividades no concretadas */
.actividad-no-concretada {
    background-color: rgba(255, 0, 0, 0.1); /* Rojo leve */
    border-left: 4px solid #dc3545; /* Borde rojo */
}

/* Estilo general para cada actividad */
.list-group-item {
    padding: 10px 15px;
    margin-bottom: 5px;
    border-radius: 4px;
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
  </head>
  <body onload="generarCalendario();">
    
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
          <li><a href="dashboard.php" class="nav-link px-2 text-white">Inicio</a></li>
          <li><a href="citas.php" class="nav-link px-2 text-secondary"><i class="bi bi-list-columns-reverse"></i> Agenda</a></li>
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

    <p class="h4 mt-4">
        <strong><i class="bi bi-person-circle"></i> Bienvenido</strong> Usuario.
      </p>

    <hr>

      <p class="h4 mt-3 bg-info text-light p-4 rounded">
        <strong><i class="bi bi-list-columns-reverse"></i> Agenda</strong> 
      </p>

      <p></p>

    </div>
<main>

<div class="container py-4">

<div class="row">
  <div class="col-4">
    <select class="form-select" aria-label="Default select example" id="mes" name="mes" required>
      <option selected>Mes</option>
      <option value="0">Enero</option>
      <option value="1">Febrero</option>
      <option value="2">Marzo</option>
      <option value="3">Abril</option>
      <option value="4">Mayo</option>
      <option value="5">Junio</option>
      <option value="6">Julio</option>
      <option value="7">Agosto</option>
      <option value="8">Septiempre</option>
      <option value="9">Octubre</option>
      <option value="10">Noviembre</option>
      <option value="11">Diciembre</option>
    </select>
   
  </div>
  <div class="col-4">
    <select class="form-select" aria-label="Default select example" id="annio" name="annio" required>
      <option selected required>Año</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
      <option value="2026">2026</option>
      <option value="2027">2027</option>
      <option value="2028">2028</option>
      <option value="2029">2029</option>
    </select>
  </div>
  <div class="col-4">
    <button type="submit" class="btn btn-primary" onclick="cambiarMes()"><i class="bi bi-search"></i> Buscar</button>
  </div>
</div>
<hr>

<!-- inicia calendar -->
    <div id="contenedorCalendario" class="card-group"></div>
<!-- termina calendar -->

    </div>
    </main>
</body>


<div class="container border-top">
  <footer class="py-3 my-4">
    <p class="text-center text-muted">REDDeploy &copy; 2025</p>
  </footer>
</div>

</div>


    <script src="css/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/calendar.js"></script>

      
  </body>
</html>

<!-- Modal -->
<div class="modal fade" id="modalActividades" tabindex="-1" aria-labelledby="modalActividadesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-info">
                <h5 class="modal-title" id="modalActividadesLabel">Actividades del Día (<span id="fechaActD"></span>)</h5>
                <button type="button" class="btn-close bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Lista de actividades -->
                <div id="lista-actividades" class="list-group" style="max-height: 400px; overflow-y: auto;">
                    <!-- Las actividades se insertarán aquí dinámicamente -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark text-info" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal nueva actividad-->
<div class="modal fade" id="nuevaActividad" tabindex="-1" aria-labelledby="modalActividadesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-info">
                <h5 class="modal-title" id="modalActividadesLabel">Agregar nueva cita (<span id="fechaNuevaActD"></span> | <span id="horaNuevaActD"></span>:00hs)</h5>
                <button type="button" class="btn-close bg-info" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h3 class="mt-2 mb-4">Datos de la cita</h3>

              <label for="exampleFormControlTextarea1" class="form-label">Seleccionar al paciente previamente registrado</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-check"></i></span>
                <select class="form-select" aria-label="Default select example" id="pacientesSelect">
                  
                </select>
              </div>
              
              <label for="exampleFormControlTextarea1" class="form-label">Diagnóstivo previo del paciente</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard"></i></span>
                <select class="form-select" aria-label="Default select example" id="diagnosticoSelect">
                  
                </select>
              </div>

              <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard"></i></span>
                <textarea class="form-control" id="observaciones"></textarea>
              </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-dark text-info" onclick="guardarAgenda()"><i class="bi bi-plus-circle-dotted"></i> Agregar actividad</button>
                <button type="button" class="btn btn-dark text-info" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>