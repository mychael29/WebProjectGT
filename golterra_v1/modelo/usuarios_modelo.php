<?php

require_once("../config.php");
try{
	$conexion = new PDO($host,$usernameserver,$passwordserver);
	$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
	die("Error " . $e->getMessage());
	echo "Linea del error " . $e->getLine();
}
$usuarios=array();

require("paginacion.php");

$consulta=$conexion->query("SELECT * FROM usuarios LIMIT $empezar_desde, $tamagno_paginas");

while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
	
	$usuarios[]=$filas;
}

?>