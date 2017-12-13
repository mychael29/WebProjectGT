<?php 
	session_start(); 
    
        if (!isset($_SESSION['username'])) {
            $_SESSION['msg'] = "Debes iniciar sesión primero";
            header('location: ../login.php');
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
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/cssinfoprofile.css">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="../index.php">GOL...</a> </div>
    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
     
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Que hace Gol...<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Video</a></li>
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
                                                                alt="Alternate Text" class="img-responsive" />
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
        <li><a href="login.php">Iniciar sesión</a></li>
        <li><a href="register.php">Registrarse</a></li>
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
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
        <h1><?echo $_SESSION['username']['nombres']?><br><small>Region no definido</small></h1>         
<br>

<nav class="header-nav"> 
<div class="container"> 
<div class="header-nav-mobile"> 

   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
   <ul class="nav navbar-nav">
       <li><a href="">Información</a></li>
       <li><a href="">Casual</a></li>
       <li><a href="">Ranked</a></li> 
       <li><a href="">Torneos</a></li> 
   </ul> 
</div> 
</div> 
</nav>









        </div>
      <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle responsive" src="<?php echo 'https://arcane-ravine-59770.herokuapp.com/json/' . $_SESSION['username']['photo']; ?>"></a>
      
        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Se unio</strong></span> 10/11/2017</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Ultima vez visto</strong></span> No definido</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Nombre real</strong></span> Maycol Meza Roque</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong class="">Rol principal: </strong></span> Arquero
               
                      </li>
            </ul>
           
            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                </div>
                <div class="panel-body"><a href="https://www.facebook.com/mychael29" class="">facebook.com/mychael29</a>

                </div>
            </div>
          
            <ul class="list-group">
                <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Comparte</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Publicaciones</strong></span> 37</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Seguidores</strong></span> 78</li>
            </ul>
         
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
            <div class="panel panel-default">
                <div class="panel-heading">Nombre / username del usuario</div>
                <div class="panel-body"> Descripción sobre mí.

                </div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">Ultimos partidos jugados</div>
                <div class="panel-body">
                  <div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="">
						<div class="caption">
							<h3>
								Titulo
							</h3>
							<p>
								Descripcion.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="">
						<div class="caption">
							<h3>
								Titulo
							</h3>
							<p>
								Descripcion.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="">
						<div class="caption">
							<h3>
								Titulo
							</h3>
							<p>
								Descripcion.
							</p>
							<p>
							
							</p>
						</div>
                </div>
                 
            </div>
                     
            </div>
                 
        </div>
              
    </div>
   </div>

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

<script src="../js/jquery-1.11.3.min.js"></script> 
<script src="../js/bootstrap.js"></script>

</body>
</html>