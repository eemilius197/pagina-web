<?php

namespace Kawschool;

class Cliente{

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

    public function registrar($_params){
        print_r($_params);
        try {
        
        $sql = "INSERT INTO `clientes`(`nombre`, `apellidos`, `email`, `telefono`, `comentario`) 
        VALUES (\"".$_params['nombre']."\",\"".$_params['apellidos']."\",\"".$_params['email']."\",\"".$_params['telefono']."\",\"".$_params['comentario']."\")";

        if($resultado = $this->cn->query($sql))
            return $this->cn->insert_id;

        }  catch (mysqli_sql_exception $e) { 
            var_dump($e);
            exit; 
        } 
        return false;
        
    }
        

}