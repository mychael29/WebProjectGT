<?php
include('config.php') ;
try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

if(isset($_POST['email'],$_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(!empty($email) && !empty($password)){
		
		$encrypted_password = md5($password);
		$query = "Select * from usuarios where email='$email' and password = '$password'";
		$result = $conexion->prepare($query);
		$result->execute();
		//$result = mysqli_query($this->conexion, $query);
		if($result->rowCount() == 1){
			$json['success'] = 'Bienvenido '.$email;
			// Al igual como en register_movil, con este json enviamos los datos al MainActivity
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
				$json['error'] = 'exception';
				// Aquí puedes clasificar el error dependiendo de la excepción
				// para presentarlo en la respuesta Json
				return -1;
			}

			echo json_encode($json);
			//mysqli_close($this -> conexion);
		}else{
			$json['error'] = 'Las credenciales de inicio de sesión son incorrectas';
			echo json_encode($json);
			//mysqli_close($this->conexion);
		}
		
	}else{
		echo json_encode("debe escribir ambas entradas");
	}
	
}
	
?>