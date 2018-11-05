<?php
require("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $contactos=array();
    $consulta=$conexion->query("SELECT * FROM contacto");
    while($contacto=$consulta->fetch(PDO::FETCH_ASSOC)){
        
        $contactos[]=$contacto;
    }
    print json_encode($contactos);
}
?>