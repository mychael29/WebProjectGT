<?php

class Usuarios_modelo{
	
	private $db;
	private $usuarios;
	
	public function __construct(){
		
		require_once("modelo/conectar.php");
		$this->db=Conectar::conexion();
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