<?php
//error_reporting(E_ALL);
include('config.php') ;

try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

	if(isset($_POST['email'],$_POST['password'],$_POST['nombres'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$nombres = $_POST['nombres'];
		$image = $_POST['photo'];
		
		if($image!="no imagen"){
			$path  = "json/image_profile/$nombres.jpg"; 
			$url_image = "image_profile/".$nombres.".jpg";//agregarle el ID al nombre de la imagen
			file_put_contents($path,base64_decode($image));
			//$bytesArchivo=file_get_contents($path);//para guardar la imagen en la tabla de la bbdd
		}else{
			$url_image = "sin imagen";
		}
        
		if(!empty($email) && !empty($password) && !empty($nombres)){
			
			$encrypted_password = md5($password);
			$query = "Select * from usuarios where email='$email'";
            $result = $conexion->prepare($query);
            $result->execute();
            //$result = mysqli_query($this->conexion, $query);
            
			if($result->rowCount() == 1){
              
				$json['error'] = 'Ya existe un usuario con '.$email;
				echo json_encode($json);
				//mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
			}else{
				//registro
                $query = "insert into usuarios (email, password, photo, nombres) values (?,?,?,?)";
				$inserted = $conexion->prepare($query);
				
				//$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
				$inserted->bindParam(1, $email, PDO::PARAM_STR); 
				$inserted->bindParam(2, $password, PDO::PARAM_STR);
				$inserted->bindParam(3, $url_image, PDO::PARAM_STR);
				$inserted->bindParam(4, $nombres, PDO::PARAM_STR);
				
				/*
				if($inserted->execute()){
					$json['success'] = 'Cuenta creada';
				}else{
					$json['error'] = 'Se produjo un error';
				}
				//$inserted = mysqli_query($this -> conexion, $query);
				*/
                
				if($inserted->execute()){
					$json['success'] = 'Cuenta creada';

					$query = "SELECT iduser_,email,photo,nombres FROM usuarios WHERE email = ?";

					try {
						// Preparar sentencia
						$comando = $conexion->prepare($query);
						// Ejecutar sentencia preparada
						$comando->execute(array($email));
						// Capturar primera fila del resultado
						$row = $comando->fetch(PDO::FETCH_ASSOC);
					
						$json['usuario'][]=$row;
					
					} catch (PDOException $e) {
						// Aquí puedes clasificar el error dependiendo de la excepción
						// para presentarlo en la respuesta Json
						return -1;
					}

				}else{
					$json['error'] = 'Se produjo un error';
				}
				echo json_encode($json);
				//mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
			}
			
		}else{
			echo json_encode("debe escribir ambas entradas");
		}
		
	}
?>