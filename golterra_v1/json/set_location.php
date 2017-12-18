<?php
//error_reporting(E_ALL);
include('../config.php') ;

try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

	if(isset($_POST['lat'],$_POST['lng'],$_POST['ubicacion'],$_POST['photo_cancha'])) {
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$nombre = $_POST['nombre'];
		$ubicacion = $_POST['ubicacion'];
		$photo_cancha = $_POST['photo_cancha'];
		

		// se tiene que insertar foto hasta que se valide
		$path  = "json/image_cancha/$nombre.jpg"; 
		$url_image = "image_cancha/".$nombre.".jpg";//agregarle el ID al nombre de la imagen
		file_put_contents($path,base64_decode($photo_cancha));
		//$bytesArchivo=file_get_contents($path);//para guardar la imagen en la tabla de la bbdd
		/*
		if($photo_cancha!="no_imagen"){
			$path  = "json/image_cancha/$nombre.jpg"; 
			$url_image = "image_cancha/".$nombre.".jpg";//agregarle el ID al nombre de la imagen
			file_put_contents($path,base64_decode($photo_cancha));
			//$bytesArchivo=file_get_contents($path);//para guardar la imagen en la tabla de la bbdd
		}else{
			$url_image = "no_imagen";
		}
        */
		if(!empty($ubicacion) && !empty($lat) && !empty($lng)){
			
			$query = "Select * from coordenadas_canchas where cancha_lat='$lat' and cancha_long='$lng'";
            $result = $conexion->prepare($query);
            $result->execute();
            //$result = mysqli_query($this->conexion, $query);
            
			if($result->rowCount() == 1){
              
				$json['invalido'] = 'Ya existe esta ubicacion registrada';
				echo json_encode($json);
				//mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
			}else{
				//registro
                $query = "insert into coordenadas_canchas (cancha_lat, cancha_long) values (?,?)";
				$inserted_coordenadas = $conexion->prepare($query);
				//$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
				$inserted_coordenadas->bindParam(1, $lat, PDO::PARAM_STR); 
				$inserted_coordenadas->bindParam(2, $lng, PDO::PARAM_STR);
                $inserted_coordenadas->execute();

                $query = "insert into canchas_no_afiliados (nombre, direccion, photo_cancha) values (?,?,?)";
                $inserted_ubicacion = $conexion->prepare($query);
				//$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
				$inserted_ubicacion->bindParam(1, $nombre, PDO::PARAM_STR); 
				$inserted_ubicacion->bindParam(2, $ubicacion, PDO::PARAM_STR); 
				$inserted_ubicacion->bindParam(3, $url_image, PDO::PARAM_STR);
                $inserted_ubicacion->execute();
				
                $json['valido'] = 'Cancha registrada';
				echo json_encode($json);
				//mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
			}
			
		}else{
			$json['error'] = 'No se pudo procesar';
			echo json_encode($json);
		}
		
	}
?>