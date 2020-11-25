<?php

require "../../Models/conexion.php";
 

class detalleController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    

    
    public function listardetalle($nfac){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM detalle WHERE FACTNUM = $nfac");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM); 
    }


    public function consultarprod(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT producto.PRODID, receta.RECNOMBRE, producto.PRODFECHA FROM producto, receta WHERE producto.RECID = receta.RECID ORDER BY PRODID DESC");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function insertardetalle($producto,  $cantidad, $nfact){
        $cone = Connection::get_conn();

        // PRECIO PRODUCTO
        $statement = $cone->prepare("SELECT receta.RECPRECIO FROM producto, receta WHERE producto.RECID = receta.RECID AND producto.PRODID = $producto");
        $statement->execute();
        $vec = $statement->fetchall(PDO::FETCH_NUM);		
        $precio = $vec[0][0];
        $precio2 = $precio * $cantidad;
        //echo $precio;
        //echo $precio2;

        $statement = $cone->prepare("INSERT INTO `detalle`(`DETID`, `PRODID`, `FACTNUM`, `DETCANTIDAD`, `DETPRECIOVENTA`) 
                                     SELECT MAX(DETID) + 1, $producto,$nfact,$cantidad,$precio2 FROM detalle");
        $statement->execute();
        // UPDATE TOTAL
        $statement = $cone->prepare("SELECT SUM(DETPRECIOVENTA) FROM detalle WHERE FACTNUM = $nfact");
        $statement->execute();
        $vec = $statement->fetchall(PDO::FETCH_NUM);

        $statement = $cone->prepare("UPDATE `factura` SET `FACTTOTAL`= ".$vec[0][0]." WHERE FACTNUM = '$nfact'");
        
        //echo "INSERT INTO `detalle`(`DETID`, `PRODID`, `FACTNUM`, `DETCANTIDAD`, `DETPRECIOVENTA`) SELECT MAX(DETID) + 1, $producto,$nfact,$cantidad,$precio2 FROM detalle" ;
        if ($statement->execute()) {
            
            
            return 0;
        }else {
            return 1;
        }
    }


    public function gettotal($nfac){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT SUM(DETPRECIOVENTA) FROM detalle WHERE FACTNUM = $nfac");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        return $vec[0][0];

    }

    public function getrecnombreporid($id){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT receta.RECNOMBRE FROM producto, receta WHERE producto.RECID = receta.RECID AND producto.PRODID = $id");
        //$statement = $cone->prepare("SELECT receta.RECNOMBRE FROM producto, receta WHERE producto.RECID = receta.RECID AND receta.RECID = $id");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        return $vec[0][0];

    }


    public function eliminardetalle($id){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("DELETE FROM `detalle` WHERE `RECID` = $id");

        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }

}
