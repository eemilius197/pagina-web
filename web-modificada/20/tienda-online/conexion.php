<?php

//crear conexion
$conn = mysqli_connect("basedatos:3306", "root", "emilio","usuarios");

//verificar conexion
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
echo "Conexion exitosa";
?>
