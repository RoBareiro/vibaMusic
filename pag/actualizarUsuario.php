<?PHP
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
		/*validaciones como el login*/

	$usuarioViejo = $_SESSION["usuario"];
	
	if(isset($_POST["usuarioNuevo"])){
			$errores = array();

			if(!($_POST["nuevoUsuario"] == "")){
				$usuarioNuevo = $_POST["nuevoUsuario"];
					
					if(ereg("^[a-zA-Z0-9_-]*", $usuarioNuevo)){
						if((strlen($usuarioNuevo)>=4)&&(strlen($usuarioNuevo)<=10)){

	 							$segundaConsulta = "SELECT usuario FROM usuario WHERE usuario = '$usuarioNuevo'";
	 							$segundoResultado = mysqli_query($conexion,$segundaConsulta);

	 							if(mysqli_num_rows($segundoResultado) == 0){
		 							$actualizoUsuario = "UPDATE usuario SET usuario = '$usuarioNuevo' WHERE usuario = '$usuarioViejo'";
		 							mysqli_query($conexion,$actualizoUsuario);

		 							$_SESSION["usuario"] = $usuarioNuevo;
		 							echo "<script type='text/javascript'> 
		 									alert('Usuario Actualizado Correctamente'); 	 
		 								 </script>";
	 							}
	 							else{
	 								$errores[3] = "Nombre de usuario ya utilizado, elija otro nombre";
	 							}
						}
						else{
							$errores[3] = "El usuario debe tener entre 4 y 10 letras";
							}
					}
					else{
						$errores[3] = "El usuario debe tener solo letras y/o numeros";
						}
			}
			else{
				$errores[3] = "Debe ingresar un usuario";
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
								<li><a href="indexRegistrado.php">VIBA!</a></li>
								<li><a href="playlists.php">Playlists</a></li>
								<li  class="active-join"><a href="usuario.php">Usuario</a></li>
								<li><a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></li>
								<li><a href="paginaRegistrado.php">USUARIO
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
							<a href="usuario.php" class="btnUsu">VOLVER AL MEN&Uacute;</a></br>
					</div>
					</br></br>
					<div class="modificar" id="central">
						<div>
						<form class="formulario wow bounceIn" data-wow-delay="0.4s" method="POST" action="actualizarUsuario.php">
							<h3>Usuario anterior</h3>
							<div style="color: white; font-size: 1.50em;">
								<?PHP echo $_SESSION['usuario'] ?>
							</div>
							</br>
							<h3>Usuario Nuevo</h3><input type="text" name="nuevoUsuario" size="20"></input></br>
							<span><?PHP echo "<font color='red'>"."$errores[3]"."</font>"; ?></span>
							</br></br>
							<input class="botonlogin" type="submit" name="usuarioNuevo" value="Cambiar"></input>
						</form>
						</div>
					</br></br>
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