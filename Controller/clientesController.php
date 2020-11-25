<?php

require "../../Models/conexion.php";
 

class clienteController extends Connection 
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $estado;
    

    
    public function listarcliente(){
        
        $cone = Connection::get_conn();
        $statement = $cone->prepare("SELECT * FROM cliente");
        $statement->execute();		

        return $statement->fetchall(PDO::FETCH_NUM);
    }


    

    public function insertarcliente($ced, $nombre, $apellido, $nacimiento, $correo, $direccion, $ciudad, $telefono,$clipassword){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("INSERT INTO `cliente`(`CLIECEDULA`, `CLIENOMBRE`, `CLIEAPELLIDO`, `CLIENACIMIENTO`, `CLIECORREO`, `CLIEDIRECCION`, `CLIECIUDAD`, `CLIEPROVINCIA`, `CLIETELEFONO`, `CLIEESTADO`, `CLIECONTRA`) 
        VALUES ('$ced','$nombre', '$apellido','$nacimiento','$correo','$direccion','$ciudad','$ciudad','$telefono',1,'$clipassword')");
        
        //echo "INSERT INTO `cliente`(`CLIECEDULA`, `CLIENOMBRE`, `CLIEAPELLIDO`, `CLIENACIMIENTO`, `CLIECORREO`, `CLIEDIRECCION`, `CLIECIUDAD`, `CLIEPROVINCIA`, `CLIETELEFONO`, `CLIEESTADO`) 
        //VALUES ('$ced','$nombre', '$apellido','$nacimiento','$correo','$direccion','$ciudad','$ciudad','$telefono',1)";
        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }


    public function eliminarcliente($id){
        $cone = Connection::get_conn();
        $statement = $cone->prepare("DELETE FROM `cliente` WHERE `CLIECEDULA` = $id");

        if ($statement->execute()) {
            return 0;
        }else {
            return 1;
        }
    }

}
