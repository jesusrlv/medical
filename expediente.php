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

    $idPaciente = $_REQUEST['id'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">

    <link rel="stylesheet" href="css/dientes.css">

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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
  </head>
  <body>  

<main>
  <h1 class="visually-hidden">Dental | Inicio</h1>

  <input type="text" id="idPaciente" value="<?php echo $idPaciente ?>" hidden>
  
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="dashboard.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
         
          <img src="css/assets/brand/dental.png" alt="" width="32">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="dashboard.php" class="nav-link px-2 text-secondary">Inicio</a></li>
          <li><a href="citas.php" class="nav-link px-2 text-white"><i class="bi bi-list-columns-reverse"></i> Agenda</a></li>
          
          <li><a href="pacientes.php" class="nav-link px-2 text-white"><i class="bi bi-person-bounding-box"></i> Pacientes</a></li>
          <li><a href="catalogo.php" class="nav-link px-2 text-white"><i class="bi bi-person-lines-fill"></i> Catálogo</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          
        </form>

        <div class="text-end">
          
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
      <strong><i class="bi bi-list-columns-reverse"></i> Expediente </strong> 
    </p>
    <hr>
    
    </div>
<main>

<div class="container container-fluid mb-3">

      <div class="row row-cols-2">

          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <!-- aquí va el alert de datos -->
            <p class="border bg-light text-secondary p-4 rounded">
              <strong><i class="bi bi-person-circle"></i> Nombre del paciente: </strong>
              <span id="nombrePaciente"></span>
              <br>
              <strong><i class="bi bi-clipboard-heart-fill"></i> Peso: </strong>
              <span id="pesoPaciente"></span>
              <br>
              <strong><i class="bi bi-gender-ambiguous"></i> Sexo: </strong>
              <span id="sexoPaciente"></span>
              <br>
              <strong><i class="bi bi-capsule-pill"></i> Alergia: </strong>
              <span id="alergiaPaciente"></span>
              <br>
              <strong><i class="bi bi-rulers"></i> Estatura: </strong>
              <span id="estaturaPaciente"></span>
              <br>
              <strong><i class="bi bi-droplet-fill"></i> Tipo de sangre: </strong>
              <span id="sangrePaciente"></span>
              <br>
              <strong><i class="bi bi-person-fill"></i> Contacto de emergencia: </strong>
              <span id="nombreemergenciaPaciente"></span>
              <br>
              <strong><i class="bi bi-telephone"></i> Teléfono de emergencia: </strong>
              <span id="telefonoemergenciaPaciente"></span>
            </p>
          </div>

          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <strong><i class="bi bi-person-bounding-box"></i> Historial clínico</strong>
                  </div>
                  <div class="col-6 text-end">
                    <button class="btn btn-primary btn-sm text-end" data-bs-toggle="modal" data-bs-target="#agregarHistorial"><i class="bi bi-clipboard-plus-fill"></i> Nuevo</button>
                  </div>
                </div>

                <hr>
                <div class="table-responsive">
                  <table class="table table-sm text-center">
                    <thead class="bg-dark text-info">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Diagnóstico</th>
                        <th scope="col">Procedimiento(s)</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody id="tablaProcedimientos">
                      
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
      </div>

</div>


</main>
</body>


<div class="container border-top">
  <footer class="py-3 my-4">
    
    <p class="text-center text-muted">REDDeploy &copy; 2025</p>
  </footer>
</div>
</div>

<!-- Modal  agregar historial -->
<div class="modal fade" id="agregarHistorial" tabindex="-1" aria-labelledby="agregarHistorialLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-info">
        <h1 class="modal-title fs-5" id="agregarHistorialLabel"><i class="bi bi-journal-plus"></i> Agregar procedimiento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard2-pulse"></i></span>
            <select class="form-select" aria-label="Seleciona diagnóstico ..." id="diagnosticoExpediente">
              
            </select>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard2-pulse-fill"></i></span>
          <!-- <input type="text" class="form-control" placeholder="Procedimiento" aria-label="Procedimiento" aria-describedby="basic-addon1" id="procedimientoExpediente"> -->
          <textarea class="form-control" rows="4"
          placeholder="Descripción del procedimiento..." id="procedimientoExpediente"></textarea>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="agregarHistorial()"><i class="bi bi-floppy2-fill"></i> Guardar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>

<script src="css/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/expediente.js"></script>
