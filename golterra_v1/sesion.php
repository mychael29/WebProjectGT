<?php

session_start();

$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

require($server . "/modelo/conectar.php");

?>

