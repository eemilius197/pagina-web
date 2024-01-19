<?php

namespace Kawschool;

class Pelicula{

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
        $sql = "INSERT INTO `peliculas`(`titulo`, `descripcion`, `foto`, `precio`, `categoria_id`, `fecha`) 
        VALUES (\"".$_params['titulo']."\",\"".$_params['descripcion']."\",\"".$_params['foto']."\",\"".$_params['precio']."\",\"".$_params['categoria_id']."\",\"".$_params['fecha']."\")";

        

        if($resultado = $this->cn->query($sql))
            return true;

        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `peliculas` SET `titulo`=\"".$_params['titulo']."\",`descripcion`=\"".$_params['descripcion']."\",`foto`=\"".$_params['foto']."\",`precio`=\"".$_params['precio']."\",`categoria_id`=\"".$_params['categoria_id']."\",`fecha`=\"".$_params['fecha']."\"  WHERE `id`= ".$_params['id']."";

        if($resultado = $this->cn->query($sql))
            return true;

        return false;
        
    }

    public function eliminar($id){
        $sql = "DELETE FROM `peliculas` WHERE `id`= $id ";

        if($resultado = $this->cn->query($sql))
            return true;

        return false;
        
    }

    public function mostrar(){
        $sql = "SELECT peliculas.id, titulo, descripcion,foto,nombre,precio,fecha,estado FROM peliculas 
        
        INNER JOIN categorias
        ON peliculas.categoria_id = categorias.id ORDER BY peliculas.id DESC
        ";
        
        if($resultado = $this->cn->query($sql))
            return $resultado->fetch_all(MYSQLI_ASSOC);

        return false;
    }

    public function mostrarPorId($id){
        //session_destroy();
        
        $sql = "SELECT * FROM `peliculas` WHERE `id`= $id ";
        
        if($resultado = $this->cn->query($sql)){
            return $resultado->fetch_array();
        }
            

        return false;
    }





    
}



