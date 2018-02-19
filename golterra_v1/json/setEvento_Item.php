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
    $modo_partido = $_POST['modo_partido'];
    $fecha_evento_creado = $_POST['fecha_evento_creado'];

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "Select * from evento_prueba where latlng='$latlng'";
    $result = $conexion->prepare($query);
    $result->execute();

    if($result->rowCount() == 1){
        
          $json['sucess'] = 'Ya existe el evento';
          echo json_encode($json);
          //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
    }else{
          //registro
          $query = "insert into evento_prueba (latlng, name_organizador,fecha,hora,distrito,tipo,cancha_name,photo_url_cancha,titulo,descripcion,modo_partido,fecha_evento_creado) values (?,?,?,?,?,?,?,?,?,?,?,?)";
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
          $inserted_coordenadas->bindParam(9, $titulo, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(10, $descripcion, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(11, $modo_partido, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(12, $fecha_evento_creado, PDO::PARAM_STR);
          $inserted_coordenadas->execute();

          $query2 = "select * from evento_prueba where latlng='$latlng'";
          $result2 = $conexion->prepare($query2);
          $result2->execute();
          $row = $result2->fetch(PDO::FETCH_ASSOC);

          // CREANDO CUPOS DISPONIBLES DEL EVENTO
          $posicion=1;
          $IDevento=$row['id_event'];
          $TipoPartido=$row['tipo'];
          $TipoPartido=$TipoPartido+0;
          $numMultiplicar=2;
          $limitFor=$TipoPartido*$numMultiplicar;

          //NO FUNCIONA, HACE UN BUCLE DE 1000
          $i=1;
          while($i<=$limitFor){
            $queryCreandoCupos = "insert into jugadores_evento (`id_evento`,nombres,`id_usuario`,rango,experiencia,url_photo,equipo) 
            values ($IDevento,'DISPONIBLE',0,$i,$posicion,'https://arcane-ravine-59770.herokuapp.com/json/image_profile/imagenperfil.png?','')";
            if($i%2==0){
              $posicion++;
             }
             $insert = $conexion->prepare($queryCreandoCupos);
             $insert->execute();
             $i++;
          }

          /*
          for ($i=0; i<$limitFor; $i++){
              $n = $i + 1;
              $queryCreandoCupos = "insert into jugadores_evento (`id_evento`,nombres,`id_usuario`,rango,experiencia,url_photo,equipo) 
              values ($IDevento,'DISPONIBLE',0,$n,$posicion,'https://arcane-ravine-59770.herokuapp.com/json/image_profile/imagenperfil.png?','')";
              if($n%2==0){
                $posicion++;
               }
               $insert = $conexion->prepare($queryCreandoCupos);
               $insert->execute();
          }
          */

          // DEVOLVIENDO DATOS DEL EVENTO CREADO
          $json['evento registrado'][]=$row;
          
          echo json_encode($json);
          //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
    }

    
}
	
?>