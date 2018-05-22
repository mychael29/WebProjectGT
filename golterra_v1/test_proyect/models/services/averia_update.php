<?php
require('../models/db/conexion.php') ;


if(!isset($_POST["bot_actualizar"])){
$id_averia=$_GET["Id"];
$username=$_GET["username"];
$motivo=$_GET["motivo"];
$zona=$_GET["zona"];
$estado=$_GET["estado"];

}else{
    $Id=$_POST["id"];
    $estado=$_POST["optradio2"];
	$sql="UPDATE averia SET estado='$estado' WHERE id_averia=$Id";
	$resultado=$conexion->prepare($sql);
    $resultado->execute();
    
	header("Location:averia_enviada.php");
}
?>