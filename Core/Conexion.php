<?php
require_once "./Core/configAPP.php";

class Conexion{
    public function Conectar(){
        $base= new PDO(SGBD, USER, PASS);
        return $base;
    }   
}

