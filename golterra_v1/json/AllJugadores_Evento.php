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

if(isset($_POST['id_evento'])){
    $id_evento = $_POST['id_evento'];
    $query = "Select * from jugadores_evento where id_evento='$id_evento'";
    $result = $conexion->prepare($query);
    $result->execute();
    
    if($result->rowCount() > 0){

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $json['jugadores_evento_activity'][] = $row;
        }

        echo json_encode($json);
    }else{
        $json['error'] = 'No hay jugadores apuntados aun';
    }    
}

	
?>