<?php
error_reporting(E_ALL);
include('config.php') ;

//require $server . '/sesion.php';
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

// Registrar usuario
if (isset($_POST['reg_user'])) {
    
            $username = $_POST['username'];

            $nombres = $_POST['nombres'];
            
            $email = $_POST['email'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
    
            // Validacion del formulario
            if (empty($username)) { array_push($errors, "Username es requerido"); }
            if (empty($nombres)) { array_push($errors, "Nombres es requerido"); }
            if (empty($email)) { array_push($errors, "Email es requerido"); }
            if (empty($password_1)) { array_push($errors, "Password es requerido"); }
    
            if ($password_1 != $password_2) {
                array_push($errors, "Las dos contraseñas no coinciden");
            }
    
            // Registrar usuario si no hay errores en el formulario
            if (count($errors) == 0) {

                $encrypted_password = md5($password_1);
                $query = "Select * from usuarios where email='$email'";
                $result = $conexion->prepare($query);
                $result->execute();
                //$result = mysqli_query($this->conexion, $query);
                
                if($result->rowCount() == 1){
                  
                    $json['error'] = 'Ya existe un usuario con '.$email;
                    //echo json_encode($json);
                    //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
                }else{
                    //registro
                    $query = "insert into usuarios (username,email,password,nombres) values (?,?,?,?)";
                    $inserted = $conexion->prepare($query);
                    
                    //$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
                    $inserted->bindParam(1, $username, PDO::PARAM_STR);
                    $inserted->bindParam(2, $email, PDO::PARAM_STR); 
                    $inserted->bindParam(3, $password_1, PDO::PARAM_STR);
                    $inserted->bindParam(4, $nombres, PDO::PARAM_STR);
                    
                
                    
                    if($inserted->execute()){
                        //$json['success'] = 'Cuenta creada';
                        $query = "SELECT username,email,nombres,photo FROM usuarios WHERE email='$email'";
                        $comando = $conexion->prepare($query);
                        $comando->execute();
                        $row = $comando->fetch(PDO::FETCH_ASSOC);
                        //$username = $row;
                       
                        $_SESSION['username'] = $row;
                        
                        header('location: index.php');
                    
                    }else{
                        $json['error'] = 'Se produjo un error';
                        //echo json_encode($json);
                    }
                    
                    //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
                }

            }
    
        }

?>