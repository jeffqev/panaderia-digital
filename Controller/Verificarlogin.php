<?php

include_once '../Models/conexion.php';
session_start();


$m = new Connection();
$con = $m->get_conn();

if ($con) {


  $user = $_POST['user'];
  $contra = $_POST['contra'];

  if ($user == 'admin' && $contra =='admin') {
    header('location: ../view/Components/recetas.php');
  }

 // echo "SELECT VNDCEDULA FROM cajero WHERE VNDUSUARIO = '$user' and VNDCONTRA = '$contra'";
  $statement = $con->prepare("SELECT CLIECEDULA FROM cliente WHERE CLIECEDULA = '$user' and CLIECONTRA = '$contra'");
  $statement->execute();
  $vec = $statement->fetch();
  
  if ($vec == false) {
      echo "contraseña incorrecta";

  }else{
    $_SESSION['VNDCEDULA'] = $user;
    header('location: ../view/Components/carrito.php');
  }

  
  


}


?>