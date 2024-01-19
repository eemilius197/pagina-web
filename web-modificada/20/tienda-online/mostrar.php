<?php

$conn = mysqli_connect("basedatos:3306", "root", "emilio","tienda_online");

//$conn = mysqli_connect("basedatos:3306", "root", "emilio","usuarios");

if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}
echo "Conexion exitosa";
        


$id=12;

//$ssql = "SELECT username, nombre, correo, contra from clientes";

$sql = "SELECT * FROM `peliculas` WHERE `id`= $id ";

$result = $conn->query($sql);

?>

<table>
    <tr>
        <th>precio</th>
        <th>titulo</th>
        <th>descripcion</th>
        <th>foto</th>
    <tr>
    <?php
    while ($row = $result->fetch_array()){
        print '<tr><td>' . $row['precio'] . '</td>';
        print '<td>' . $row['titulo'] . '</td>';
        print '<td>' . $row['descripcion'] . '</td>';
        print '<td>' . $row['foto'] . '</td></tr>';
    }
    $result->free_result();
    $conn->close();
    ?>