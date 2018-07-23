<?php 
  session_start(); 
  /*
  	if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Debes iniciar sesión primero";
    $sesion = 0;
		header("location: login.php");
	}else{
    $sesion = 1;
  }
  */


	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Proyecto MySQL-Android</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/cssinfoprofile.css">


</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="../index.php">Mi Proyecto</a> </div>

    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
  
      <ul class="nav navbar-nav">
        <li><a href="#">Que hace Mi Proyecto<span class="sr-only">(current)</span></a></li>
        <li><a href="informacion.php">Información</a></li>
        <li><a href="store_index.php">Tienda</a></li>
        <li class="dropdown"></span><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Mas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Administrador</a></li>
            <li><a href="#">Organizador</a></li>
            <li><a href="../index_users.php">Jugadores</a></li>
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
                                                            <a href='user_profile.php' class="btn btn-primary btn-sm active">Ver Perfil</a>
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
                                                                <a href="../index.php?logout='1'" class="btn btn-default btn-sm pull-right">Sign Out</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>



<!--
        <li><a href='vista/user_profile.php'>Perfil</a></li>
        <li><a href='#'>Rendimiento</a></li>
        <li><a href='#'>Historial de partidos</a></li>
        <li role='separator' class='divider'></li>
        <li><a href='#'>Ajustes</a></li>
        <li><a href="index.php?logout='1'">Cerrar Sesión</a></li>-->
		    <?php endif ?>

        <?php  if (!isset($_SESSION['username'])) : ?>
        <li><a href="../login.php">Iniciar sesión</a></li>
        <li><a href="../register.php">Registrarse</a></li>
		    <?php endif ?>
        </ul>
      </li>
      </ul>

<form class="navbar-form navbar-right" role="search">
      <form method="post" class="nav-search"> 
        <div class="input-group"> 
           <input id="nav-search-box" type="text" class="form-control" placeholder="Buscar jugador..."> 
             <span class="input-group-btn"> 
               <button class="btn search-btn" type="submit"> <i class="glyphicon glyphicon-search"></i> </button> 
             </span> 
        </div> 
      </form>
</form>
      
    </div>
  </div>
</nav>


<br>
<br>
<br>
</section>
<br>
<br>
<br>
<div class="container">
<br>
<div class="col-lg-6 col-md-6">
        <h3>Proyecto PHP-MySQL-Android</h3>
        <h5>Buenas, este proyecto es para hacer las pruebas del funcionamiento de una App que estoy desarrollando. Esta Web es solo para registrarse e iniciar sesión, y donde hay una lista de los usuarios que se han registrado sea por vía web o por la aplicación móvil, tambien se puede modificar o editar la información de los usuarios, y un perfil simple para el quien inicio sesión. Las demas funciones estan para uso exclusivo de la aplicación móvil, pronto ordenare e implementare mas codigó para la plataforma web, para darle mas funcionalidad y deje de servir de solo prueba.</h5>
        <br>
        <h6>GitHub:<a href="https://github.com/mychael29" target=”_blank”> https://github.com/mychael29</a></h6>
    </div>

</div>
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
<strong>Meza Roque Maycol Jhunior , Inc.</strong><br>
Lima Metropolitana, Santa Anita,<br>
+51 962 786 921, PERÚ<br>
<abbr title="Phone">P:</abbr> (51) ....-....
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
    <p>Copyright © Maycol Meza Roque.</p>
  </div>
</div>
</div>
</footer>

<script src="../js/jquery-1.11.3.min.js"></script> 
<script src="../js/bootstrap.js"></script>
</body>
</html>
