<?php

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    $nombre_usuario = $_POST['nombre_usuario'];
    $clave = $_POST['clave'];
    require '../vendor/autoload.php';
    $usuario = new Kawschool\Usuario;
    $resultado = $usuario->login($nombre_usuario, $clave);


    if($resultado){

        session_start();

        $_SESSION['usuario_info'] = array(
            'nombre_usuario'=>$resultado['nombre_usuario'],
        );



        header('Location: dashboard.php');
    
    }else{
        header('Location: index.php');
    }

}
