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

if(isset($_POST['photo'])) {
 
    $nombres = $_POST['nombres'];
    $image = $_POST['photo'];

    $path  = "json/image_profile/$nombres.jpg"; 
    $url_image = "image_profile/".$nombres.".jpg";//agregarle el ID al nombre de la imagen
    file_put_contents($path,base64_decode($image));
    //$bytesArchivo=file_get_contents($path);//para guardar la imagen en la tabla de la bbdd
    $query = "UPDATE usuarios SET photo = '$url_image' WHERE nombres = '$nombres'";
    $inserted = $conexion->prepare($query);
    $inserted->execute();

}
?>