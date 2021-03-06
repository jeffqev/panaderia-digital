<?php
require '../../Controller/productoController.php';


$productoController = new productoController();

?><html>

<head>
  <title>Carrito de compra</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
  .badge-notify{
    background:red;
    position:relative;
    top: -20px;
    right: 10px;
  }
  .my-cart-icon-affix {
    position: fixed;
    z-index: 999;
  }
  </style>
</head>

<body class="container">
  <form id="formulario" method="POST" action="generarpedido.php">
    
  </form>
  <div class="page-header">
    <h1>Productos
      <div style="float: right; cursor: pointer;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
      </div>
    </h1>
  </div>

  
  
  <div class="row">
    <?php
    $vec = $productoController->consultarparacarrito();
        for ($i=0; $i < count($vec) ; $i++) {           
    ?> 
    <div class="col-md-3 text-center">
      <img src="images/pngwave.png" width="150px" height="150px">
      <br>
      <?php echo $vec[$i][1];?> - <strong>$<?php echo $vec[$i][0];?></strong>
      <br>
      <button class="btn btn-danger my-cart-btn" data-id="<?php echo $vec[$i][2];?>" data-name="<?php echo $vec[$i][1];?>" data-summary="summary <?php echo $i + 1;?>" data-price="<?php echo $vec[$i][0];?>" data-quantity="1" data-image="images/img_1.png">Añadir al carrito</button>
    </div>
    <?php } ?>
    
  </div>


  <script src="js/jquery-2.2.3.min.js"></script>
  <script type='text/javascript' src="js/bootstrap.min.js"></script>
  <script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }
    

    

    $('.my-cart-btn').myCart({
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: [],
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      afterAddOnCart: function(products, totalPrice, totalQuantity) {
        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
      },
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
      },
      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString += "\n\n id \t name \t summary \t price \t quantity";
        $.each(products, function(){
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity);
          $('#formulario').append('<input type="text" name="'+ this.id +'" value="'+ this.quantity +'">');
        });
        //alert(checkoutString)
        console.log( products, totalPrice, totalQuantity);
        $('#formulario').submit();
      },
      getDiscountPrice: function(products, totalPrice, totalQuantity) {
        console.log("calculating discount", products, totalPrice, totalQuantity);
        return totalPrice * 0.5;
      }
    });

    $("#addNewProduct").click(function(event) {
      var currentElementNo = $(".row").children().length + 1;
      $(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>')
    });
  });
  </script>

</body>

</html>
