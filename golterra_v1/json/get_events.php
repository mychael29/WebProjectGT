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
    $players=array();

    $consultaJugador=$conexion->query("SELECT * FROM jugadores_evento");

    while($jugador=$consultaJugador->fetch(PDO::FETCH_ASSOC)){
        $players[$jugador['id_evento']]=$jugador;
    }

    $consultaEvent=$conexion->query("SELECT * FROM evento_prueba");

    //echo "string : ".$evento['id_event'];
    while($evento=$consultaEvent->fetch(PDO::FETCH_ASSOC)){
        //echo "string : ".$evento[]['id_event'];

        //var_dump[$evento];

        $events['info']=$evento;

        foreach ($players as $key => $value) {
            if($evento['id_event']=$key){
                $events['players'][]=$value;
            }
        }

    }
    print json_encode($events);
}

?>