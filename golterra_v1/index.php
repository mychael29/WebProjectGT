<?php 
require('../vendor/autoload.php');
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



<script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,SI:p.setImmediate,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1044.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script>




<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Proyecto MySQL-Android</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/cssinfoprofile.css">


<style> .profile-header{ background: #1e282f url(http://cdn.smitegu.ru/assets/img/bg/tierlist.png); padding: 15px 0; color: #bdbdbd; background-size:cover; } .profile-icon{ display: inline-block; vertical-align: top; position: relative; } .profile-icon img{ width: 80px; border-radius: 4px; } .profile-icon .level{ position: absolute; bottom: 0; right: 0; color: #000; border-radius: 4px; padding: 0 3px; background: #FFF; font-size: 12px; font-weight: 600; } .profile-header h1{ display: inline-block; vertical-align: top; margin: 13px 5px; } .profile-header-stat{ float: right; text-transform: uppercase; text-align: center; margin-top: 9px; margin-left: 25px; color: #777; } .profile-header-stat strong{ display: block; font-size: 25px; color: #bdbdbd; } .profile-main{ margin-top: 10px; margin-bottom: 10px; } .queue-header{ position: relative; overflow: hidden; clear: both; background: #495a63; padding-bottom: 10px; } /** Flexbox Container **/ .flex-container{ margin-right: auto; margin-left: auto; padding-left: 15px; padding-right: 15px; } @media (min-width: 1200px){ .flex-container { width: 1170px; } } .queue-selector{ text-align: center; } .queue-selector button{ margin-top: 5px; } a.btn.btn-pagination.active { background: #2f88a0; border: 2px solid #2f88a0; } </style>  <style> a.sponsored:hover{ background: #63478c !important; } </style> <script> var script = document.createElement('script'); var tstamp = new Date(); script.id = 'factorem'; script.src = '//cdm.cursecdn.com/js/smite/cdmfactorem_min.js?misc=' + tstamp.getTime(); script.async = false; script.type='text/javascript'; document.head.appendChild(script); </script>


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
        echo $_SESSION['username']; 
      }?> <span class="caret"></span></a>
        
        <ul class="dropdown-menu">
          
        <?php  if (isset($_SESSION['username'])) : ?>

        <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="http://placehold.it/120x120"
                                                                alt="Alternate Text" class="img-responsive" />
                                                            <p class="text-center small">
                                                                <a href="#">Change Photo</a></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span>Bhaumik Patel</span>
                                                            <p class="text-muted small">
                                                                mail@gmail.com</p>
                                                            <div class="divider">
                                                            </div>
                                                            <a href='vista/user_profile.php' class="btn btn-primary btn-sm active">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="#" class="btn btn-default btn-sm">Change Passowrd</a>
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
        <li><a href='login.php'>Iniciar sesión</a></li>
        <li><a href='register.php'>Registrarse</a></li>
		    <?php endif ?>
        </ul>
      </li>
      </ul>

<form class="navbar-form navbar-right" role="search">
      <form method="post" class="nav-search"> 
        <div class="input-group"> 
          <input id="nav-search-box" type="text" class="form-control" placeholder="Search Player..."> 
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
<br>
<br>
<nav class="header-nav"> 
<div class="container"> 
<div class="header-nav-mobile"> 
<div class="nav-toolbar"> 
<ul class="nav-icons">  
<li> <a href="http://smite.guru/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a> </li>  </ul>
 <form method="post" class="nav-search"> 
 <div class="input-group"> 
 <input id="nav-search-box" type="text" class="form-control" placeholder="Search Player..."> 
 <span class="input-group-btn"> <button class="btn search-btn" type="submit"> <i class="glyphicon glyphicon-search"></i> </button> </span> </div> 
 </form> 
 </div> 
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
 <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
  <span class="icon-bar"></span> <span class="icon-bar"></span> </button> </div>
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
 <li><a href="http://smite.guru/builds">Builds</a></li>
  <li><a href="http://smite.guru/items">Items</a></li>
   <li><a href="http://smite.guru/tierlists">Tierlists</a></li> <li><a href="http://smite.guru/leaderboards/pc">Leaderboards</a></li> <li><a id="nav-giveaway" href="http://smite.guru/giveaway">Giveaway</a></li> <li> <a href="https://uproar.gg/aff/smiteguru" class="sponsored" style=" background: #704ea0; margin-top: 10px; border-radius: 5px; color: #fff; padding: 0;"> <div style="border-right: 1px solid #8c63c7;display: inline-block;padding: 5px 10px;"> <img src="./MichaelJared&#39;s Profile - SmiteGuru_files/uproar.png" style="height: 20px;"> </div> <span style="font-family: &#39;Open Sans&#39;, sans-serif;text-transform: none;font-weight: 600;letter-spacing: normal;font-size: 14px;margin: 0 10px 0px 5px;vertical-align: middle;">Play for Prizes</span> </a> </li> </ul> </div> </div> </nav>
<br>
<br>

<section class="profile-header"> 
<div class="container"> 
<div class="profile-icon"> 
<img src="./MichaelJared&#39;s Profile - SmiteGuru_files/1.png"> 
<div class="level">111</div> </div> <h1>MichaelJared <br><small>Anime and Weed</small></h1>
 <div class="profile-header-stat"> <strong>44</strong> Mastery </div> <div class="profile-header-stat"> <strong>pc</strong> Platform </div> </div> 
 </section> 
 <section class="sub-nav"> <div class="container"> <div class="sub-nav-mobile">   <div style="float: right; margin-top: 8px;" aria-label="...">
  <a class="btn btn-pagination active" href="http://smite.guru/profile/pc/MichaelJared/ranked?season=6">S4 - Fall</a>
  <a class="btn btn-pagination " href="http://smite.guru/profile/pc/MichaelJared/ranked?season=5">S4 - Summer</a> 
  <a class="btn btn-pagination " href="http://smite.guru/profile/pc/MichaelJared/ranked?season=4">S4 - Spring</a>
   <a class="btn btn-pagination " href="http://smite.guru/profile/pc/MichaelJared/ranked?season=3">Season 3</a> </div>   
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#profile-nav" aria-expanded="false"> 
   <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> </div> 
   
   <div class="collapse navbar-collapse" id="profile-nav"> 
   <ul class="nav navbar-nav"> 
   <li> <a href="http://smite.guru/profile/pc/MichaelJared">Summary</a> </li> 
   <li class="active"> <a href="http://smite.guru/profile/pc/MichaelJared/ranked">Ranked</a> </li> 
   <li> <a href="http://smite.guru/profile/pc/MichaelJared/casual">Casual</a> </li>
    <li> <a href="http://smite.guru/profile/pc/MichaelJared/gods">Gods</a> </li> 
    <li> <a href="http://smite.guru/profile/pc/MichaelJared/matches">Matches</a> 
    </li> </ul> </div> </div> 
</section>



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