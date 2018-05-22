<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Debes iniciar sesión primero";
		header('location: ../login.php');
	}
?>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Incidencias de averías masivas</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/cssinfoprofile.css">
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">Incidencias de Averías Masivas</a> </div>

    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
      <ul class="nav navbar-nav"><li><a href="#">Reporte<span class="sr-only">(current)</span></a></li></ul>
      <ul class="nav navbar-nav navbar-right" >
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-user"></span> <?php 
      
    if(!isset($_SESSION['username'])){
        echo "Usuario";
    }else{
        if(empty($_SESSION['username']['username'])){
          echo "sin username";
        }else{
          echo $_SESSION['username']['username']; 
        }
    }?> <span class="caret"></span></a>
        
    <ul class="dropdown-menu">
        
    <?php  if (isset($_SESSION['username'])) : ?>
    <li>
        <div class="navbar-content">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo 'https://arcane-ravine-59770.herokuapp.com/json/' . $_SESSION['username']['photo']; ?>"
                        alt="Alternate Text" class="img-responsive img-thumbnail" />
                    <p class="text-center small">
                        <a href="#">Cambiar foto</a></p>
                </div>
                <div class="col-md-7">
                    <span><?php echo $_SESSION['username']['nombres']; ?></span>
                    <p class="text-muted small">
                    <?php echo $_SESSION['username']['email']; ?></p>
                    <div class="divider">
                    </div>
                    <a href='vista/user_profile.php' class="btn btn-primary btn-sm active">Ver Perfil</a>
                </div>
            </div>
        </div>
        <div class="navbar-footer">
            <div class="navbar-footer-content">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-default btn-sm">Cambiar Passowrd</a>
                    </div>
                    <div class="col-md-6">
                        <a href="index.php?logout='1'" class="btn btn-default btn-sm pull-right">Sign Out</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <?php endif ?>
    
    <?php  if (!isset($_SESSION['username'])) : ?>
    <li><a href="login.php">Iniciar sesión</a></li>
    <li><a href="register.php">Registrarse</a></li>
    <?php endif ?>
        
    </ul>
    </li>
    </ul>  
    </div>
  </div>
</nav>

<br>

<section>
    <div class="container">
      <div class="row">
        <div class="col-xs12">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <?php 
        echo "report error1";
        //include('controllers/averias_controller.php');
        echo "report error2"; ?>

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

<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>