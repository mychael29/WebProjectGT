<?php
include('config.php') ;
try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

if(isset($_POST['id_event'])) {
	$id_event = $_POST['id_event'];
    $query = "SELECT * FROM evento_prueba WHERE id_event='$id_event'";
    $result = $conexion->prepare($query);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $json['evento'][]=$row;

    echo json_encode($json);
}
	
?>