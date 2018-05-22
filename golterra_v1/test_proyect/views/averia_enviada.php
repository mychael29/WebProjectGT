
<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Debes iniciar sesión primero";
		header('location: login.php');
	}
?>                                                          
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Incidencias de averías masivas</title>

<link rel="stylesheet" href="../css/bootstrap.css">
<link href="signin.css" rel="stylesheet">

</head>

<body>
<br>
<br>
<br>
<br>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
  
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="../index.php">Incidencias de Averías Masivas</a> </div>

    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
     
      <ul class="nav navbar-nav">
        <li class=""><a href="registrar_view.php">Generar Reporte<span class="sr-only">(current)</span></a></li>
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
<br>
<footer class="text-center">
<div class="container">
<div class="row">
<div class="col-xs-12">
		<span class="glyphicon glyphicon-ok"> </span> 
        <br>
        <br>
        <p>Averia procesada</p>
</div>
</div>
</div>
</footer>
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