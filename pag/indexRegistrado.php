<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	$_SESSION["registrado"] = "true";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Viba Music!</title>
		<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1, text/html; utf-8">
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
	</head>


	<body>
		<div class="bg">
		<!----- start-header---->
		<div class="container">
			<div id="home" class="header wow bounceInDown" data-wow-delay="0.4s">
					<div class="top-header">
						<!--<div class="vibalogo">
							sacamos el home de la barra
						</div>-->
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li class="active-join"><a href="#">VIBA!</a></li>
								<li><a href="playlists.php">Playlists</a></li>
								<li><a href="usuario.php">Usuario</a></li>
								<li class="page-scroll"><a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></li>
								<li><?PHP echo "<div style= 'color: #FFF;
												padding: 0.84em 3.0804em;
											
												font-size: 1.20em;
												text-align: center;
												text-transform: uppercase;
												position: relative'> Usuario
												".$_SESSION["usuario"]."</div>" ?>
								</li>
							</ul>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!----- //End-header---->

			<!---- banner-info ---->
			<div class="banner-info">
				<div class="container">
					<h1 class="wow fadeIn" data-wow-delay="0.5s"><span>Somos</span><br /><label>VIBA Music!</label></h1>
					
					
						<div class="topcinco wow fadeIn container banner-info"  data-wow-delay="0.5s">
							<h3>TOP 5 MEJORES</h3>


							
						</div>
				

				<div class="top-banner-grids wow bounceInUp" data-wow-delay="0.4s">
					<div class="banner-grid text-center">
						<span class="top-icon1"> </span>
						<h3>CONECTATE CON TUS AMIGOS</h3>
					</div>
					<div class="banner-grid text-center">
						<span class="top-icon2"> </span>
						<h3>VOTA LAS PLAYLISTS</h3>
					</div>
					<div class="banner-grid text-center">
						<span class="top-icon3"> </span>
						<h3>PLAYLISTS DESTACADAS</h3>
					</div>
					<div class="banner-grid text-center">
						<span class="top-icon4"> </span>
						<h3>RECOMENDADOS PARA TI</h3>
					</div>
					<div class="banner-grid text-center">
						<span class="top-icon5"> </span>
						<h3>TOTALMENTE GRATIS</h3>
					</div>
					<div class="clearfix"> </div>
				</div>
				</div>
			</div>

		</div>

		<div class="wow bounceInUp">
					<div class="wow bounceIn vibalogo"><img src="../images\vibalogo.jpg"></img></div>
					
					<div class="wow bounceIn logot"><a href="https://www.facebook.com/vibamusic"><img src="../images\logofb.jpg" width="60" height="60"><h2>FACEBOOK</h2></a></div>
					
					<div class="wow bounceIn logot"><a href="https://youtube.com/vibamusic"><img src="../images\logoyt.jpg" width="60" height="60"><h2>YOUTUBE</h2></a></div>

					<div class="wow bounceIn logot"><a href="https://www.twitter.com/vibamusic"><img src="../images\logot.jpg" width="60" height="60"><h2>TWITTER</h2></a></div>

					<div class="wow bounceIn logot"><a href="https://es.pinterest.com/vibamusic"><img src="../images\logop.jpg" width="60" height="60"><h2>PINTEREST</h2></a></div>
		</div>
			<!---- banner-info ---->

</body>
</html>