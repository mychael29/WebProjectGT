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
    $jugadores=array();
    $consulta=$conexion->query("SELECT * FROM jugadores_evento");
    while($jugador=$consulta->fetch(PDO::FETCH_ASSOC)){
        
        $jugadores[]=$jugador;
    }

    print json_encode($jugadores);
}
/*
if(isset($_POST['id_evento'])){
    $jugadores=array();
    $id_evento = $_POST['id_evento'];
    $query = "Select * from jugadores_evento where id_evento='$id_evento'";
    $result = $conexion->prepare($query);
    $result->execute();
    
    while($jugador=$result->fetch(PDO::FETCH_ASSOC)){
        
        $jugadores[]=$jugador;
    }

    print json_encode($jugadores);
*/


	
?>