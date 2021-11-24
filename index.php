<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Medical</title>

    <link rel="icon" type="image/png" href="css/assets/brand/dental.png" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    

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
  <form action="prcd/acceso.php" method="POST">
    <img class="mb-4" src="css/assets/brand/dental.png" alt="" width="81" height="81">
    <h1 class="h3 mb-3 fw-normal">DENTAL | Acceso</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>

    <div class="checkbox mb-3">
      <!-- <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label> -->
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit"><i class="bi bi-person-circle"></i> Sign in</button>
    <p class="mt-5 mb-3 text-muted">REDDeploy &copy; 2021</p>
  </form>
</main>


    
  </body>
</html>
