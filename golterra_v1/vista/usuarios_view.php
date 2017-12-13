<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?php
include("../modelo/paginacion.php");
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <div class="container">
  <!-- table-bordered -->
  <table class="table table-hover" >
    <thead>
    <tr class="active">
      <th class="text-center">Id</th>
      <th>Username</th>
      <th>E-mail</th>
      <th>Nombre y Apellidos</th>
      <th>Región</th>
      <th>Club Hincha</th>
      <th>Division Liga</th>
      <th class=""></th>
      <th class=""></th>
    </tr> 
    </thead>
   <?php
		foreach($matrizUsuario[] as $persona):?>
   
   	<tr>
      <td><?php echo $persona["iduser_"]?></td>
      <td class="text-left"><?php echo $persona["username"]?></td>
      <td class="text-left"><?php echo $persona["email"]?></td>
      <td class="text-left"><?php echo $persona["nombres"]?></td>
      <td class="text-left">vacio</td>
      <td class="text-left">vacio</td>
      <td class="text-left">vacio</td>
      <td class=""><a name='del' id='del' value='Borrar' href="modelo/borrar.php?Id=<?php echo $persona["iduser_"]?>"><span class="glyphicon glyphicon-trash"></span></a></td>
      <td class=""><a name='up' id='up' value='Actualizar' href="vista/editar.php?Id=<?php echo $persona["iduser_"]?> & username=<?php echo $persona["username"]?> & email=<?php echo $persona["email"]?> & nombres=<?php echo $persona["nombres"]?>"><span class="glyphicon glyphicon-edit"></span></a></td>
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

</body>
</html>