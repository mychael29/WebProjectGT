<?php

require("conexion.php");

$Id=$_GET["Id"];
$conexion->query("DELETE FROM averia WHERE id_averia='$Id'");
header("Location:../../reporte_averias.php");

?>