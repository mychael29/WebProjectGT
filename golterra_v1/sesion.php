<?php

session_start();

$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

require_once($server . "/modelo/conectar.php");

?>

