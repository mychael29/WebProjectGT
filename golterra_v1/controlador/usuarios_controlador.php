<?php

require('..\modelo\usuarios_modelo.php');

$usuario = new Usuarios_modelo();
$matrizUsuario = $usuario->get_usuarios();

include('..\vista\usuarios_view.php');

?>