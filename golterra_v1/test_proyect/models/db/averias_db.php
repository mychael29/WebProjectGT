<?php
include('conexion.php');


class Averias {
    function __construct()
    {
    }

    public static function getAll($empezar_desde,$tamagno_paginas){

        $consulta = "SELECT * FROM averias LIMIT $empezar_desde, $tamagno_paginas";
        try {
            $averias=array();
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->query($consulta);

            while($filas=$comando->fetch(PDO::FETCH_ASSOC)){   
                $averias[]=$filas;
            }
            // Ejecutar sentencia preparada
            //$comando->execute();
            return $averias;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function cantFilas(){
        $consulta = "SELECT username, email, nombres FROM usuarios";
        try {
           
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array());
            $num_filas=$comando->rowCount();
        
            // Ejecutar sentencia preparada
            //$comando->execute();
            return $num_filas;
        } catch (PDOException $e) {
            return false;
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
        $sentencia = Database::conexion()->prepare($comando);
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
        $comando = "DELETE FROM usuarios WHERE iduser_=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($iduser));
    }
}

?>