<?php
/**
 * Obtiene el detalle de un usuario especificado por
 * su identificador "iduser"
 */
require 'users.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['iduser'])) {
        // Obtener parámetro iduser
        $parametro = $_GET['iduser'];
        // Tratar retorno
        $retorno = Users::getById($parametro);
        if ($retorno) {
            $usuario["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $usuario["usuario"] = $retorno;
            // Enviar objeto json del usuario
            print json_encode($usuario);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}
?>
