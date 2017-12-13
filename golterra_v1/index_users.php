<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Debes iniciar sesión primero";
		header('location: login.php');
	}

  /*
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
  */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Proyecto MySQL-Android</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container"> 
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="index.php">GOL...</a> </div>
  <div class="collapse navbar-collapse" id="myDefaultNavbar1">
    <ul class="nav navbar-nav">
    <li class=""><a href="#">Que hace Gol...<span class="sr-only">(current)</span></a></li>
    <li><a href="#">Video</a></li>
    <li><a href="vista/store_index.php">Tienda</a></li>
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Mas <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Administrador</a></li>
        <li><a href="#">Organizador</a></li>
        <li><a href="index_users.php">Jugadores</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Reglas</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Ayuda</a></li>
      </ul>
    </li>
    </ul>

    <ul class="nav navbar-nav navbar-right" >
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-user"></span> <?php 
      
      if(!isset($_SESSION['username'])){
        echo "Jugador";
      }else{
        echo $_SESSION['username']; 
      }?> <span class="caret"></span></a>
        
        <ul class="dropdown-menu">
          
        <?php  if (isset($_SESSION['username'])) : ?>
        <li><a href='vista/user_profile.php'>Perfil</a></li>
        <li><a href='#'>Rendimiento</a></li>
        <li><a href='#'>Historial de partidos</a></li>
        <li role='separator' class='divider'></li>
        <li><a href='#'>Ajustes</a></li>
        <li><a href="index.php?logout='1'">Cerrar Sesión</a></li>
		    <?php endif ?>

        <?php  if (!isset($_SESSION['username'])) : ?>
        <li><a href='login.php'>Iniciar sesión</a></li>
        <li><a href='register.php'>Registrarse</a></li>
		    <?php endif ?>

        </ul>
  
      </li>
      </ul>

      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
</div>
</div>
</nav>
<br>
<br>
<br>
<br>
<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
      
      <?php
      
      require_once("../config.php");
      try{
        $conexion = new PDO($host,$usernameserver,$passwordserver);
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion -> exec("SET CHARACTER SET UTF8");
      }catch(Exception $e){
        die("Error " . $e->getMessage());
        echo "Linea del error " . $e->getLine();
      }
      $usuarios=array();
      
      require("paginacion.php");
      
      $consulta=$conexion->query("SELECT * FROM usuarios LIMIT $empezar_desde, $tamagno_paginas");
      
      while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
        
        $usuarios[]=$filas;
      }
      
      $matrizUsuario = $usuarios;
      
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
		foreach($matrizUsuario as $persona):?>
   
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





      </div>
    </div>
  </div>
</section>

<hr>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>Lorem ipsum dolor sit amet</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, magni, doloribus, possimus eum sapiente deleniti doloremque fugit ut expedita molestiae iusto debitis eveniet modi obcaecati ipsam quos quis labore dicta.</p>
		<button type="button" class="btn btn-success">Get in touch</button>
      </div>
    </div>
  </div>
</section>
<hr>
<div class="section well">
<div class="container">
   <div class="row">
<div class="col-lg-4 col-md-4">
        <h3 class="text-center">WHO WE ARE</h3>
        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, ducimus, sit, quibusdam quidem recusandae veniam eos quod error nisi repellat excepturi laboriosam aspernatur suscipit possimus consectetur dolores nihil labore quas eius illo accusamus nulla sed blanditiis porro accusantium. Perspiciatis, perferendis!</h5>
    </div>
<div class="col-lg-4 col-md-4">
  <h3 class="text-center">GET IN TOUCH</h3>
      <address class="text-center">
<strong>Gol... , Inc.</strong><br>
Lima Metropolitana, Santa Anita,<br>
11111-1111, PERÚ<br>
<abbr title="Phone">P:</abbr> (51) 111-1111
</address>
</div>
<div class="col-lg-4 col-md-4">
  <h3 class="text-center">NEWSLETTER</h3>
      <form>
<div class="form-group col-lg-9 col-md-8 col-sm-10 col-xs-10">
<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
</div>
<button type="submit" class="btn btn-default">Subscribe<br>
</button>
</form>
</div>
</div>
</div>
</div>

<footer class="text-center">
<div class="container">
<div class="row">
  <div class="col-xs-12">
    <p>Copyright © Gol... . All rights reserved.</p>
  </div>
</div>
</div>
</footer>

<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>

</body>
</html>