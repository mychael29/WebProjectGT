<?php
error_reporting(E_ALL);
include('config.php') ;

session_start();

$errors = array(); 

try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

if(isset($_POST['login_user'])){ // ya se cambio, averiguar mejor, buscar ejemplos
    

    $email = $_POST["email"];
    $password = $_POST['password'];

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0){ /// posible erro aqui
        $encrypted_password = md5($password);
        $query = "Select * from usuarios where email='$email' and password = '$password'";
        $result = $conexion->prepare($query);
        $result->execute();
        //$result = mysqli_query($this->conexion, $query);
        if($result->rowCount() == 1){
            $query = "SELECT username FROM usuarios WHERE email='$email'";
            $comando = $conexion->prepare($query);
            $comando->execute();
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            $username = $row;
            $_SESSION['username'] = $username; //CAMBIAR USERNAME POR EMAIL
            
            header('location: https://arcane-ravine-59770.herokuapp.com/index.php');

            //echo json_encode($json);
            //mysqli_close($this -> conexion);
        }else{
            array_push($errors, "Wrong username/password combination");
            //mysqli_close($this->conexion);
        }
    }

    


}


?>