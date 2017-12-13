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
		header("location: index.php");
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
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/cssinfoprofile.css">


</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">GOL...</a> </div>

    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
  
      <ul class="nav navbar-nav">
        <li><a href="#">Que hace Gol...<span class="sr-only">(current)</span></a></li>
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



<!--
        <li><a href='vista/user_profile.php'>Perfil</a></li>
        <li><a href='#'>Rendimiento</a></li>
        <li><a href='#'>Historial de partidos</a></li>
        <li role='separator' class='divider'></li>
        <li><a href='#'>Ajustes</a></li>
        <li><a href="index.php?logout='1'">Cerrar Sesión</a></li>-->
		    <?php endif ?>

        <?php  if (!isset($_SESSION['username'])) : ?>
        <li><a href="login.php">Iniciar sesión</a></li>
        <li><a href="register.php">Registrarse</a></li>
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


<section>
 
  <div class="jumbotron text-center">
   
    <div class="container">
      <div class="row">
        <div class="col-xs12">
          <h1>Promover nuevos talentos.</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, deleniti, ea nisi suscipit atque tempore aspernatur harum unde veritatis neque rem dolores assumenda. Recusandae facilis dolores cum iste assumenda accusamus.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        </div>
      </div>
    </div>
   
  </div>
  
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <h1>Actividades futbolisticas</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, magni, doloribus, possimus eum sapiente deleniti doloremque fugit ut expedita molestiae iusto debitis eveniet modi obcaecati ipsam quos quis labore dicta.</p>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container well">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object" src="images/jugadores_destacados.gif" alt="..."> </a> </div>
          <div class="media-body">
            <h2 class="media-heading">Jugadores destacados</h2>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object" src="images/cancha_deportivas.gif" alt="..."> </a> </div>
          <div class="media-body">
            <h2 class="media-heading">Canchas deportivas</h2>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object" src="images/torneos.gif" alt="..."></a></div>
          <div class="media-body">
            <h2 class="media-heading">Torneos auspiciados</h2>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>

<div class="container">
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Golterra Store</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, et, placeat !</p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

 </<div class="container">
    </section>   
<section>
	<div class="container">
		<div class="row">
        	<div class="col-lg-12 text-center">
            	<h2>Torneos Activos</h2>
            	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, et, placeat !</p>
            </div>
          </div>

        <div class="row">
        	<div class="col-md-3 text-center col-sm-6 col-xs-6"><img src="images/200x200.gif" alt=""></div>
        	<div class="col-md-3 text-center col-sm-6 col-xs-6"><img src="images/200x200.gif" alt=""></div>
			<div class="col-md-3 text-center col-sm-6 col-xs-6 hidden-xs hidden-sm"><img src="images/200x200.gif" alt=""></div>
        	<div class="col-md-3 text-center col-sm-6 col-xs-6 hidden-xs hidden-sm"><img src="images/200x200.gif" alt=""></div>
      </div>
      <hr>
        <div class="row">
          <div class="col-md-3 text-center col-sm-6 col-xs-6"><img src="images/200x200.gif" alt=""></div>
          <div class="col-md-3 text-center col-sm-6 col-xs-6"><img src="images/200x200.gif" alt=""></div>
          <div class="col-md-3 text-center col-sm-6 col-xs-6 hidden-xs hidden-sm"><img src="images/200x200.gif" alt=""></div>
          <div class="col-md-3 text-center col-sm-6 col-xs-6 hidden-xs hidden-sm"><img src="images/200x200.gif" alt=""></div>
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