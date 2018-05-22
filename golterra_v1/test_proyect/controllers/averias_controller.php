<?php
echo "controllers error1";
require('..\models\services\averias.php');

echo "controllers error2";
$matriz_averias = $averias_all;

require('..\views\reporte_view.php');
?>