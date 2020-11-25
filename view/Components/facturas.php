<?php

require '../../Controller/productoController.php';
session_start();
$productoController = new productoController();
        
$vec = $productoController->consultarparacarrito();
$totalapagar = 0;

$fechaActual = date('d-m-Y');

$error1 = $productoController->insertarfactura($_SESSION['VNDCEDULA']);



    

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

        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['VNDCEDULA']; ?></a>
        <a class="nav-link btn btn-outline-light" href="../../index.php" tabindex="-1" aria-disabled="true">cerrar </a>

    </form>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-4"><h1>Factura</h1></div>
            <div class="col-md-4 mt-3"><h4><?php echo $_SESSION['VNDCEDULA']; ?></h4></div>
            <div class="col-md-4 mt-3"><h4><?php echo $fechaActual; ?></h4></div>
        </div>
        <div class="card" style="width: ;">
        <div class="card-header">
            Detalle
        </div>
        <ul class="list-group list-group-flush">
        <?php
        for ($i=0; $i < count($vec) ; $i++) {


            if (isset($_POST[$vec[$i][2]])) {
        
                $id = $vec[$i][2];
                $nombre = $vec[$i][1];
                $cantidad = $_POST[$vec[$i][2]];
                $preciouni = $vec[$i][0];
                $total = $preciouni * $cantidad;
                $totalapagar = $totalapagar + $total;
        
            
            
        ?>
        
            <li class="list-group-item">
                <div class="row">

                <div class="col-md-3"> <?php echo $nombre; ?> </div>
                <div class="col-md-3">Cantidad: <?php echo $cantidad; ?> </div>
                <div class="col-md-3">Precio: $<?php echo $preciouni; ?> </div>
                <div class="col-md-3">Total: $<?php echo $total; ?> </div>
                </div>
            </li>

            

        <?php
            if (!$error1) {
                $error1 = $productoController->insertardetalle($id,$cantidad,$total);
            }
        }}?>
        </ul>
        
        </div>
        <div class="card-footer text-muted">
            Total a pagar: $<?php echo $totalapagar; ?> 
        </div>
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