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

$query = "SELECT * FROM coordenadas_canchas";

try {
    // Preparar sentencia
    $comando = $conexion->prepare($query);
    // Ejecutar sentencia preparada
    $comando->execute();
    // Capturar primera fila del resultado
    $row = $comando->fetch(PDO::FETCH_ASSOC);
    $json['coordenadas'][]=$row;
    echo json_encode($json);
                    
} catch (PDOException $e) {
    $json['error'] = 'exception';
    echo json_encode($json);
    // Aquí puedes clasificar el error dependiendo de la excepción
    // para presentarlo en la respuesta Json
    return -1;
}
	
?>