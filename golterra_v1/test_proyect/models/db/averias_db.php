<?php

require("conexion.php");

$comando1 = $conexion->prepare("SELECT zona, motivo, estado FROM averia");
$comando1->execute(array());
$num_filas=$comando1->rowCount();

$averias=array();
$comando2 = $conexion->query("SELECT * FROM averia LIMIT $empezar_desde, $tamagno_paginas");

while($filas=$comando2->fetch(PDO::FETCH_ASSOC)){   
    $averias[]=$filas;
}

$matriz_averias = $averias;

?>