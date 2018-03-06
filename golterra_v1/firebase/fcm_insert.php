<?php
require "init.php";
$fcm_token = $_POST["fcm_token"];
$sql = "INSERT INTO token_firebase VALUES('".$fcm_token."');";
mysqli_query($con,$sql);
mysqli_close($con);
?>