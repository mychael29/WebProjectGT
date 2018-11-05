<?php
require("conexion.php");
$Id=$_GET["_id"];
$conexion->query("DELETE FROM contacto WHERE _id='$Id'");
?>