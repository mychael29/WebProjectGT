<?php 
require 'sesion_register.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Proyecto MySQL-Android</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<link href="signin.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">GOL...</a> </div>
    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
     
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Que hace Gol...<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Video</a></li>
        <li><a href="vista/store_index.php">Tienda</a></li>
        <li class="dropdown"></span><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Mas <span class="caret"></span></a>
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
        <li><a href='#'>Perfil</a></li>
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
<div class="container">

 <form class="form-signin" method="post" action="register.php">
 <?php include('errors.php'); ?>
  <fieldset>
    <h3 class="form-signin-heading">Registro</h3>
    <div class="control-group">
      <!-- Username -->
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?php echo $username; ?>">
        <p class="help-block">El nombre de usuario puede contener letras o números, sin espacios</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <br>
      <div class="controls">
	  <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" placeholder="Email Address" class="form-control" value="<?php echo $email; ?>">
        <p class="help-block">Por favor ingrese su correo electrónico</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <br>
      <div class="controls">
        <input type="password" id="password" name="password_1" placeholder="Password" class="form-control">
        <p class="help-block">La contraseña debe tener al menos 4 caracteres</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <br>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_2" placeholder="Password (Confirm)" class="form-control">
        <p class="help-block">Por favor confirma la contraseña</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" name="reg_user">Registrar</button>
      </div>
	  </div>
	
	 <p>Ya eres usuario? <a href="login.php">Ingresa</a></p>
  </fieldset>
 </form>
 
 
</div>



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
