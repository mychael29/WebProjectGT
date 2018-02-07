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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cssinfoprofile.css">
    <!-- Custom CSS -->
    <link href="../css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container"> 
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="../index.php">Mi Proyecto</a> </div>
  
      <div class="collapse navbar-collapse" id="myDefaultNavbar1">
       
        <ul class="nav navbar-nav">
          <li class="active"><a href="../index.php">Que hace Mi Proyecto<span class="sr-only">(current)</span></a></li>
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
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                  
        
                    <a href="store_articulo.php" class="list-group-item active">Category 1</a>
                    <a href="store_articulo.php" class="list-group-item">Category 2</a>
                    <a href="store_articulo.php" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">$24.99</h4>
                        <h4><a href="#">Product Name</a>
                        </h4>
                        <p>See more snippets like these online store reviews at <a target="_blank" href="http://bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                        <p>Want to make these reviews work? Check out
                            <strong><a href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this building a review system tutorial</a>
                            </strong>over at maxoffsky.com!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Maycol Meza Roque</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
