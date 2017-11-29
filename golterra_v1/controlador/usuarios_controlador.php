<?php

require_once('modelo\usuarios_modelo.php');

$usuario = new Usuarios_modelo();
$matrizUsuario = $usuario->get_usuarios();

require_once('vista\usuarios_view.php');

?>