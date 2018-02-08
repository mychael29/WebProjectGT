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

if(isset($_POST['name_organizador'],$_POST['fecha'],$_POST['distrito'],$_POST['tipo'],$_POST['hora'],$_POST['cancha_name'],$_POST['latlng'])) {
    $nombre = $_POST['name_organizador'];
    $fecha = $_POST['fecha'];
    $distrito = $_POST['distrito'];
    $tipo = $_POST['tipo'];
    $hora = $_POST['hora'];
    $cancha_name = $_POST['cancha_name'];
    $latlng = $_POST['latlng'];
    $photo_cancha = $_POST['photo_cancha'];
    //FALTA EL TITULO Y DESCRIPCION
    $query = "Select * from evento_prueba where latlng='$latlng'";
    $result = $conexion->prepare($query);
    $result->execute();

    if($result->rowCount() == 1){
        
          $json['sucess'] = 'Ya existe el evento';
          echo json_encode($json);
          //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
    }else{
          //registro
          $query = "insert into evento_prueba (latlng, name_organizador,fecha,hora,distrito,tipo,cancha_name,photo_url_cancha) values (?,?,?,?,?,?,?,?)";
          $inserted_coordenadas = $conexion->prepare($query);
          //$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
          $inserted_coordenadas->bindParam(1, $latlng, PDO::PARAM_STR); 
          $inserted_coordenadas->bindParam(2, $nombre, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(3, $fecha, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(4, $hora, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(5, $distrito, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(6, $tipo, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(7, $cancha_name, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(8, $photo_cancha, PDO::PARAM_STR);
          $inserted_coordenadas->execute();

          $query2 = "select * from evento_prueba where latlng='$latlng'";
          $result2 = $conexion->prepare($query2);
          $result2->execute();
          $row = $result2->fetch(PDO::FETCH_ASSOC);
          $json['evento registrado'][]=$row;

          echo json_encode($json);
          //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
    }

    
}
	
?>