<?php

require('..\modelo\usuarios_modelo.php');

$usuario = new Usuarios_modelo();
$matrizUsuario = $usuario->get_usuarios();

require('..\vista\usuarios_view.php');

?>