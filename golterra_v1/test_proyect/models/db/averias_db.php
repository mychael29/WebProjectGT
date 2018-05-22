<?php
include('conexion.php');
echo "error db1";

function getAll(){
    echo "error db2 getAll";
    $consulta = "SELECT * FROM averia LIMIT $empezar_desde, $tamagno_paginas";
    try {
        $averias=array();
        // Preparar sentencia
        $comando = $conexion->query($consulta);

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

function cantFilas(){
    echo "error db2 cantFilas";
    $consulta = "SELECT zona, motivo, estado FROM averia";
    try {
       
        // Preparar sentencia
        $comando = $conexion->prepare($consulta);
        $comando->execute(array());
        $num_filas=$comando->rowCount();
    
        // Ejecutar sentencia preparada
        //$comando->execute();
        return $num_filas;
    } catch (PDOException $e) {
        return false;
    }
}


    /*
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

    public static function delete($iduser)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM usuarios WHERE iduser_=?";
        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);
        return $sentencia->execute(array($iduser));
    }*/


?>