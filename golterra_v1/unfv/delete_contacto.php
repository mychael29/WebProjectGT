<?php
require("conexion.php");
$Id=$_POST["_id"];
$conexion->query("DELETE FROM contacto WHERE _id='$Id'");
?>