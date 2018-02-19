<?php
include('../config.php') ;
try{
    $conexion = new PDO($host,$usernameserver,$passwordserver);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion -> exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error " . $e->getMessage());
    echo "Linea del error " . $e->getLine();
}

if(true) {
    //isset($_POST['id_evento'],$_POST['nombres'],$_POST['id_usuario'],$_POST['url_photo'],$_POST['equipo'])
    $id_evento = $_POST['id_evento'];
    $id_evento = (int) $id_evento;
    $nombres = $_POST['nombres'];
    $id_usuario = $_POST['id_usuario'];
    $id_usuario = (int) $id_usuario;
    $rango = $_POST['rango'];
    $experiencia = $_POST['experiencia'];
    $url_photo = $_POST['url_photo'];
    $equipo = $_POST['equipo'];
    $posicion = $_POST['posicion'];
   
    //FALTA EL TITULO Y DESCRIPCION
    $query = "Select * from jugadores_evento where id_evento = ? and id_usuario = ?";
    $result = $conexion->prepare($query);
    $result->execute(array($id_evento,$id_usuario));

    if($result->rowCount() > 0){
        
          $json['success'][] = 'Ya estas apuntado al partido';
          echo json_encode($json);
          //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
    }else{
          //registro
          // CAMBIARLO A UN UPDATE ... WHERE experiencia = 1 && equipo = 'a'.. LOS VALORES VENDRA POR EL ANDROID Y POR DEFECTO EL ORGANIZADOR EL 1 Y EL 'a'
          //implementar un 2 valores mas que vengan del android, para experiencia(definira la posicion del jugador) y rango(definira si es equipo a o b, impar = a y par = b)
          
          
          $query = "update jugadores_evento set id_evento=$id_evento, nombres='$nombres', id_usuario=$id_usuario, rango='$rango', experiencia='$experiencia', url_photo='$url_photo', equipo='$equipo', posicion='$posicion'
          where equipo='$equipo'";
          /*
          (`id_evento`,nombres,`id_usuario`,rango,experiencia,url_photo,equipo) experiencia
          values ($id_evento,'$nombres',$id_usuario,'$rango','$experiencia','$url_photo','$equipo','$posicion')";
          */
          $insert = $conexion->prepare($query);
          $insert->execute();
          
          /*
          //$inserted->bindParam('ssss',$email,$password,$url_image,$nombres);//estaba con bind_param
          $inserted_coordenadas->bindParam(1, $id_evento, PDO::PARAM_INT); 
          $inserted_coordenadas->bindParam(2, $nombres, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(3, $id_usuario, PDO::PARAM_INT);
          $inserted_coordenadas->bindParam(4, $rango, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(5, $experiencia, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(6, $url_photo, PDO::PARAM_STR);
          $inserted_coordenadas->bindParam(7, $equipo, PDO::PARAM_STR);
          $inserted_coordenadas->execute();
          */

          $json['success'][] = 'Apuntado'; //sale entre corchetes y comillas, arreglarlo
          echo json_encode($json);
          //mysqli_close($this -> conexion); // buscar otra forma de cerrar la conexion, y si es necesario aqui
    }
    

    
}

?>