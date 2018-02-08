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
$query = "SELECT * FROM evento_prueba";

try {
    $result = $conexion->prepare($query);
    $result->execute();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $json['items_evento'][] = $row;
    }

    echo json_encode($json);
                    
} catch (PDOException $e) {
    $json['error'] = 'exception';
    echo json_encode($json);
    // Aquí puedes clasificar el error dependiendo de la excepción
    // para presentarlo en la respuesta Json
    return -1;
}
	
?>