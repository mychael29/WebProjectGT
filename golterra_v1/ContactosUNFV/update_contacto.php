<?php
require("conexion.php");

if(isset($_POST['_id'],$_POST['nombre'],$_POST['alias'],$_POST['telefono'])) {
    $id = $_POST['_id'];
    $nombre = $_POST['nombre'];
    $alias = $_POST['alias'];
    $telefono = $_POST['telefono'];
    
    //update
    $query = "update contacto set nombre=?,alias=?,telefono=? Where _id=?";
    $inserted = $conexion->prepare($query);
    
    $inserted->bindParam(1, $nombre, PDO::PARAM_STR); 
    $inserted->bindParam(2, $alias, PDO::PARAM_STR); 
    $inserted->bindParam(3, $telefono, PDO::PARAM_STR);
    $inserted->bindParam(4, $id, PDO::PARAM_STR);

    echo "Registrado"; 
}
?>