<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=ed ge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Roboto:100,300,400" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">    
    <link rel="stylesheet" href="Assets/css/fontello.css">
    <link rel="stylesheet" href="Assets/css/estilos.css">      
    <title>PANCITO</title>
</head>
<body style="overflow-y:hidden">

    <div class="container-fluid"> 
        <div class="row">
            <!-- dashbord con bootstrap -->
            <div class="barra-lateral col-12 col-sm-auto" >
                <div class="logo">
                    <h2> PANCITO</h2>
                    <a href="#" class="btn-menu d-flex justify-content-center"><span>PAN</span></a>
                    <a href="#" id="btn-menu"><i class="icon-user"></i></a>
                </div>
                <div class="d-flex flex-column justify-content-center flex-wrap menu" id="menuizq">
                <ul class="nav flex-column col-12" style="padding-right: 0 !important">
                            <li><a href="recetas.php"><i class="icon-folder-open" ></i><span> Recetas</span>  </a></li>
                            <li><a href="Components/productos.php"><i class="icon-users" ></i><span> Productos</span>  </a></li>
                            <li><a href="Components/clientes.php"><i class="icon-users" ></i><span> Clientes</span>  </a></li>
                            <li><a href="Components/factura.php"><i class="icon-users" ></i><span> Factura</span>  </a></li>
                            
                            <li><a href="../logout.php"><i class="icon-logout"></i><span> Salir</span></a></li>
                    
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
                                        Panel de administracion -
                                    </div>
                                    <a href="#" class="p-2"><i class="icon-logout"></i><span> Salir</span></a> 
                                </div>                            
                                <div class=" titulo d-flex align-items-center " style="display: none">
                                    <p> RECETAS </p>
                                </div>
                            </div>

                            <div class="row ">
                                    <div class="col-11 col-lg-3  "></div>

                                    <div class="col-11 col-lg-4  ">
                                        <p class="letra">Materia prima </p>
                                        <a href="Components/materiaprima.php"><img src="Assets/img/factory.png" alt="" width="200" height="200"></a>
                                    </div>
                                    <div class="col-11 col-lg-5  ">
                                        <p class="letra">Recetas</p>
                                        <a href="Components/recetas.php"><img src="Assets/img/baker.png" alt="" width="200" height="200"></a>
                                    </div>
                                    <div class="col-11 col-lg-5  "></div>
                                    <div class="col-11 col-lg-4  ">
                                        <p class="letra">Ingredientes</p>
                                        <a href="Components/ingredientes.php"><img src="Assets/img/spatula.png" alt="" width="200" height="200"></a>
                                    </div>
                                    <!-- <div class="col-11 col-lg-5  ">
                                        <p class="letra">Proveedores</p>
                                        <a href="Components/recetas.php"><img src="Assets/img/supply.png" alt="" width="200" height="200"></a>
                                    </div> -->
                            </div>
                    </div>
                </div>
            </div>
            <!-- contenido -->
        </div>
		
    </div>
    <script src="Assets/js/jquery.min.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>    
    <script src="Assets/js/menu.js"></script>
	
</body>
</html>
