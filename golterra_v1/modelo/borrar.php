<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php

require_once("Conectar.php");
$base=Conectar::conexion();
$Id=$_GET["Id"];
$base->query("DELETE FROM usuarios WHERE iduser_='$Id'");
header("Location:../index.php");

?>
</body>
</html>