

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/png" href="view/Assets/img/grafitext_logo_head1.jpg"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/Assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">    <link rel="stylesheet" href="view/Assets/css/fontello.css" >
    <link rel="stylesheet" href="view/Assets/css/style.css" >
    <link rel="stylesheet" href="view/Assets/css/floating-labels.css" >

    <title>Document</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
   
</head>
<body >
  
<form class="form-signin" method="POST" action="Controller/Verificarlogin.php">
  <div class="text-center ">
    <img class="mb-4" src="view/Assets/img/images.png" alt="" width="200" height="200">
    <h3>Sistema de cuentas de usuario</h3>

</div>

  <div class="form-label-group">
    <input type="text" id="inputEmail" class="form-control" name="user" placeholder="Usuario" required autofocus>
    <label for="inputEmail">Usuario</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" name="contra" class="form-control" placeholder="Contraseña" required>
    <label for="inputPassword">Contraseña</label>
  </div>
      <!-- <a href="administrador.php" class="btn btn-lg btn-outline-dark btn-block">Entrar</a> -->
  <button class="btn btn-lg btn-outline-dark btn-block" type="submit">Entrar</button>
  <p class="mt-1" >No tienes cuenta? <a href="view/Components/registrarse.php">Registrate</a></p>
</form>



<script src="view/Assets/js/jquery.min.js"></script>
<script src="view/Assets/js/bootstrap.min.js"></script>

</body>
</html>