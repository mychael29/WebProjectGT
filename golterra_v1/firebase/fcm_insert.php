<?php
require "init.php";
//$id_usuario = $_POST["fcm_id_user"];
$fcm_token = $_POST["fcm_token"];
$sql = "INSERT INTO token_firebase VALUES('".$fcm_token."');";
mysqli_query($con,$sql);
mysqli_close($con);
?>