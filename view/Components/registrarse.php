<?php




require '../../Controller/clientesController.php';


$clienteController = new clienteController();


if (isset($_POST['clicedula'])) {
    
    $error = $clienteController->insertarcliente($_POST['clicedula'],$_POST['clinombre'],$_POST['cliapellido'],$_POST['clinacimiento'],$_POST['clicorreo'],$_POST['clidireccion'],$_POST['cliciudad'],$_POST['clitelefono'],$_POST['clipassword']);

    if (!$error) {
        header('location: ../../index.php');
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
<a class="navbar-brand" href="#">Pancito</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="carrito.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">

        
        <a class="nav-link btn btn-outline-light" href="../../index.php" tabindex="-1" aria-disabled="true">Iniciar </a>

    </form>
  </div>
    
</nav>

<div class="container mt-3">
    <div class="row">
    <div class="col-11 col-lg-11 ingresos" style="font-family: 'Roboto',sans-serif; font-weight: 300; color: #999C9E;">
                            <p>Datos personales</p>
                            <form action="registrarse.php" method="POST" name="formusuarios" class="form-group" >
                                
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputEmail4">Cedula</label>
                                    <input type="text" class="form-control" name="clicedula" placeholder="Cedula">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Nombre</label>
                                    <input type="text" class="form-control" name="clinombre" placeholder="Nombre">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Apellido</label>
                                    <input type="text" class="form-control" name="cliapellido" placeholder="Apellido">
                                    </div>
                                </div>
                                <p>Datos de contacto</p>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputEmail4">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="clinacimiento" placeholder="Fecha de nacimiento">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Correo</label>
                                    <input type="text" class="form-control" name="clicorreo" placeholder="Correo">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Telefono</label>
                                    <input type="text" class="form-control" name="clitelefono" placeholder="Telefono">
                                    </div>
                                </div>
                                <p>Datos de ubicacion</p>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputEmail4">Direccion</label>
                                    <input type="text" class="form-control" name="clidireccion" placeholder="Direccion">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Ciudad</label>
                                    <select id="inputState" name="cliciudad" id="ciudad" class="form-control">
                                        <option>Quito</option>
                                        <option>Guayaquil</option>
                                        <option>Cuenca</option>
                                        <option>Machala</option>
                                        <option>Santo Domingo de los Colorados</option>
                                        <option>Portoviejo</option>
                                        <option>Ambato</option>
                                        <option>Manta</option>
                                        <option>Eloy Alfaro</option>
                                        <option>Ibarra</option>
                                        <option>Quevedo</option>
                                        <option>Milagro</option>
                                        <option>Loja</option>
                                        <option>Riobamba</option>
                                        <option>Esmeraldas</option>
                                    </select>
                                    </div>  
                                    <div class="form-group col-md-4">
                                    <label for="inputEmail4">Contraseña</label>
                                    <input type="password" class="form-control" name="clipassword" placeholder="Contraseña">
                                    </div>                                          
                                </div>
                                <button class="btn btn-outline-secondary form-control mb-3" type="submit" >Aceptar </button>
                            </form>
                        </div>
    </div>
</div>

  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

<?php

?>