<?php
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