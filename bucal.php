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

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="js/bucal.js"></script>

    <style>
      /* #Layer_1 {
        width: 100%;
        height: auto;
      } */
        .contenedorGeneral{
          width: 80vh;
          height: auto;
          padding: 3px;
        }
    
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
	  /* Estilos generales */
/* Estilos generales del SVG */
.dentadura-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
}

/* Arcadas */
.arcada {
  display: flex;
  justify-content: center;
  position: relative;
  width: 600px;
  margin: 30px 0;
}

/* Dientes */
.diente {
  width: 38px;
  height: auto;
  margin: 0 2.5px;
  transition: 0.3s ease;
  cursor: pointer;
}

.diente:hover {
  transform: scale(5.5);
  filter: drop-shadow(0 0 5px rgba(255, 193, 7, 0.7));
}
.superior{
	margin-bottom: 200px;
}

/* 🔺 Curvatura superior más natural (de menor a mayor curvatura hacia los extremos) */
.superior .diente:nth-child(1) { transform: rotate(-38deg) translateY(110px); }
.superior .diente:nth-child(2) { transform: rotate(-33deg) translateY(70px); }
.superior .diente:nth-child(3) { transform: rotate(-28deg) translateY(40px); }
.superior .diente:nth-child(4) { transform: rotate(-23deg) translateY(30px); }
.superior .diente:nth-child(5) { transform: rotate(-18deg) translateY(25px); }
.superior .diente:nth-child(6) { transform: rotate(-12deg) translateY(20px); }
.superior .diente:nth-child(7) { transform: rotate(-6deg) translateY(20px); }
.superior .diente:nth-child(8) { transform: translateY(15px); }
.superior .diente:nth-child(9) { transform: translateY(15px); }
.superior .diente:nth-child(10) { transform: rotate(6deg) translateY(20px); }
.superior .diente:nth-child(11) { transform: rotate(12deg) translateY(20px); }
.superior .diente:nth-child(12) { transform: rotate(18deg) translateY(25px); }
.superior .diente:nth-child(13) { transform: rotate(23deg) translateY(30px); }
.superior .diente:nth-child(14) { transform: rotate(28deg) translateY(40px); }
.superior .diente:nth-child(15) { transform: rotate(33deg) translateY(70px); }
.superior .diente:nth-child(16) { transform: rotate(38deg) translateY(110px); }

/* 🔻 Curvatura inferior (invertida respecto a la superior) */
.inferior .diente:nth-child(1) { transform: rotate(38deg) translateY(-110px); }
.inferior .diente:nth-child(2) { transform: rotate(33deg) translateY(-70px); }
.inferior .diente:nth-child(3) { transform: rotate(28deg) translateY(-40px); }
.inferior .diente:nth-child(4) { transform: rotate(23deg) translateY(-30px); }
.inferior .diente:nth-child(5) { transform: rotate(18deg) translateY(-25px); }
.inferior .diente:nth-child(6) { transform: rotate(12deg) translateY(-20px); }
.inferior .diente:nth-child(7) { transform: rotate(6deg) translateY(-20px); }
.inferior .diente:nth-child(8) { transform: translateY(-15px); }
.inferior .diente:nth-child(9) { transform: translateY(-15px); }
.inferior .diente:nth-child(10) { transform: rotate(-6deg) translateY(-20px); }
.inferior .diente:nth-child(11) { transform: rotate(-12deg) translateY(-20px); }
.inferior .diente:nth-child(12) { transform: rotate(-18deg) translateY(-25px); }
.inferior .diente:nth-child(13) { transform: rotate(-23deg) translateY(-30px); }
.inferior .diente:nth-child(14) { transform: rotate(-28deg) translateY(-40px); }
.inferior .diente:nth-child(15) { transform: rotate(-33deg) translateY(-70px); }
.inferior .diente:nth-child(16) { transform: rotate(-38deg) translateY(-100px); }

    </style>
	
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
  </head>
  <body onload="datosGenerales();">  

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
    <!-- este es id del procedimiento -->
	  <input type="text" id="idPaciente" value="<?php echo $_REQUEST['id']; ?>" >
    <!-- este es id del usuario -->
	  <input type="text" id="user" value="<?php echo $_REQUEST['user']; ?>" >

      <p class="h4 mt-5 bg-info text-light p-4 rounded">
        <strong><i class="bi bi-list-columns-reverse"></i> Expediente de tratamiento</strong> 
      </p>
      <hr>
      <p class="h5 mt-2 bg-light text-secondary p-4 rounded">
        <strong><i class="bi bi-person-circle"></i> Nombre del paciente: </strong><span id="nombrePaciente"></span> 
      </p>
      <hr>
      <div class="alert alert-primary" role="alert">
        <span class="text-center"><i class="fas fa-teeth-open"></i> Dentadura</span>
      </div>
      <!-- inicia sección de superiores -->
      <div class="container">
            <div class="row justify-content-center">
              <div class="col-6">

                <!-- svg -->
				<!-- <div class="col dentadura-container"> -->
				<!-- DENTADURA SUPERIOR -->
				<div class="arcada superior">
					<img onclick="mostrarModalDiente('d11')" id="d11" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo central sup izq">
					<img onclick="mostrarModalDiente('d12')" id="d12" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo lateral sup izq">
					<img onclick="mostrarModalDiente('d13')" id="d13" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Canino sup izq">
					<img onclick="mostrarModalDiente('d14')" id="d14" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer premolar sup izq">
					<img onclick="mostrarModalDiente('d15')" id="d15" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo premolar sup izq">
					<img onclick="mostrarModalDiente('d16')" id="d16" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer molar sup izq">
					<img onclick="mostrarModalDiente('d17')" id="d17" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo molar sup izq">
					<img onclick="mostrarModalDiente('d18')" id="d18" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Tercer molar sup izq">

					<img onclick="mostrarModalDiente('d21')" id="d21" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo central sup der">
					<img onclick="mostrarModalDiente('d22')" id="d22" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo lateral sup der">
					<img onclick="mostrarModalDiente('d23')" id="d23" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Canino sup der">
					<img onclick="mostrarModalDiente('d24')" id="d24" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer premolar sup der">
					<img onclick="mostrarModalDiente('d25')" id="d25" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo premolar sup der">
					<img onclick="mostrarModalDiente('d26')" id="d26" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer molar sup der">
					<img onclick="mostrarModalDiente('d27')" id="d27" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo molar sup der">
					<img onclick="mostrarModalDiente('d28')" id="d28" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Tercer molar sup der">
				</div>

				<!-- DENTADURA INFERIOR -->
				<div class="arcada inferior">
					<img onclick="mostrarModalDiente('d48')" id="d48" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Tercer molar inf der">
					<img onclick="mostrarModalDiente('d47')" id="d47" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo molar inf der">
					<img onclick="mostrarModalDiente('d46')" id="d46" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer molar inf der">
					<img onclick="mostrarModalDiente('d45')" id="d45" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo premolar inf der">
					<img onclick="mostrarModalDiente('d44')" id="d44" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer premolar inf der">
					<img onclick="mostrarModalDiente('d43')" id="d43" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Canino inf der">
					<img onclick="mostrarModalDiente('d42')" id="d42" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo lateral inf der">
					<img onclick="mostrarModalDiente('d41')" id="d41" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo central inf der">

					<img onclick="mostrarModalDiente('d31')" id="d31" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo central inf izq">
					<img onclick="mostrarModalDiente('d32')" id="d32" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Incisivo lateral inf izq">
					<img onclick="mostrarModalDiente('d33')" id="d33" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Canino inf izq">
					<img onclick="mostrarModalDiente('d34')" id="d34" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer premolar inf izq">
					<img onclick="mostrarModalDiente('d35')" id="d35" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo premolar inf izq">
					<img onclick="mostrarModalDiente('d36')" id="d36" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Primer molar inf izq">
					<img onclick="mostrarModalDiente('d37')" id="d37" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Segundo molar inf izq">
					<img onclick="mostrarModalDiente('d38')" id="d38" src="imagenes_apoyo/estatus_diente/Recurso 53@4x.png" class="diente" alt="Tercer molar inf izq">
				<!-- </div> -->
				</div>
				<!-- svg -->
              </div>
			  <div class="col-6">

			 <div class="card" style="width: 18rem;">
				<img src="..." class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
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

<!-- Modal -->
<div class="modal fade" id="modalDiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="" id="textDiente"></label>
		<input type="text" id="inputDiente" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

