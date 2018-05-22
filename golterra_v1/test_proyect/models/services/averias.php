<?php

$tamagno_paginas=18;
  
if(isset($_GET["pagina"])){
    
    if ($_GET["pagina"]==1){
        
        header('Location:reporte_averias.php'); // CORREGIR Y VALIDAR
        
    }else{
        
        $pagina=$_GET["pagina"];
        
    }
    
}else{
    
    $pagina=1;
}
$empezar_desde=($pagina-1)*$tamagno_paginas;

require("models/db/averias_db.php");

$total_paginas=ceil($num_filas/$tamagno_paginas);

?>