<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	$_SESSION["registrado"] = "true";
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];


	/*SUSPENDER USUARIO*/
	/*para traer la lista de usuarios*/
	$consulta = "SELECT id_usuario, usuario, nombre, apellido FROM usuario WHERE rol = 'usuario'";
	$ejecuto = mysqli_query($conexion, $consulta);

/*cuando clickeo BAJA*/
	if(isset($_POST["baja"])){
		$errores = array();

		$id_bajaUsuario = $_POST["bajaUsuario"];

		$baja = "SELECT id_usuario FROM usuario WHERE id_usuario = '$id_bajaUsuario'";
		$resultadoBaja= mysqli_query($conexion, $baja);

		if($resultado = mysqli_num_rows($resultadoBaja) == 1){
			$eliminar = "DELETE FROM usuario WHERE id_usuario = '$id_bajaUsuario'";
			$accion = mysqli_query($conexion,$eliminar);

			$errores[0] = "Usuario Dado de Baja con Exito";
		}
		 else{
			$errores[0] = "El Usuario que selecciono ya fue Dado de Baja";		
		}
	}


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
								<li><a href="reportes.php">Playlists</a></li>
								<li class="active-join"><a href="banneados.php">Usuarios</a></li>
								<li><a href="usuarioAdmin.php">ADMINISTRADOR</a></li>
								<li><a href="cerrarSesion.php">Salir</a></li>
								<li><a href="paginaAdmin.php">
										 <?PHP echo $_SESSION['usuario']; ?>
  									</a>
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
					</br>
					<div class="opciones bounceIn">
							<a href="banneados.php" class="btnUsu">VOLVER AL MEN&Uacute;</a></br>
					</div>
					</br></br>
					<div class="modificar" id="central">
						
						<span>DAR DE BAJA A USUARIO</span></br></br>

						<form class="formulario wow bounceIn" data-wow-delay="0.4s" method="POST" action="bajaUsuario.php">
							</br>
							<h3><font color='white'>SELECCIONE AL USUARIO QUE DESEA DAR DE BAJA</font></h3>

							<span>
								<?PHP
								     echo "</br><select name='bajaUsuario'>";
								        
								        while($fila = mysqli_fetch_assoc($ejecuto)){
								            echo "<option value='" . $fila["id_usuario"] . " '>" . $fila["nombre"] . " " . $fila["apellido"] . ": " . $fila["usuario"] . "</option>";
										        }

								      echo "</select></br>";
								      echo "</br><font color='red'>" .$errores[0]. "</font>";
							 	?>
							</span>

							<h3><font color='red'>Si esta seguro en dar la BAJA, haga click</font></h3></br>
							<input class="botonlogin" type="submit" name="baja" value="BAJA"></input>
						</form>

					</div>
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