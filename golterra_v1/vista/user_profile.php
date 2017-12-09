<?php 
	session_start(); 
    
        if (!isset($_SESSION['username'])) {
            $_SESSION['msg'] = "You must log in first";
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
        echo $_SESSION['username']; 
      }?> <span class="caret"></span></a>
        
        <ul class="dropdown-menu">
          
        <?php  if (isset($_SESSION['username'])) : ?>
        <li><a href='user_profile.php'>Perfil</a></li>
        <li><a href='#'>Rendimiento</a></li>
        <li><a href='#'>Historial de partidos</a></li>
        <li role='separator' class='divider'></li>
        <li><a href='#'>Ajustes</a></li>
        <li><a href="../index.php?logout='1'">Cerrar Sesión</a></li>
		    <?php endif ?>

        <?php  if (!isset($_SESSION['username'])) : ?>
        <li><a href='../login.php'>Iniciar sesión</a></li>
        <li><a href='../register.php'>Registrarse</a></li>
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
        <h1>MichaelJared <br><small>Perú Lima</small></h1>
         
<br>

<nav class="header-nav"> 
<div class="container"> 
<div class="header-nav-mobile"> 

   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
 <li><a href="http://smite.guru/builds">Información</a></li>
  <li><a href="http://smite.guru/items">Casual</a></li>
   <li><a href="http://smite.guru/tierlists">Ranked</a></li> 
   <li><a href="http://smite.guru/leaderboards/pc">Torneos</a></li>   </ul> 
   </div> </div> </nav>









        </div>
      <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.rlsandbox.com/img/profile.jpg"></a>

        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Joined</strong></span> 2.13.2014</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Last seen</strong></span> Yesterday</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span> Joseph
                        Doe</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong class="">Role: </strong></span> Pet Sitter
               
                      </li>
            </ul>
           <div class="panel panel-default">
             <div class="panel-heading">Insured / Bonded?

                </div>
                <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i> Yes, I am insured and bonded.

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                </div>
                <div class="panel-body"><a href="http://bootply.com" class="">bootply.com</a>

                </div>
            </div>
          
            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Posts</strong></span> 37</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Followers</strong></span> 78</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">	<i class="fa fa-facebook fa-2x"></i>  <i class="fa fa-github fa-2x"></i> 
                    <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i>  <i class="fa fa-google-plus fa-2x"></i>

                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
            <div class="panel panel-default">
                <div class="panel-heading">Starfox221's Bio</div>
                <div class="panel-body"> A long description about me.

                </div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">Pets I Own</div>
                <div class="panel-body">
                  <div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/people">
						<div class="caption">
							<h3>
								Rover
							</h3>
							<p>
								Cocker Spaniel who loves treats.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/city">
						<div class="caption">
							<h3>
								Marmaduke
							</h3>
							<p>
								Is just another friendly dog.
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/sports">
						<div class="caption">
							<h3>
								Rocky
							</h3>
							<p>
								Loves catnip and naps. Not fond of children.
							</p>
							<p>
							
							</p>
						</div>
                </div>
                 
            </div>
                     
            </div>
                 
        </div>
              
    </div>
           <div class="panel panel-default">
                <div class="panel-heading">Starfox221's Bio</div>
                <div class="panel-body"> A long description about me.

                </div>
</div></div>

    <div id="push"></div>
        </div>
        <footer id="footer">
            <div class="row-fluid">
                <div class="span3">
                    <p> 
                        <a href="http://twitter.com/Bootply" rel="nofollow" title="Bootply on Twitter" target="ext">Twitter</a><br>
                        <a href="https://plus.google.com/+Bootply" rel="publisher">Google+</a><br>
                        <a href="http://facebook.com/Bootply" rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>
                        <a href="https://github.com/iatek/bootply" title="Bootply on GitHub" target="ext">GitHub</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p> 
                        <a data-toggle="modal" role="button" href="#contactModal">Contact Us</a><br>
                        <a href="/tags">Tags</a><br>
                        <a href="/bootstrap-community">Community</a><br>
                        <a href="/upgrade">Upgrade</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p> 
                        <a href="http://www.bootbundle.com" target="ext" rel="nofollow">BootBundle</a><br>
                        <a href="https://bootstrapbay.com/?ref=skelly" target="_ext" rel="nofollow" title="Premium Bootstrap themes">Bootstrap Themes</a><br>
                        <a href="http://www.bootstrapzero.com" target="_ext" rel="nofollow" title="Free Bootstrap templates">BootstrapZero</a><br>
                        <a href="http://upgrade-bootstrap.bootply.com/">2.x Upgrade Tool</a><br>
                    </p>
                </div>
                <div class="span3">
                    <span class="pull-right">©Copyright 2013-2014 <a href="/" title="The Bootstrap Playground">Bootply</a> | <a href="/about#privacy">Privacy</a></span>
                </div>
            </div>
        </footer>




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