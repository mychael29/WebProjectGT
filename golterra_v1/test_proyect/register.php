<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Incidencias de averías masivas</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<link href="signin.css" rel="stylesheet">

</head>

<body>

<?php include('models/services/usuario_new.php') ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">Incidencias de Averías Masivas</a> </div>

    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
     
      <ul class="nav navbar-nav">
        <li class=""><a href="views/registrar_view.php">Generar Reporte<span class="sr-only">(current)</span></a></li>
        <li class=""><a href="reporte_averias.php">Historial de Averias<span class="sr-only">(current)</span></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right" >
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-user"></span> <?php 
      
      if(!isset($_SESSION['username'])){
        echo "User";
      }else{
        echo $_SESSION['username'];
      }?> <span class="caret"></span></a>   
        
        <ul class="dropdown-menu">
          
        <?php  if (isset($_SESSION['username'])) : ?>
        <li><a href='#'>Perfil</a></li>
        <li><a href='#'>Historial de Averias</a></li>
        <li role='separator' class='divider'></li>
        <li><a href="index.php?logout='1'">Cerrar Sesión</a></li>
		    <?php endif ?>

        <?php  if (!isset($_SESSION['username'])) : ?>
        <li><a href='login.php'>Iniciar sesión</a></li>
        <li><a href='register.php'>Registrarse</a></li>
		    <?php endif ?>

        </ul>
  
      </li>
      </ul>

    </div>
  </div>
</nav>
<br>
<br>
<div class="container">

<div class="col-sm-3"></div>
        <div class="col-sm-6">
 <form class="form-signin" method="POST" action="register.php">
 <?php include('errors.php'); ?>
  <fieldset>

<br>
<br>
    <div class="control-group">
      <br>
      <div class="controls">
      <?php  if (isset($username)) : ?>
        <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?php echo $username; ?>">
      <?php else : ?>
        <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="">
      <?php endif ?>
        <p class="help-block">Nombre de usuario</p>
      </div>
    </div>
 
    <div class="control-group">
      <br>
      <div class="controls">
      <?php  if (isset($nombres)) : ?>
        <input type="text" id="nombres" name="nombres" placeholder="Nombres" class="form-control" value="<?php echo $nombres; ?>">
      <?php else : ?>
        <input type="text" id="nombres" name="nombres" placeholder="Nombres" class="form-control" value="">
      <?php endif ?>
        <p class="help-block">Nombres</p>
      </div>
    </div>

    <div class="control-group">
      <br>
      <div class="controls">
	  <label for="email" class="sr-only">Email address</label>
      <?php  if (isset($email)) : ?>
        <input type="email" id="email" name="email" placeholder="Email Address" class="form-control" value="<?php echo $email; ?>">
      <?php else : ?>
        <input type="email" id="email" name="email" placeholder="Email Address" class="form-control" value="">
      <?php endif ?>

        <p class="help-block">Correo electrónico</p>
      </div>
    </div>
 
    <div class="control-group">
      <br>
      <div class="controls">
        <input type="password" id="password_1" name="password_1" placeholder="Password" class="form-control">
        <p class="help-block">Contraseña</p>
      </div>
    </div>
 
    <div class="control-group">
      <br>
      <div class="controls">
        <input type="password" id="password_2" name="password_2" placeholder="Password (Confirm)" class="form-control">
        <p class="help-block">Confirmar la contraseña</p>
      </div>
    </div>
 
    <div class="control-group">
      <div class="controls">
        <button class="btn btn-success" name="reg_user" type="submit">Registrar</button>
      </div>
	  </div>
	
  </fieldset>
 </form>
</div>
<div class="col-sm-3"></div>
   
</div>

<hr>

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      <p>Maycol Meza Roque.</p>
      </div>
    </div>
  </div>
</footer>

<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>

</body>

</html>
