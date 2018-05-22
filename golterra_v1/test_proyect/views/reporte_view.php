
<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Debes iniciar sesión primero";
		header('location: ../../login.php');
	}

  /*
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
  */
?>
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
            <!-- table-bordered -->
            <table class="table table-hover" >
                <thead>
                <tr class="active">
                <th class="text-center">Id</th>
                <th>Username</th>
                <th>Detalles</th>
                
                <th>Zona</th>
                <th>Finalizado</th>
                <th>Fecha y Hora</th>
                <th class=""></th>
                <th class=""></th>
                </tr> 
                </thead>
            <?php
                    foreach($averias as $averia):?>
            
                <tr>
                <td><?php echo $averia["id_averia"]?></td>
                <td class="text-left"><?php echo $averia["username"]?></td>
                <td class="text-left"><?php echo $averia["description"]?></td>
               
                <td class="text-left"><?php echo $averia["zona"]?></td>
                <td class="text-left"><?php 
                if(empty($averia["estado"])){
                    echo "NO";
                }else{
                    if($averia["finalizado"]=="no imagen"){ // CORREGIR
                    echo "NO";
                    }else{
                    echo "SI";
                    }
                }?></td>
                <td class="text-left"><?php echo $averia["fecha_hora"]?></td>
                <td class=""><a name='del' id='del' value='Borrar' href="modelo/borrar.php?Id=<?php echo $averia["iduser_"]?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                <td class=""><a name='up' id='up' value='Actualizar' href="vista/editar.php?Id=<?php echo $averia["iduser_"]?> & username=<?php echo $averia["username"]?> & email=<?php echo $averia["email"]?> & nombres=<?php echo $averia["nombres"]?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                </tr>
                
                <?php 
                endforeach;
            ?>
            <!--  insertar datos a la base de datos       
                <tr>
                    <td></td>
                <td><input type='text' name='Nom' size='10' class='centrado'></td>
                <td><input type='text' name='Ape' size='10' class='centrado'></td>
                <td><input type='text' name='Email' size='10' class='centrado'></td>
                <td><button type='submit' name='cr' id='cr' value='Insertar'class="btn btn-success">Insertar</button></td>
            </tr>
            -->
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

<hr>

<footer class="text-center">
<div class="container">
<div class="row">
  <div class="col-xs-12">
    <p>Copyright © Maycol Meza Roque.</p>
  </div>
</div>
</div>
</footer>

<script src="../js/jquery-1.11.3.min.js"></script> 
<script src="../js/bootstrap.js"></script>
</body>
</html>