<?php
//error_reporting(E_ALL);
include('../config.php') ;

try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $eventos=array();

    $consulta=$conexion->query("SELECT * FROM evento_prueba");
    while($evento=$consulta->fetch(PDO::FETCH_ASSOC)){
        
        $eventos[]=$evento;
    }
    print json_encode($eventos);
}
	
?>