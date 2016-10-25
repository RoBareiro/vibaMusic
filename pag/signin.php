<?PHP
	include("../inc/conexionbd.php");
	error_reporting(0);	/*Desactiva cualquier notificacion*/
		
		$usuario = $_POST["usuario"];
		$clave = md5($_POST["clave"]);

		if(isset($_POST["entrar"])){

			//VALIDO USUARIO Y CONTRASEÑA QUE ESTEN EN LA BD
			$consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$usuario'");
			
			$contador = mysqli_num_rows($consulta);
			echo "$contador";

			if($contador == 1){
								session_start();
								$_SESSION["registrado"] = "true";
								$_SESSION["usuario"] = $usuario;
											
								if ($_POST['recordar']){
									setcookie("usuario", $_POST['usuario'] , time()+(60*60*20),"/");
								}
								else{
						  			setcookie("usuario","",time()-3600,"/");
								}

								header("Location:paginaRegistrado.php"); 			//CREAR PAGINA DE REGISTRADO 	    
			}
			else{
				echo "El usuario no esta registrado o alguno de los campos que ingreso es incorrecto";
				session_destroy();									
				$usuario = $_POST["usuario"];	
				} 	
		}				
?>













<html>
	<head>
	<title>Viba Music!</title>
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
								<li class="page-scroll"><a href="login.php">Registrate</a></li>
								<li class="active-join"><a href="#">Iniciar Sesi&oacute;n</a></li>
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

				<div class="wow bounceIn signin"><img src="..\images\iniciarsesion.png"></img></div>
					<form class="formulario wow bounceIn" data-wow-delay="0.4s" method="POST" action="signin.php">
						<h3>Usuario</h3><input type="text" name="usuario" placeholder=" Ingrese el Usuario" value="<?php if(isset($_COOKIE['usuario'])) echo $_COOKIE['usuario']; ?>" size="20"></input></br>
						<h3>Contrase&ntilde;a</h3><input type="password" name="clave" placeholder=" Ingrese la contrase&ntilde;a"></input></br>
						<input type="checkbox" name="recordar"> Recordar Usuario</input></br></br>
						<input class="botonlogin" type="submit" name="entrar" value="Entrar"></input>
					</form>				
				</div>
			</div>
			
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