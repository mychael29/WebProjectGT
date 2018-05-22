<?php
include('../db/averias_db.php');

//$averias=array();
//$consulta=$conexion->query("SELECT * FROM averias LIMIT $empezar_desde, $tamagno_paginas");
      
//while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){   
  //  $averias[]=$filas;
//}
$tamagno_paginas=18;
  
if(isset($_GET["pagina"])){
    
    if ($_GET["pagina"]==1){
        
        header("Location:index_users.php"); // CORREGIR Y VALIDAR
        
    }else{
        
        $pagina=$_GET["pagina"];
        
    }
    
}else{
    
    $pagina=1;
}
$empezar_desde=($pagina-1)*$tamagno_paginas;
//$sql_total="SELECT username, email, nombres FROM usuarios";
//$resultado=$conexion->prepare($sql_total);
//$resultado->execute(array());
$num_filas=Averias::cantFilas();
$total_paginas=ceil($num_filas/$tamagno_paginas);
$averias_all = Averias::getAll();

?>