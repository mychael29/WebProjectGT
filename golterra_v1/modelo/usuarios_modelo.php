<?php

	
class Usuarios_modelo{
	
	private $db;
	private $usuarios;
	
	public function __construct(){
		
		require_once("../config.php");
		try{
			$conexion = new PDO($host,$usernameserver,$passwordserver);
			$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion -> exec("SET CHARACTER SET UTF8");
		}catch(Exception $e){
			die("Error " . $e->getMessage());
			echo "Linea del error " . $e->getLine();
		}
		$this->db=$conexion;
		$this->usuarios=array();
	}
	
	public function get_usuarios(){
		
		require("paginacion.php");
		
		$consulta=$this->db->query("SELECT * FROM usuarios LIMIT $empezar_desde, $tamagno_paginas");
		
		while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
			
			$this->usuarios[]=$filas;
		}
		
		return $this->usuarios;
	}
}

?>