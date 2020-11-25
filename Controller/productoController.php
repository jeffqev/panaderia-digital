<?php

require "../../Models/conexion.php"; 
 

class productoController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    

    
    public function listarproducto(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM producto");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }


    public function consultarrec(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT RECID,RECNOMBRE FROM receta");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }


    // CARRITO
    public function consultarparacarrito(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT RECPRECIO,RECNOMBRE,RECID FROM receta");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function consultarfacturas(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT RECPRECIO,RECNOMBRE,RECID FROM receta");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    //FACTURA
    
    public function insertarfactura($cedula){
        $cone = Connection::get_conn();
        
        $statement = $cone->prepare("SELECT MAX(FACTNUM) + 1 FROM factura");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        $nfact = $vec[0][0];

        $statement = $cone->prepare("INSERT INTO `factura`(`FACTNUM`, `CLIECEDULA`, `VNDCEDULA`, `FACTFECHA`, `FACTTOTAL`, `FACTESTADO`) VALUES(
                                    $nfact,  '$cedula','000000',NOW(),0,1)");

        if ($statement->execute()) {
            
            //Detalle
            
            return 0;

        }else {
            return 1;
        }
    }

    public function insertardetalle($proid,$cantidad,$precio){
        $cone = Connection::get_conn();
        
        $statement = $cone->prepare("SELECT MAX(FACTNUM) FROM factura");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        $nfact = $vec[0][0];
        

        $statement = $cone->prepare("INSERT INTO `detalle`(`DETID`, `PRODID`, `FACTNUM`, `DETCANTIDAD`, `DETPRECIOVENTA`) 
                                        SELECT MAX(DETID) + 1 , $proid ,$nfact, $cantidad, $precio from detalle");

        if ($statement->execute()) {
            
            //UPDATE TOTAL
            $statement = $cone->prepare("SELECT SUM(DETPRECIOVENTA) FROM detalle WHERE FACTNUM = $nfact");
            $statement->execute();
            $vec = $statement->fetchall(PDO::FETCH_NUM);

            $statement = $cone->prepare("UPDATE `factura` SET `FACTTOTAL`= ".$vec[0][0]." WHERE FACTNUM = '$nfact'");
            $statement->execute();
            return 0;

        }else {
            return 1;
        }
    }



    public function insertarproducto($recid,$cantidad){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("INSERT INTO `producto`(`PRODID`, `RECID`, `PRODFECHA`, `PRODCANTIDAD`, `PRODESTADO`) 
                                     SELECT MAX(PRODID) + 1, $recid,now(),$cantidad,1 FROM producto");
        
        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }


    public function getrecnombreporid($id){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT RECNOMBRE FROM receta WHERE RECID = $id");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        return $vec[0][0];

    }


    public function eliminarproducto($id){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("DELETE FROM `producto` WHERE `PRODID` = $id");

        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }

}
