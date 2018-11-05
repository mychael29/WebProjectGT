<?php
require("conexion.php");

if(isset($_POST['_id'],$_POST['nombre'],$_POST['alias'],$_POST['telefono'])) {
    $id = $_POST['_id'];
    $nombre = $_POST['nombre'];
    $alias = $_POST['alias'];
    $telefono = $_POST['telefono'];
    
    //registro
    $query = "insert into usuarios (_id, nombre, alias, telefono) values (?,?,?,?)";
    $inserted = $conexion->prepare($query);
    
    $inserted->bindParam(1, $id, PDO::PARAM_STR); 
    $inserted->bindParam(2, $nombre, PDO::PARAM_STR); 
    $inserted->bindParam(3, $alias, PDO::PARAM_STR);
    $inserted->bindParam(4, $telefono, PDO::PARAM_STR);

    echo "Registrado"; 
}
?>