<?php
include('conexion.php');
echo "error db1";


$consulta1 = "SELECT zona, motivo, estado FROM averia";
$comando1 = $conexion->prepare($consulta1);
$comando1->execute(array());
$num_filas=$comando1->rowCount();

$consulta2 = "SELECT * FROM averia LIMIT $empezar_desde, $tamagno_paginas";
$averias=array();
        // Preparar sentencia
$comando2 = $conexion->query($consulta2);

while($filas=$comando2->fetch(PDO::FETCH_ASSOC)){   
    $averias[]=$filas;
}

$matriz_averias = $averias;


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