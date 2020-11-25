<?php
require '../../Controller/recetaController.php';
$recetaController = new recetaController();

if (isset($_POST['renombre'])) {
    
    echo"<script>alert('".$recetaController->insertarReceta( $_POST['renombre'], $_POST['recosto'], $_POST['reprecio'])."')</script>";
}



?>  


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=ed ge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Roboto:100,300,400" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">    
    <link rel="stylesheet" href="../Assets/css/fontello.css">
    <link rel="stylesheet" href="../Assets/css/estilos.css">      
    <title>Pancito</title>
</head>
<body style="overflow-y:hidden">
    <div class="container-fluid"> 
        <div class="row">
            <!-- dashbord con bootstrap -->
            <div class="barra-lateral col-12 col-sm-auto" >
                <div class="logo">
                    <h2> PANCITO</h2>
                    <a href="#" class="btn-menu d-flex justify-content-center"><span>GM</span></a>
                    <a href="#" id="btn-menu"><i class="icon-th-list"></i></a>
                </div>
                <div class="d-flex flex-column justify-content-center flex-wrap menu" id="menuizq">
                <ul class="nav flex-column col-12" style="padding-right: 0 !important">
                            <li><a href="../recetas.php"><i class="icon-folder-open" ></i><span> Recetas</span>  </a></li>
                            <li><a href="productos.php"><i class="icon-users" ></i><span> Productos</span>  </a></li>
                            <li><a href="clientes.php"><i class="icon-users" ></i><span> Clientes</span>  </a></li>
                            <li><a href="carrito.php"><i class="icon-users" ></i><span> Carrito</span>  </a></li>
                            <li><a href="factura.php"><i class="icon-users" ></i><span> Factura</span>  </a></li>
                            <li><a href="../../logout.php"><i class="icon-logout"></i><span> Salir</span></a></li>
                    
                        </ul>
                    </div>
            </div>
            <a href="#" class="d-sm-none fondo-enlace  " id="fondo-enlace"></a>
            <!-- dashbord con bootstrap -->

            <!-- contenido -->
            <div class="main col">                
                <div class="container-fluid">
                    <div class="row contenido">
                        <div style="width: 100%">
                            <!-- header contenido -->
                            <div class="col-12 " >
                                <div class="d-flex justify-content-between align-items-center navegacion">
                                    <div class="p-2">
                                        panel de administracion
                                    </div>
                                    <a href="../../logout.php" class="p-2"><i class="icon-logout"></i><span> Salir</span></a> 
                                </div>                            
                                <div class=" titulo d-flex align-items-center " style="display: none">
                                    <p> Recetas </p>
                                </div>
                            </div>
                            <!-- header contenido -->
                            <div class="row ml-3">
                                <div class="col-11 col-lg-5 ingresos ">
                                    <p>Ingreso de Recetas</p>
                                    <form action="" method="POST" name="formusuarios" class="form-group" >
                                        
                                        <input class="form-control mb-3" require type="text" placeholder="Receta Nombre" name="renombre" >
                                        <input class="form-control mb-3" require type="hidden"   value="0" placeholder="Receta Costo" name="recosto" >
                                        <input class="form-control mb-3" require type="text" placeholder="Receta Precio" name="reprecio" >
                                        <button class="btn btn-outline-secondary form-control mb-3" type="submit" >Aceptar </button>
                                    </form>
                                </div>
                                <!-- Primer cuadro 5 columnas -->
                                <!-- Segundo cuadro 6 columnas -->
                                <div class="col-11 col-lg-6 ver ">
                                    <p>Recetas Existentes</p>
                                    <div class="tabla">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $vec = $recetaController->listarReceta();
                                                
                                                for ($i=0; $i < count($vec) ; $i++) {                               
                                                    echo "<tr><td>".$vec[$i][0]."</td>";
                                                    echo "<td>".$vec[$i][1]."</td>";
                                                    echo "<td>". $vec[$i][3]."</td>";   
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                                
                            
                        </div>
                        <!-- Segundo cuadro 6 columnas -->
                    </div>
                </div>
            </div>
            <!-- contenido -->
        </div>
		
    </div>
    <script src="../Assets/js/jquery.min.js"></script>
    <script src="../Assets/js/bootstrap.min.js"></script>    
    <script src="../Assets/js/menu.js"></script>
	
</body>
</html>
