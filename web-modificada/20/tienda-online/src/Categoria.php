<?php

namespace Kawschool;

class Categoria{

    private $config;
    private $cn = null;

    public function __construct(){

        //crear conexion
        $this->cn = mysqli_connect("basedatos:3306", "root", "emilio","tienda_online");


        //verificar conexion
        if(!$this->cn){
            die("Connection failed: " . mysqli_connect_error());
        }

    }

    public function mostrar(){
        $sql = "SELECT * FROM categorias";
        
        
        if($resultado = $this->cn->query($sql))
        return $resultado->fetch_all(MYSQLI_ASSOC);

        return false;
    
    }



}