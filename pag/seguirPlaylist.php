<?PHP
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];

	/*datos de la playlist a seguir*/
	$id_playlistASeguir = $_GET["id_playlist"];
	$id_usuarioPlaylistASeguir = $_GET["id_usuario"];
	$imagenPlaylist = $_GET["imagen"];
	$nombrePlaylist = $_GET["nombrePlaylistADenunciar"];
	/*datos de la playlist a seguir*/



/*me trae el id del usuario en sesion*/
$datosMiUsuario = "SELECT id_usuario FROM usuario WHERE usuario = '$usuario'";
$datosAccion = mysqli_query($conexion, $datosMiUsuario);



if($resultado = (mysqli_num_rows($datosAccion)) == 1){
			$result = mysqli_fetch_assoc($datosAccion);
			$id_usuario = $result["id_usuario"];

			/*busco si existe ya este seguimiento*/
			$busquedaQuery = "SELECT id_seguidor, id_playlist FROM sigue_a WHERE id_seguidor = '$id_usuario' AND id_playlist = '$id_playlistASeguir'";
			$sqlEjec = mysqli_query($conexion, $busquedaQuery);
			/*si no encuentra coincidencias de seguimiento, agrega seguimiento*/
			if($cantidad = (mysqli_num_rows($sqlEjec)) == 0){
				$estado = 'sigue';
				$queryParaSeguidor = "INSERT INTO sigue_a (id_seguimiento, id_seguidor, id_seguido, estado, id_playlist) VALUES ('','$id_usuario','$id_usuarioPlaylistASeguir','$estado','$id_playlistASeguir')";
					$queryAccion = mysqli_query($conexion,$queryParaSeguidor);
					$errores[0] = "<font style='color: green;'>Ahora Sigue a esta Playlist</font></br>";		
			}
			else{
				$errores[0] = "<font style='color: red;'>Ya Sigue a esta Playlist</font></br>";
					}
		} /*if de la busqueda del usuario de sesion*/
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
								<li class="active-join"><a href="playlists.php">Playlists</a></li>
								<li><a href="usuario.php">Usuario</a></li>
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
					<div class="opciones bounceIn">
							<a href="playlists.php" class="btnUsu">VOLVER AL MEN&Uacute;</a></br>
					</div>
					</br></br>
					<div class="modificar" id="central">
					<span><?PHP echo $errores[0]; ?></span>

						<?PHP
							echo "<b><i>" .$nombrePlaylist. "</i></b>";	
							echo "</br><img src='" .$imagenPlaylist. "' width='30%'></img>";
						?>			
					</br>
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