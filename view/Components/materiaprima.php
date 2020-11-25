<?php
require '../../Controller/materiaprimaController.php';
require '../../Controller/proveedorController.php';
require '../../Controller/medidaController.php';

$materiaprimaController = new materiaprimaController();
$proveedoresController = new proveedoresController();
$medidaController = new medidaController();

if (isset($_POST['mtid'])) {
    
    $error = $materiaprimaController->insertarmateriaprima($_POST['mtid'],$_POST['mtmedida'],$_POST['mtproveedor'],$_POST['mtdescripcion'],$_POST['mtcosto'],$_POST['mtcantidad']);
}



?>  

<?php if (isset($_GET['eliminar'])): ?>
<?php 

$error = $materiaprimaController->eliminarmateriaprima($_GET['eliminar']);

?>
<?php endif; ?>

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
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.6/dist/sweetalert2.min.css">

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
                            <li><a href="usuarios.php"><i class="icon-users" ></i><span> Usuarios</span>  </a></li>
                            <li><a href="../facturas.php"><i class="icon-users" ></i><span> Factura</span>  </a></li>
                            
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
                                    <p> Materia prima </p>
                                </div>
                            </div>

                            <!-- header contenido -->
                            <div class="row ml-3">
                                <div class="col-11 col-lg-4 ingresos" style="font-family: 'Roboto',sans-serif; font-weight: 300; color: #999C9E;">
                                    <p>Ingreso de Materia Prima</p>
                                    <form action="materiaprima.php" method="POST" name="formusuarios" class="form-group" >
                                        <input class="form-control mb-3" require type="text" placeholder="Materiaprima ID" name="mtid" >
                                        
                                        <label for="">Medida</label><br>
                                        <select name="mtmedida" class="form-control mb-3" name="" id="medida">
                                                <?php
                                                $vec = $medidaController->consultarmedida();
                                                
                                                for ($i=0; $i < count($vec) ; $i++) {                               
                                                    echo '<option value="'.$vec[$i][0].'">'.$vec[$i][1].'</option>';
                                                   
                                                }
                                                ?>
                                        </select>
                                        
                                        <label for="">Proveedores</label><br>
                                        <select class="form-control mb-3" name="mtproveedor" id="proveedor">
                                                <?php
                                                $vec = $proveedoresController->consultarProveedores();
                                                
                                                for ($i=0; $i < count($vec) ; $i++) {                               
                                                    echo '<option value="'.$vec[$i][0].'">'.$vec[$i][1].'</option>';
                                                   
                                                }
                                                ?>
                                        </select>
                                        
                                        <input class="form-control mt-3 mb-3" require type="text" placeholder="Descripcion Materia prima" name="mtdescripcion" >
                                        <input class="form-control mb-3" require type="text" placeholder="Costo Materia prima " name="mtcosto" >
                                        <input class="form-control mb-3" require type="number" placeholder="Cantidad Materia prima " name="mtcantidad" >
                                        <button class="btn btn-outline-secondary form-control mb-3" type="submit" >Aceptar </button>
                                    </form>
                                </div>
                                <!-- Primer cuadro 5 columnas -->
                                <!-- Segundo cuadro 6 columnas -->
                                <div class="col-11 col-lg-7 ver ">
                                    <p>Materia primas Existente</p>
                                    <div class="tabla">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Medida</th>
                                                <th scope="col">Proveedor</th>
                                                <th scope="col">Descripcion</th>
                                                <th scope="col">Costo</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $vec = $materiaprimaController->listarmateriaprima();
                                                
                                                for ($i=0; $i < count($vec) ; $i++) {                               
                                                    echo "<tr><td>".$vec[$i][0]."</td>";
                                                    echo "<td>".$vec[$i][1]."</td>";
                                                    echo "<td>".$vec[$i][2]."</td>";
                                                    echo "<td>". $vec[$i][3]."</td>";   
                                                    echo "<td>".$vec[$i][4]."</td>";
                                                    echo "<td>".$vec[$i][5]."</td>";
                                                    echo "<td>". $vec[$i][6]."</td>"; 

                                                    //echo '<td> <a href="../../Controller/ediciones/materiaprimaEdit.php?editar='.$vec[$i][0].'&medida='.$vec[$i][1].'" class="btn btn-outline-info">Editar</a>  </td>';  
                                                    echo '<td> <a href="materiaprima.php?eliminar='.$vec[$i][0].'" class="btn btn-outline-danger">Eliminar</a>  </td>';  
 
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script>
    $(document).ready(function() {
        $('#proveedor').select2();
    });
    $(document).ready(function() {
        $('#medida').select2();
    });
    </script>

    <script>
     <?php if ($error == 1): ?>
     Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Error al ingresar!',
        })
    <?php endif; ?>
    </script>
</body>
</html>
