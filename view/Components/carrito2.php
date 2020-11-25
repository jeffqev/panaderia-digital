<?php
require '../../Controller/productoController.php';


$productoController = new productoController();




    
?> 

<!DOCTYPE html>

<html>
    <head>
        <title>Carrito de compras</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/materia/bootstrap.min.css">
        <link href="../Assets/css/simple_cart.css" rel="stylesheet">
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
body {}
h1 { margin: 150px auto 30px auto; }
    </style>
    </head>
    <body>
      
    
        <h1 class="page-heading">Catalogo de productos</h1>
        <!-- Menu -->
        <div class="menu">
            <div class="container">
                <div class="row">
                    <!-- Menu and categories -->
                    <div class="col-md-9 search-grid">
                        <div class="product-container">
                            <!-- Menu List of items -->
                            <div class="menu-list">
                                <div class="panel panel-default" id="content1">
                                    <div class="panel-heading">Productos</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            
                                        <?php
                                        $vec = $productoController->consultarparacarrito();
                                            for ($i=0; $i < count($vec) ; $i++) {           
                                                ?>                    
                                                
                                           
                                            <div class="col-md-6">
                                                <div class="menu-item-container"><div class="item-name"><?php echo $vec[$i][1];?></div><div><i class="veg-icon"></i></div>
                                                    <div class="item-price-container">
                                                        <div class="item-price">
                                                            <i class="fa fa-dollar"></i><?php echo $vec[$i][0];?>
                                                        </div>
                                                        <div class="spacer"></div>
                                                        <div class="add-button">
                                                            <button class="btn btn-primary sc-add-to-cart" data-name="<?php echo $vec[$i][1];?>" data-price="<?php echo $vec[$i][0];?>" type="submit">ADD</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <?php } ?>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //Menu List of items -->
                        </div>
                    </div>
                    <!-- //Menu and categories -->
                    <!-- Cart Grid -->
                    <form action="generarpedido.php" method="get"></form>
                    <div class="col-md-3">
                        
                            <div id="cart"></div>
                        
                        
                    </div>
                    
                    <!-- //Cart Grid -->
                </div>
            </div>
        </div>
        <!-- //Menu-->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="../Assets/js/jQuery.SimpleCart.js" ></script>
        <script>
            $(document).ready(function () {
                $('#cart').simpleCart();
            });
        </script>
    </body>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  


</script>
</html>
