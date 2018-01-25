<?php
/**
 * Obtiene todas los usuarios de la base de datos
 */
//require 'users.php';
include('../config.php') ;
try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejar petición GET
    $usuarios=array();
    //$sql_total="SELECT username, email, photo, nombres FROM usuarios";
	//$resultado=$conexion->prepare($sql_total);
    //$resultado->execute(array());

    $consulta=$conexion->query("SELECT * FROM usuarios");
    while($user=$consulta->fetch(PDO::FETCH_ASSOC)){
        
        $usuarios[]=$user;
    }
    print json_encode($usuarios);
/*
    if ($resultado->fetch(PDO::FETCH_ASSOC)) {
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $json['usuario'][]=$row;
        print json_encode(array($json));
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
    */
}
