<?php
session_start();

$errors = array(); 

require("models/db/conexion.php");

if(isset($_POST['login_user'])){ 
    

    $email = $_POST["email"];
    $password = $_POST['password'];

    if (empty($email)) {
        array_push($errors, "Email es requerido");
    }
    if (empty($password)) {
        array_push($errors, "Password es requerido");
    }

    if (count($errors) == 0){ 
        $encrypted_password = md5($password);
        $query = "Select * from usuario_averia where email='$email' and pass = '$password'";
        $result = $conexion->prepare($query);
        $result->execute();
      
        if($result->rowCount() == 1){
            $query = "SELECT username FROM usuario_averia WHERE email='$email'";
            $comando = $conexion->prepare($query);
            $comando->execute();
            $row = $comando->fetch(PDO::FETCH_COLUMN);
        
            $_SESSION['username'] = $row;
            
            header('location:index.php');

        }else{
            array_push($errors, "Email o password incorrecto");
        }
    }

}
?>