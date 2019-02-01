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
    $events=array();

    $consultaJugador=$conexion->prepare("SELECT * FROM jugadores_evento");
    $consultaJugador->execute();
    $players=$consultaJugador->fetchAll(PDO::FETCH_ASSOC);

    $consultaEvent=$conexion->prepare("SELECT * FROM evento_prueba");
    $consultaEvent->execute();
    $eventsItems=$consultaEvent->fetchAll(PDO::FETCH_ASSOC);

    foreach ($eventsItems as $key1 => $value1) {
        # code...
        $json['info']=$value1;

        foreach ($players as $key2 => $value2) {
            # code...
            if(strcmp($value1['id_event'], $value2['id_evento']) == 0){
                $json['players'][]=$value2;
            }

        }
        $events[]=$json;
    }
    /*
    //echo "string : ".$evento['id_event'];
    while($evento=$consultaEvent->fetch(PDO::FETCH_ASSOC)){
        //echo "string : ".$evento[]['id_event'];

        //var_dump[$evento];
        $json['info']=$evento;
        //$events[]['info']=$evento;

        foreach ($players as $key => $value) {
            if($evento['id_event']=$value['id_evento']){
                $json['players'][]=$value;
            }
        }
        $events[]=$json;

    }*/
    print json_encode($events);
}

?>