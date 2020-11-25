<?php

require "../../Models/conexion.php";
 

class facturaController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    

    
    public function listarfactura(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM factura ORDER BY FACTNUM DESC");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }


    public function consultarclie(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT `CLIECEDULA`, `CLIENOMBRE`,`CLIEAPELLIDO` `CLIENOMBRE`FROM `cliente`");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function insertarfactura($cedula){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("INSERT INTO `factura`(`FACTNUM`, `CLIECEDULA`, `VNDCEDULA`, `FACTFECHA`, `FACTTOTAL`, `FACTESTADO`) 
                                    SELECT MAX(FACTNUM) + 1, '$cedula','1724482094', now(), 0, 1 FROM factura");
        
        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }


    public function getrecnombreporid($id){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT `CLIENOMBRE`,`CLIEAPELLIDO` `CLIENOMBRE`FROM `cliente` WHERE CLIECEDULA = '$id'");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        return $vec[0][0] .' '.$vec[0][1];

    }


    public function eliminarfactura($id){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("DELETE FROM `factura` WHERE `PRODID` = $id");

        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }

}
