<?php
echo "error db1";
include('conexion.php');


$comando1 = $conexion->prepare("SELECT zona, motivo, estado FROM averia");
$comando1->execute(array());
$num_filas=$comando1->rowCount();

$averias=array();
        // Preparar sentencia
$comando2 = $conexion->query("SELECT * FROM averia LIMIT $empezar_desde, $tamagno_paginas");

while($filas=$comando2->fetch(PDO::FETCH_ASSOC)){   
    $averias[]=$filas;
}

$matriz_averias = $averias;
echo "1 matriz_averias " . $matriz_averias;


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