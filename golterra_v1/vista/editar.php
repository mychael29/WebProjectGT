<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
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

if(!isset($_POST["bot_actualizar"])){
$Id=$_GET["Id"];
$username=$_GET["username"];
$email=$_GET["email"];
$nombres=$_GET["nombres"];
}else{
	$Id=$_POST["id"];
	$username=$_POST["username"];
	$email=$_POST["email"];
  $nombres=$_POST["nombres"];
	$sql="UPDATE usuarios set username=:miUsername, email=:miEmail, nombres=:miNombres WHERE iduser_=:miId";
	$resultado=$conexion->prepare($sql);
	$resultado->execute(array(":miId"=>$Id, ":miUsername"=>$username, "miEmail"=>$email, ":miNombres"=>$nombres));
	header("Location:../index.php");
}
?>
<p>

</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $Id?>"></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="username"></label>
      <input type="text" name="username" id="username" value="<?php echo $username?>"></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" value="<?php echo $email?>"></td>
    </tr>
    <tr>
      <td>Nombres</td>
      <td><label for="nombres"></label>
      <input type="text" name="nombres" id="nombres"value="<?php echo $nombres?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>