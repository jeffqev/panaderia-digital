<?php

require "../../Models/conexion.php";
 

class ingredientesController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    
    public function listaringredientes(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM ingredientes");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function consultarmt(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT MPID,MPDECIPCION FROM materiaprima");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function consultarrec(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT RECID,RECNOMBRE FROM receta");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function insertaringredientes($mpid,$recid,$cantidad,$costo){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("INSERT INTO `ingredientes`(`INGID`, `MPID`, `RECID`, `INGCANTIDAD`, `INGCOSTO`, `INGESTADO`) 
                                     SELECT MAX(INGID) + 1,$mpid,$recid,$cantidad,$costo,1 FROM ingredientes");
        
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

    public function getmtnombreporid($id){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT MPDECIPCION FROM materiaprima WHERE MPID = $id");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        return $vec[0][0];

    }

    

    public function eliminaringredientes($id){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("DELETE FROM `ingredientes` WHERE `INGID` = $id");

        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }

}
