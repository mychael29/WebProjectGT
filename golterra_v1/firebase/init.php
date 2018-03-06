<?php
include('../config.php') ;

$con = mysqli_connect($server,$usernameserver,$passwordserver,$db);
if($con){
    echo "Connection Success....";
}else{
    echo "Connection Error....";
}
/*
try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}*/
?>