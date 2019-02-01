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

if($_SERVER['REQUEST_METHOD'] == 'GET') {

    $consultaEvent=$conexion->query("SELECT * FROM evento_prueba");

    while($evento=$consultaEvent>fetch(PDO::FETCH_ASSOC)){
        $events['info']=$evento;
        $consultaJugador=$conexion->query("SELECT * FROM jugadores_evento WHERE id_evento = ".$evento['id_event']);
        while($jugador=$consultaJugador>fetch(PDO::FETCH_ASSOC)){
            $events['players'][]=$jugador;
        }
    }
    print json_encode($events);
}

?>