<?php

include($_SERVER['HTTP_HOST'] . 'modelo/conectar.php') ;
//require $server . '/sesion.php';
session_start();
$errors = array(); 
class SignupUser {
    
    private $db;
    private $conexion;
    
    function __construct() {
        $this -> db = new Conectar();
        $this -> conexion = $this->db->conexion();
    }
    
    public function does_user_exist($email,$password,$username)
    {
        $query = "Select * from usuarios where email='$email'";
        $result = $this -> conexion->prepare($query);
        $result->execute();
        //$result = mysqli_query($this->conexion, $query);
        
        if($result->rowCount() == 1){
          
            $json['error'] = 'Ya existe un usuario con '.$email;
            //echo json_encode($json);
            //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
        }else{
            //registro
            $query = "insert into usuarios (username,email,password) values (?,?,?)";
            $inserted = $this->conexion->prepare($query);
            
            //$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
            $inserted->bindParam(1, $username, PDO::PARAM_STR);
            $inserted->bindParam(2, $email, PDO::PARAM_STR); 
            $inserted->bindParam(3, $password, PDO::PARAM_STR);
            
        
            
            if($inserted->execute()){
                //$json['success'] = 'Cuenta creada';
                $_SESSION['username'] = $username;
                
                header('location: https://arcane-ravine-59770.herokuapp.com/index.php');
            
            }else{
                $json['error'] = 'Se produjo un error';
                //echo json_encode($json);
            }
            
            //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
        }       
    }    
}

$signupUser = new SignupUser();
// Registrar usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
    
            // Validacion del formulario
            if (empty($username)) { array_push($errors, "Username is required"); }
            if (empty($email)) { array_push($errors, "Email is required"); }
            if (empty($password_1)) { array_push($errors, "Password is required"); }
    
            if ($password_1 != $password_2) {
                array_push($errors, "The two passwords do not match");
            }
    
            // Registrar usuario si no hay errores en el formulario
            if (count($errors) == 0) {
                $encrypted_password = md5($password);
                $signupUser-> does_user_exist($email,$password,$username);

            }
    
        }

?>