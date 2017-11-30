<?php

session_start();

$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

include($_SERVER['HTTP_HOST'] . 'modelo/conectar.php') ;

?>

