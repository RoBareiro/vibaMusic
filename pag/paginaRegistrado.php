<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();


?>










<html>
	<head>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!---- animated-css ---->
		<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script type="text/javascript" src="../js/jquery.corner.js"></script> 
		<script src="../js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
		<!---- animated-css ---->
		<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="../js/move-top.js"></script>
		<script type="text/javascript" src="../js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!---- start-smoth-scrolling---->
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
	<title>Viba Music!</title>
	</head>

<body>
		<div class="bg">
		<!----- start-header---->
		<div class="container">
			<div id="home" class="header wow bounceInDown" data-wow-delay="0.4s">
					<div class="top-header">
					
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li><a href="indexRegistrado.php">VIBA!</a></li>
								<li><a href="playlists.php">Playlists</a></li>
								<li><a href="usuario.php">Usuario</a></li>
								<li><a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></li>
								<li><?PHP echo "<div style= 'color: #FFF;
												padding: 0.84em 3.0804em;
												background: rgba(166, 203, 163, 0.55);
												font-size: 1.20em;
												text-align: center;
												text-transform: uppercase;
												position: relative'>
												HOLA
												".$_SESSION["usuario"]."</div>" ?>
								</li>
							</ul>
							<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!--BUSCADOR-->
					</br>
					<div class="wow fadeIn buscador">
					<form name="buscador" method="POST" action="../inc/buscador.php">
					<font style="color: white; margin-left:60%">NOMBRE DE PLAYLIST</font>
						<input type="text" name="palabra" required>
						<input class="botonBuscador" type="submit" value="Buscar" name="buscar">
					</form>
					</div>
				<!--BUSCADOR-->
		</div>
			<!----- //End-header---->
		
			<!---- banner-info ---->
			<div class="banner-info">
				<div class="container">
				</br>
							<div class="inicioRegistrado">
							</br>
								Una experiencia <div style="color: #77FF6B;">&Uacute;NICA!</div></br> Aca vas a encontrar toda
								la m&uacute;sica que quer&eacute;s escuchar para cada momento,</br> cada estado de &aacute;nimo...
								Lo que se te ocurra para musicalizar tus momentos!</br></br> Nuestra prioridad es</br><div style="color: #77FF6B;">HACERTE VOLAR UNOS CUANTOS MINUTOS O... UNAS CUANTAS HORAS!</div>
								</br></br>
								<img src="../images/dj.gif"></img></br></br>
								Tenemos todas las playlist que te imagines.</br>
								Pod&eacute;s interactuar con otras Playlist, escucharlas y si te gustan, seguirlas!!
								</br></br> Empez&aacute; a explorar la p&aacute;gina, investig&aacute; cada rinc&oacute;n.. Te vas a <div style="color: #77FF6B;">SORPRENDER!</div></br>
							</div>
				</br>
				</div>
			</div>
			
			<div class="clearfix"> </div>
			
			<!---- footer info ---->
				<div class="wow bounceInUp">
					<div class="wow bounceIn vibalogo"><img src="..\images\vibalogo.jpg"></img></div>
					
					<div class="wow bounceIn logot"><a href="https://www.facebook.com/vibamusic"><img src="..\images\logofb.jpg" width="60" height="60"><h2>FACEBOOK</h2></a></div>
					
					<div class="wow bounceIn logot"><a href="https://youtube.com/vibamusic"><img src="..\images\logoyt.jpg" width="60" height="60"><h2>YOUTUBE</h2></a></div>

					<div class="wow bounceIn logot"><a href="https://www.twitter.com/vibamusic"><img src="..\images\logot.jpg" width="60" height="60"><h2>TWITTER</h2></a></div>

					<div class="wow bounceIn logot"><a href="https://es.pinterest.com/vibamusic"><img src="..\images\logop.jpg" width="60" height="60"><h2>PINTEREST</h2></a></div>
				</div>
				
		</div>
	</body>	
</html>