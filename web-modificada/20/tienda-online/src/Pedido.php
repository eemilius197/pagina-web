<?php

namespace Kawschool;

class Pedido{

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
        $sql = "INSERT INTO `pedidos`(`cliente_id`, `total`, `fecha`) 
        VALUES (\"".$_params['cliente_id']."\",\"".$_params['total']."\",\"".$_params['fecha']."\")";

        if($resultado = $this->cn->query($sql))
            return $this->cn->insert_id;


        return false;
    }

    public function registrarDetalle($_params){
        $sql = "INSERT INTO `detalle_pedidos`(`pedido_id`, `pelicula_id`, `precio`, `cantidad`) 
        VALUES (\"".$_params['pedido_id']."\",\"".$_params['pelicula_id']."\",\"".$_params['precio']."\",\"".$_params['cantidad']."\")";

        if($resultado = $this->cn->query($sql))
            return $this->cn->insert_id;

        return false;
    }

    public function mostrar()
    {
        $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.cliente_id = c.id ORDER BY p.id DESC";  

        if($resultado = $this->cn->query($sql))
            return  $resultado->fetch_all(MYSQLI_ASSOC);

        return false;

    }
    public function mostrarUltimos()
    {
        $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.cliente_id = c.id ORDER BY p.id DESC LIMIT 10";

        if($resultado = $this->cn->query($sql))
            return  $resultado->fetch_all(MYSQLI_ASSOC);

        return false;

    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.cliente_id = c.id WHERE p.id = $id";

        if($resultado = $this->cn->query($sql))
            return $resultado->fetch_array();

        return false;

    }

    

    public function mostrarDetallePorIdPedido($id)
    {
        $sql = "SELECT 
                dp.id,
                pe.titulo,
                dp.precio,
                dp.cantidad,
                pe.foto
                FROM detalle_pedidos dp
                INNER JOIN peliculas pe ON pe.id= dp.pelicula_id
                WHERE dp.pedido_id = $id";

        if($resultado = $this->cn->query($sql))
            return  $resultado->fetch_all(MYSQLI_ASSOC);

        return false;

    }



}