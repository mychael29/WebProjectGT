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

    

	
	//-----------------------------------------paginacion----------------------------------------------//
	
	$tamagno_paginas=18;
  
    if(isset($_GET["pagina"])){
		
		if ($_GET["pagina"]==1){
			
			header("Location:index_users.php");
			
		}else{
			
			$pagina=$_GET["pagina"];
			
		}
		
	}else{
		
		$pagina=1;
	}
	
	$empezar_desde=($pagina-1)*$tamagno_paginas;
	$sql_total="SELECT username, email, nombres FROM usuarios";
	$resultado=$conexion->prepare($sql_total);
	$resultado->execute(array());
	$num_filas=$resultado->rowCount();
	$total_paginas=ceil($num_filas/$tamagno_paginas);
  
	//-------------------------------------------------------------------------------------------------//

	/*
$registros=$base->query("SELECT * FROM usuarios LIMIT $empezar_desde,$tamagno_paginas")->fetchAll(PDO::FETCH_OBJ);
	if(isset($_POST["cr"])){
	    $nombre=$_POST["Nom"];
	    $apellido=$_POST["Ape"];
	    $email=$_POST["Email"];
	    $sql="INSERT INTO usuarios (nombre,apellido,password,email) VALUES(:nom,:ape,'aaaa',:email)";
	    $resultado=$base->prepare($sql);
	    $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":email"=>$email));
	    header("Location:index_users.php");
	}
	*/
	
	
?>	