<?php
class Connection {

    public function get_conn(){

        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "pancitopruebas";

        //$connection = new PDO ("mysql:host=$host;dbname=pancitopruebas;",$user,$pass);
        
        //Db1
        $user = "root";
        $pass = "secret"; 
       
        try {
            $connection = new PDO ("mysql:host=192.168.99.100;port=33060;dbname=pancitodadadaasdasdsadaddasdb1;",$user,$pass);
            return $connection;

        } catch (Exception $e) {
            
            $connection = new PDO ("mysql:host=192.168.99.100;port=33061;dbname=pancitodb2;",$user,$pass);
            return $connection;


        }

    }


}
// echo "en el modelo";
// $m = new Connection();
// $con = $m->get_conn();

// var_dump($con);


