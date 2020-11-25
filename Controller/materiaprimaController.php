<?php

require "../../Models/conexion.php";
 

class materiaprimaController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    
    public function listarmateriaprima(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM materiaprima");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function insertarmateriaprima($id, $medid, $proveedor, $descipcion, $costo, $cantidad){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("INSERT INTO `materiaprima`(`MPID`, `MEDID`, `PROVRUC`, `MPDECIPCION`, `MPCOSTO`, `MPCANTIDAD`, `MPESTADO`)
                                     VALUES ($id,$medid,'$proveedor','$descipcion',$costo,$cantidad,1)");

        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }

    public function eliminarmateriaprima($id){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("DELETE FROM `materiaprima` WHERE `MPID` = $id");

        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }

}
