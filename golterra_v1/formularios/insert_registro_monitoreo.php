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

if(isset($_POST['profesor_encontrado'],$_POST['grado'],$_POST['actividad_o_clase_realizado'],$_POST['observacion'],$_POST['alumnos_que_sobresalen'])) {
    $profesor_encontrado = $_POST['profesor_encontrado'];
    $grado = $_POST['grado'];
    $actividad_o_clase_realizado = $_POST['actividad_o_clase_realizado'];
    $observacion = $_POST['observacion'];
    $alumnos_que_sobresalen = $_POST['alumnos_que_sobresalen'];

    $query = "INSERT INTO tabla_monitoreo (profesor_encontrado, grado, actividad_o_clase_realizado, observacion, alumnos_que_sobresalen) VALUES (?,?,?,?,?)";
    $result = $conexion->prepare($query);
    $result->bindParam(1, $profesor_encontrado, PDO::PARAM_STR); 
    $result->bindParam(2, $grado, PDO::PARAM_STR);
    $result->bindParam(3, $actividad_o_clase_realizado, PDO::PARAM_STR);
    $result->bindParam(4, $observacion, PDO::PARAM_STR);
    $result->bindParam(5, $alumnos_que_sobresalen, PDO::PARAM_STR);

    if($result->execute()){
        $json['success'] = 'Se registro correctamente';
    }else{
        $json['success'] = 'Se produjo un error';
    }
        
    echo json_encode($json);
}
?>