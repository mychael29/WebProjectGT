<?php
session_start();
$errors = array(); 

require("models/db/conexion.php");

if (isset($_POST['reg_user'])) {
    
    $username = $_POST['username'];

    $nombres = $_POST['nombres'];
    
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if (empty($username)) { array_push($errors, "Username es requerido"); }
    if (empty($nombres)) { array_push($errors, "Nombres es requerido"); }
    if (empty($email)) { array_push($errors, "Email es requerido"); }
    if (empty($password_1)) { array_push($errors, "Password es requerido"); }

    if ($password_1 != $password_2) {
        array_push($errors, "Las dos contraseñas no coinciden");
    }

    if (count($errors) == 0) {

        $encrypted_password = md5($password_1);
        $query = "SELECT * FROM usuario_averia WHERE email='$email'";
        $result = $conexion->prepare($query);
        $result->execute();
        
        if($result->rowCount() == 1){
          
            $json['error'] = 'Ya existe un usuario con '.$email;
         
        }else{
           
            $query = "INSERT INTO usuario_averia (username,email,pass,nombres) VALUES (?,?,?,?)";
            $inserted = $conexion->prepare($query);
            
            $inserted->bindParam(1, $username, PDO::PARAM_STR);
            $inserted->bindParam(2, $email, PDO::PARAM_STR); 
            $inserted->bindParam(3, $password_1, PDO::PARAM_STR);
            $inserted->bindParam(4, $nombres, PDO::PARAM_STR);
            
            if($inserted->execute()){
                
                $query = "SELECT username FROM usuario_averia WHERE email='$email'";
                $comando = $conexion->prepare($query);
                $comando->execute();
                $row = $comando->fetch(PDO::FETCH_COLUMN);
               
                $_SESSION['username'] = $row;
                
                header('location: index.php');
            
            }else{
                $json['error'] = 'Se produjo un error';
               
            }
            
        }

    }

}
?>