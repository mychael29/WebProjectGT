<?php
require("conexion.php");
$Id=$_GET["id"];
$conexion->query("DELETE FROM contacto WHERE _id='$Id'");
?>