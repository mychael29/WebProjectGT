<?php

include('../config.php') ;

try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

if(isset($_POST['id_evento'])) {
    $id_evento = $_POST['id_evento'];

    $query_a = "Select * from equipo_a where latlng='$id_evento'";
    $query_b = "Select * from equipo_b where latlng='$id_evento'";
    $result_a = $conexion->prepare($query_a);
    $result_b = $conexion->prepare($query_b);
    $result_a->execute();
    $result_b->execute();

    
}