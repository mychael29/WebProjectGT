<?php

require_once($server . "/sesion.php");

class LoginUser {
    
    private $db;
    private $conexion;
    
    function __construct() {
        $this -> db = new Conectar();
        $this -> conexion = $this->db->conexion();
    }
    
    public function does_user_exist($email,$password)
    {
        $query = "Select * from usuarios where email='$email' and password = '$password'";
        $result = $this -> conexion->prepare($query);
        $result->execute();
        //$result = mysqli_query($this->conexion, $query);
        if($result->rowCount() == 1){
            $query = "SELECT username FROM usuarios WHERE email='$email'";
            $comando = $this->conexion->prepare($query);
            $comando->execute();
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            $username = $row;
            $_SESSION['username'] = $username; //CAMBIAR USERNAME POR EMAIL
            
            header('location: ' . $server .'/index.php');

            //echo json_encode($json);
            //mysqli_close($this -> conexion);
        }else{
            array_push($errors, "Wrong username/password combination");
            //mysqli_close($this->conexion);
        }
        
    }
    
}
$loginUser = new LoginUser();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

    $email = $_POST["email"];
    $password = $_POST['password'];

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0){
        $encrypted_password = md5($password);
        $loginUser-> does_user_exist($email,$password);
    }


}
?>