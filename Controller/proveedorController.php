<?php

 

class proveedoresController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    
    public function listarProveedores(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM proveedores");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function consultarProveedores(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT PROVRUC,PROVNOMBRE FROM proveedores");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function insertarProveedores($id, $nombre, $costo, $precio){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("INSERT INTO `proveedores`(`MPID`, `MEDID`, `PROVRUC`, `MPDECIPCION`, `MPCOSTO`, `MPCANTIDAD`, `MPESTADO`)
                                     VALUES ()");

        if ($statement->execute()) {
            return "Ingresado con exito";
        }else {
            return "No se pudo ingresar";
        }
    }

}
