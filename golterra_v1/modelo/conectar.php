<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
class Conectar{
	public static function conexion(){
		
		try{
			$conexion = new PDO('mysql:host=$server; dbname=$db','$username','$password');
			$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion -> exec("SET CHARACTER SET UTF8");
			
	}catch(Exception $e){
		
		die("Error " . $e->getMessage());
		echo "Linea del error " . $e->getLine();
	}
	
	return $conexion;
	}
}
?>