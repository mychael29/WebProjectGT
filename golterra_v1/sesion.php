<?php 
	session_start();

	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// conexion a la base de datos
	require_once("modelo/conectar.php");
    
	$base=Conectar::conexion();
	

	// Registrar usuario
	if (isset($_POST['reg_user'])) {

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
		
			$query = "INSERT INTO usuarios (username, email, password) 
			VALUES('$username','$email', '$password_1')";
			$resultado=$base->prepare($query);
			$resultado->execute();

			$_SESSION['username'] = $username;
			
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USUARIO
	if (isset($_POST['login_user'])) {
		$username = $_POST["username"];
		$password = $_POST['password'];

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
		
			$query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
			$resultado=$base->prepare($query);
			$resultado->execute();
			
			if ($resultado->rowCount() == 1) {
				$_SESSION['username'] = $username;
				
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>