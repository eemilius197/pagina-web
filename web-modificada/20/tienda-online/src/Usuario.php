<?php

namespace Kawschool;

class Usuario{

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

    public function login($nombre, $clave){
        
        $sql = "SELECT nombre_usuario FROM `usuarios` WHERE nombre_usuario = \"$nombre\" AND clave = \"$clave\" ";
        
        if($resultado = $this->cn->query($sql));       
            return $resultado->fetch_array();

        return false;
    }





















}