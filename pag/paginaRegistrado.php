<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	$_SESSION["registrado"]= "true";
	require_once("../inc/seguridad.php");
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
								<li><a href="../index.php">VIBA!</a></li>
								<li><a href="premium.php">Premium</a></li>
								<li><a href="ayuda.php">Ayuda</a></li>
								<li><a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></li>
								<li><?PHP 
										echo "<div 
												style='color: #FFF;
												background:rgba(166, 203, 163, 0.30);
												padding: 0.84em 3.0804em;
												font-size: 1.25em;
												text-align: center;
												text-transform: uppercase;
												position: relative;
												font-weight: 499;' 
												<br>Bienvenido ".$_SESSION['usuario']."  
												</br>
										 	 </div>";
									?>
								</li>
							</ul>
							<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
		</div>
			<!----- //End-header---->
		
			<!---- banner-info ---->


			<div class="banner-info">

				
				<div class="container">
					
								CONTENIDOOOOOOOOOOOOOOOOOOOOOOOOOO
				</div>
			</div>
			
			<div class="clearfix"> </div>
			
			<!---- footer info ---->
				<div class="wow bounceInUp">
					<div class="wow bounceIn vibalogo"><img src="..\images\vibalogo.jpg"></img></div>
					
					<div class="wow bounceIn logot"><img src="..\images\logofb.jpg" width="60" height="60"><a href="https://www.facebook.com/vibamusic"><h2>FACEBOOK</h2></a></div>
					
					<div class="wow bounceIn logot"><img src="..\images\logoyt.jpg" width="60" height="60"><a href="https://youtube.com/vibamusic"><h2>YOUTUBE</h2></a></div>

					<div class="wow bounceIn logot"><img src="..\images\logot.jpg" width="60" height="60"><a href="https://www.twitter.com/vibamusic"><h2>TWITTER</h2></a></div>

					<div class="wow bounceIn logot"><img src="..\images\logop.jpg" width="60" height="60"><a href="https://es.pinterest.com/vibamusic"><h2>PINTEREST</h2></a></div>
				</div>
				
		</div>
	</body>	
</html>