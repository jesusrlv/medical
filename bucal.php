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
<script src="https://kit.fontawesome.com/b2e301b71f.js" crossorigin="anonymous"></script>
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
        <strong><i class="bi bi-list-columns-reverse"></i> Expediente de tratamiento</strong> 
      </p>
      <hr>
      <p class="h5 mt-2 bg-light text-secondary p-4 rounded">
        <strong><i class="bi bi-person-circle"></i> Nombre del paciente: </strong>XXXX XXXX XXXXX 
      </p>
      <hr>
      <div class="alert alert-primary" role="alert">
        <span class="text-center"><i class="fas fa-teeth-open"></i> Superiores</span>
      </div>
      <!-- inicia sección de superiores -->
      <div class="container">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group me-2 w-100" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-tooth"></i> Muela juicio
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-tooth"></i> 2do molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i class="fas fa-tooth"></i> 1er molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 2do premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 1er premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Canino
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo lateral
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo central
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>        
                  </div>
                  
                </div>
              </div>
              <div class="col-12">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group me-2 w-100" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo central
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo lateral
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Canino
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 1er premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 2do premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 1er molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 2do molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" style="z-index:100;">
                        5
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Muela juicio
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" style="z-index:100;">
                        0
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
      <!-- fin sección de superiores -->
      <div class="alert alert-primary" role="alert">
        <span class="text-center"><i class="fas fa-teeth-open"></i> Inferiores</span>
      </div>
      <!-- inicia sección de superiores -->
      <div class="container">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group me-2 w-100" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Muela juicio
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 2do molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 1er molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 2do premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 1er premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Canino
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo lateral
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo central
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>        
                  </div>
                  
                </div>
              </div>
              <div class="col-12">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group me-2 w-100" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo central
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Incisivo lateral
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Canino
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 1er premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 2do premolar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 1er molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index:100;">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> 2do molar
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" style="z-index:100;">
                        5
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary position-relative"><i class="fas fa-tooth"></i> Muela juicio
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" style="z-index:100;">
                        0
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </button>
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
      <!-- fin sección de superiores -->
    </div>

    
<main>



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


<!-- Modals -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos sobre la pieza dental XXXXX</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
              <div class="card-body">
                <div class="row border-bottom mb-3 pb-3">
                    <div class="col-10">
                      <strong class="h3"><i class="bi bi-person-bounding-box"></i> Historial clínico</strong>
                    </div>
                    <div class="col-2">
                    <a href="bucal_agregar.php" type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Agregar</a>
                    </div>
                </div>
               
                <p class="ms-5"> 
                <label for="inputState" class="form-label"><strong><i class="bi bi-clipboard-data"></i> Diagnóstico: </strong></label>
                <table class="table table-striped table-sm table-hover">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Diagnóstico</th>
                      <th scope="col"><i class="bi bi-calendar3"></i> Fecha</th>
                      <th scope="col">Procedimiento</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>                
                </p>
                
                 <p class="border-top ms-4"> 
                    <label for="inputState" class="form-label p-2"><strong><i class="bi bi-clipboard-plus"></i> Procedimientos aplicados: </strong></label>
                    <table class="table table-striped table-sm table-hover">
                  <thead class="table-dark">
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Procedimiento</th>
                      <th scope="col"><i class="bi bi-calendar3"></i> Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modals -->

<!-- Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Historial dental</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    ...
  </div>
</div>
<!-- Offcanvas -->

<!-- Offcanvas -->
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel">Historial dental</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    ...
  </div>
</div>
<!-- Offcanvas -->