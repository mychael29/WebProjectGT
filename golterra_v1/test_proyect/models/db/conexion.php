<?php
require_once("../db/models/test_proyect/config.php"); // corregirlo para probarlo en el localhost
/*
try{
	$conexion = new PDO($host,$usernameserver,$passwordserver);
	$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
	die("Error " . $e->getMessage());
	echo "Linea del error " . $e->getLine();
}*/

class Database {
    /**
     * Única instancia de la clase
     */
    private static $db = null;
    /**
     * Instancia de PDO
     */
    private static $pdo;
    final private function __construct()
    {
        try {
            // Crear nueva conexión PDO
            self::getDb();
        } catch (PDOException $e) {
            // Manejo de excepciones
        }
    }
    /**
     * Retorna en la única instancia de la clase
     * @return Database|null
     */
    public static function getInstance()
    {
        if (self::$db === null) {
            self::$db = new self();
        }
        return self::$db;
    }
    /**
     * Crear una nueva conexión PDO basada
     * en los datos de conexión
     * @return PDO Objeto PDO
     */
    public function getDb()
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO($host,$usernameserver,$passwordserver);
            self::$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo -> exec("SET CHARACTER SET UTF8");    
        }
        return self::$pdo;
    }
    /**
     * Evita la clonación del objeto
     */
    final protected function __clone()
    {
    }
    function _destructor()
    {
        self::$pdo = null;
    }
}
?>