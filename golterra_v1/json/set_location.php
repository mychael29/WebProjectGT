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

	if(isset($_POST['lat'],$_POST['lng'],$_POST['ubicacion'],$_POST['photo_cancha'])) {
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$ubicacion = $_POST['ubicacion'];
        $photo_cancha = $_POST['photo_cancha'];
		
		if($photo_cancha!="no_imagen"){
			$path  = "json/image_cancha/$ubicacion.jpg"; 
			$url_image = "image_cancha/".$ubicacion.".jpg";//agregarle el ID al nombre de la imagen
			file_put_contents($path,base64_decode($photo_cancha));
			//$bytesArchivo=file_get_contents($path);//para guardar la imagen en la tabla de la bbdd
		}else{
			$url_image = "no_imagen";
		}
        
		if(!empty($ubicacion) && !empty($lat) && !empty($lng)){
			
			$query = "Select * from coordenadas_canchas where lat='$lat' and lng='$lng'";
            $result = $conexion->prepare($query);
            $result->execute();
            //$result = mysqli_query($this->conexion, $query);
            
			if($result->rowCount() == 1){
              
				$json['invalido'] = 'Ya existe esta ubicacion registrada ';
				echo json_encode($json);
				//mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
			}else{
				//registro
                $query = "insert into coordenadas_canchas (lat, lng) values (?,?)";
				$inserted_coordenadas = $conexion->prepare($query);
				//$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
				$inserted_coordenadas->bindParam(1, $lat, PDO::PARAM_STR); 
				$inserted_coordenadas->bindParam(2, $lng, PDO::PARAM_STR);
                $inserted_coordenadas->execute();

                $query = "insert into canchas_no_afiliadas (nombre, direccion, photo_cancha) values (?,?,?)";
                $inserted_ubicacion = $conexion->prepare($query);
				//$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
				$inserted_ubicacion->bindParam(1, $nombre, PDO::PARAM_STR); 
				$inserted_ubicacion->bindParam(2, $direccion, PDO::PARAM_STR); 
				$inserted_ubicacion->bindParam(3, $photo_cancha, PDO::PARAM_STR);
                $inserted_ubicacion->execute();
				/*
				if($inserted->execute()){
					$json['success'] = 'Cuenta creada';
				}else{
					$json['error'] = 'Se produjo un error';
				}
				//$inserted = mysqli_query($this -> conexion, $query);
				*/
                $json['valido'] = 'Cancha registrada';
				echo json_encode($json);
				//mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
			}
			
		}else{
			echo json_encode("No se ha podido registrar la cancha");
		}
		
	}
?>