<?php
/**
 * Representa el la estructura de las Usuarios
 * almacenadas en la base de datos
 */
require_once("../modelo/conectar.php");

class Users {
    function __construct()
    {
    }

    public static function getAll(){

        $consulta = "SELECT * FROM usuarios";
        try {
            // Preparar sentencia
            $comando = Conectar::conexion()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de un usuario con un identificador
     * determinado
     * @param $iduser Identificador del usuario
     */
    public static function getById($iduser){
        // Consulta de la tabla usuarios
        $consulta = "SELECT iduser_, username, email, photo, nombres, region FROM usuarios WHERE iduser_ = ?";
        
        try {
            // Preparar sentencia
            $comando = Conectar::conexion()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($iduser));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     */
    public static function update($iduser,$username,$email,$password) {

        // Creando consulta UPDATE
        $consulta = "UPDATE usuarios" .
            " SET username=?, email=?, password=? " .
            "WHERE iduser=?";
        // Preparar la sentencia
        $cmd = Database::conexion()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($username, $email, $password, $iduser));
        return $cmd;
    }

    /**
     * Insertar un nuevo usuario
     */
    public static function insert($username, $email, $password) {
        // Sentencia INSERT
        $comando = "INSERT INTO usuarios ( " .
            "username," .
            " email," .
            " password)" .
            " VALUES( ?,?,?)";
        // Preparar la sentencia
        $sentencia = Conectar::conexion()->prepare($comando);
        return $sentencia->execute(
            array(
                $username,
                $email,
                $password
            )
        );
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $iduser identificador de la tabla usuarios
     * @return bool Respuesta de la eliminación
     */
    public static function delete($iduser)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM usuarios WHERE iduser=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($iduser));
    }
}
?>