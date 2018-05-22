<?php
//session_start();

require("../models/db/conexion.php");


if (isset($_POST['reg_averia'])) {
    
    $zona = $_POST['zona'];

    $motivo = $_POST['motivo'];
    
    $estado = $_POST['optradio'];

    $username = $_SESSION['username'];

    date_default_timezone_set('America/Lima');
    $fecha = date("Y-m-d H:i:s");

    $query = "INSERT INTO averia (zona,motivo,estado,fecha_hora,username) VALUES (?,?,?,?,?)";
            $inserted = $conexion->prepare($query);
            
            $inserted->bindParam(1, $zona, PDO::PARAM_STR);
            $inserted->bindParam(2, $motivo, PDO::PARAM_STR); 
            $inserted->bindParam(3, $estado, PDO::PARAM_STR);
            $inserted->bindParam(4, $fecha, PDO::PARAM_STR);
            $inserted->bindParam(5, $username, PDO::PARAM_STR);
            
            if($inserted->execute()){
                
                header('location: averia_enviada.php');
            
            }else{
                
                $json['error'] = 'Se produjo un error';
               
            }

}
?>