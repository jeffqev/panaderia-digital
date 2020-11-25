<?php

require "../../Models/conexion.php";
 

class recetaController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    
    public function listarReceta(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT RECID, RECNOMBRE, RECCOSTO, RECPRECIO FROM receta");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }

    public function insertarReceta($nombre, $costo, $precio){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT MAX(RECID) + 1 FROM receta");
        $statement->execute();		

        $vec = $statement->fetchall(PDO::FETCH_NUM);
        $id = $vec[0][0];

        
        $statement = $cone->prepare("INSERT INTO `receta`(`RECID`, `RECNOMBRE`, `RECCOSTO`, `RECESTADO`, `RECPRECIO`) VALUES ($id,'$nombre',$costo,1,$precio)        ");
        if ($statement->execute()) {
            return "Ingresado con exito";
        }else {
            return "No se pudo ingresar";
        }
    }

}
