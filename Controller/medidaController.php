<?php

 

class medidaController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    
    public function listarmedida(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM medida");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function consultarmedida(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT MEDID,MEDTIPO FROM medida");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function insertarmedida($id, $nombre, $costo, $precio){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("INSERT INTO `medida`(`MPID`, `MEDID`, `PROVRUC`, `MPDECIPCION`, `MPCOSTO`, `MPCANTIDAD`, `MPESTADO`)
                                     VALUES ()");

        if ($statement->execute()) {
            return "Ingresado con exito";
        }else {
            return "No se pudo ingresar";
        }
    }

}
