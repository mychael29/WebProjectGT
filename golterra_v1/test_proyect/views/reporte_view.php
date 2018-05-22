

<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Incidencias de averías masivas</title>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/cssinfoprofile.css">
</head>

<body>

<br>

<section>
    <div class="container">

      <div class="row">
        <div class="col-xs12 text-center">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="container">
            
            <table class="table table-hover" >
                <thead>
                <tr class="active">
                <th class="text-center">ID Averia</th>
                <th>Zona</th>
                <th>Motivo</th>
                <th>Finalizado</th>
                <th>Usuario</th>
                <th>Fecha y Hora</th>
                <th class=""></th>
                <th class=""></th>
                </tr> 
                </thead>
            <?php
                    foreach($matriz_averias as $averia):?>
            
                <tr>
                <td><?php echo $averia["id_averia"]?></td>
               
                <td class="text-left"><?php echo $averia["zona"]?></td>
                <td class="text-left"><?php echo $averia["motivo"]?></td>
                <td class="text-left"><?php 
                if(empty($averia["estado"])){
                    echo "NO";
                }else{
                    if($averia["estado"]!="Finalizado"){ 
                    echo "NO";
                    }else{
                    echo "SI";
                    }
                }?></td>
                <td class="text-left"><?php echo $averia["username"]?></td>
                <td class="text-left"><?php echo $averia["fecha_hora"]?></td>
                
                <td class=""><a name='del' id='del' value='Borrar' href="models/db/delete_averia.php?Id=<?php echo $averia["id_averia"]?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                <td class=""><a name='up' id='up' value='Actualizar' href="views/editar_view.php?Id=<?php echo $averia["id_averia"]?> & motivo=<?php echo $averia["motivo"]?> & username=<?php echo $averia["username"]?> & zona=<?php echo $averia["zona"]?> & estado=<?php echo $averia["estado"]?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                </tr>
                
                <?php 
                endforeach;
            ?>
   
            </table>
            </div>
            </form>

            <nav>
            <ul class="pagination">

            <?php
            
            //-----------------------------------------paginacion----------------------------------------------//


            if(($pagina - 1) == 0){
                echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
            }else{
                echo "<li class=''><a href='?pagina=" . ($pagina-1) . "'>&laquo;</a></li>";
            }
            
            for($i=1; $i<=$total_paginas; $i++){
                
                if($pagina == $i){
                
                echo "<li class='active' method='get'><a name='num_paginacion' id='num_paginacion' href=''>" . $i . "</a></li>  ";
                }else{

                echo "<li class='' method='POST'><a name='num_paginacion' id='num_paginacion' href='?pagina=" . $i . "'>" . $i . "</a></li>  ";
                }
            }
            if($pagina == $total_paginas){
                echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
            }else{
                echo "<li class=''><a href='?pagina=" . ($pagina+1) . "'>&raquo;</a></li>";
            }

            
            ?>

            </ul>
            </nav>
        </div>
      </div>
    </div>
  
</section>



<script src="../js/jquery-1.11.3.min.js"></script> 
<script src="../js/bootstrap.js"></script>
</body>
</html>