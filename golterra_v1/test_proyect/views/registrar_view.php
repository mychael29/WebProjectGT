
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
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/cssinfoprofile.css">
</head>

<body>
<br>
<br>
<br>
<br>
<?php require('../models/services/averia_new.php'); ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
   
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="../index.php">Incidencias de Averías Masivas</a> </div>

    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
     
      <ul class="nav navbar-nav">
        <li class="active"><a href="registrar_view.php">Generar Reporte<span class="sr-only">(current)</span></a></li>
        <li class=""><a href="../reporte_averias.php">Historial de Averias<span class="sr-only">(current)</span></a></li>
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
        <li><a href='../reporte_averias.php'>Historial de Averias</a></li>
        <li role='separator' class='divider'></li>
        <li><a href="../index.php?logout='1'">Cerrar Sesión</a></li>
		    <?php endif ?>

        <?php  if (!isset($_SESSION['username'])) : ?>
        <li><a href='../login.php'>Iniciar sesión</a></li>
        <li><a href='../register.php'>Registrarse</a></li>
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
      <div class="col-sm-3"></div>
        <div class="col-sm-6">
        

<form class="form-horizontal" method="POST" action="registrar_view.php">
  <fieldset>

    <div class="form-group">
    <label class="col-sm-2 control-label">Zona</label>
    <div class="col-sm-10">
      <input class="form-control" id="zona" name="zona" type="text" value="Zona">
    </div>
  </div>
 
  <div class="form-group">
    <label class="col-sm-2 control-label">Motivo</label>
    <div class="col-sm-10">
      <input class="form-control" id="motivo" name="motivo" type="text" value="Motivo">
    </div>
  </div>
  <div class="radio">
  <label ><input type="radio" name="optradio" value="En espera">En espera</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio" value="En proceso" >En proceso</label>
</div>
<div class="radio disabled">
  <label><input type="radio" name="optradio" disabled>Finalizado</label>
</div>

<br>

  <div class="form-group">
  <label for="comment">Detalles:</label>
  <textarea class="form-control" rows="3" id="detalles"></textarea>
</div>
<br>

<br>

<p><button class="btn btn-primary btn-lg" name="reg_averia" type="submit">Registrar Averia</abutton></p>
	
  </fieldset>
 </form>

        </div>

        <div class="col-sm-3"></div>
      </div>
    </div>
  
</section>

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

<script src="../js/jquery-1.11.3.min.js"></script> 
<script src="../js/bootstrap.js"></script>
</body>
</html>