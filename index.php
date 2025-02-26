<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Medical</title>

    <link rel="icon" type="image/png" href="css/assets/brand/dental.png" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  
    <script src="js/acceso.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form>
    <img class="mb-4" src="css/assets/brand/dental.png" alt="" width="81" height="81">
    <h1 class="h3 mb-3 fw-normal">DENTAL | Acceso</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="usr" placeholder="name@example.com" name="usr">
      <label for="usr">Usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
      <label for="pwd">Contraseña</label>
    </div>

    <div class="checkbox mb-3">
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="button" onclick="acceso()"><i class="bi bi-person-circle"></i> Accesso</button>
    <p class="mt-5 mb-3 text-muted">REDDeploy &copy; 2025</p>
  </form>
</main>


    
  </body>
</html>
