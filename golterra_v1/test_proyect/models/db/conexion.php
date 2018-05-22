
<?php

include('../../config.php') ;

try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

/*
class Database {
   
    private static $db = null;
 
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
  
    public static function getInstance()
    {
        if (self::$db === null) {
            self::$db = new self();
        }
        return self::$db;
    }
 
    public function getDb()
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO($host,$usernameserver,$passwordserver);
            self::$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo -> exec("SET CHARACTER SET UTF8");    
        }
        return self::$pdo;
    }
  
    final protected function __clone()
    {
    }
    function _destructor()
    {
        self::$pdo = null;
    }
}*/
?>