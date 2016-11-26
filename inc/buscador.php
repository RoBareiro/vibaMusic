<?PHP
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];

	$consultaId = "SELECT id_usuario from usuario WHERE usuario = '$usuario' ";
	$accion = mysqli_query($conexion, $consultaId);
	$id = mysqli_fetch_assoc($accion);
	$miId = $id["id_usuario"];




/*PARA LOS BOTONES SEGUIR O DENUNCIAR*/

	if(isset($_GET["seguir"])){
		$error = array();
		$id_playlistSeguir = $_GET["id_playlist"];
		$id_usuarioPlaylistSeguir = $_GET["id_usuario"];
		$imagen = $_GET["imagen"];
		$nombrePlaylistASeguir = $_GET["nombrePlaylistADenunciar"];

		header("Location:../pag/seguirPlaylist.php?id_playlist=$id_playlistSeguir&id_usuario=$id_usuarioPlaylistSeguir&imagen=$imagen&nombrePlaylistADenunciar=$nombrePlaylistASeguir");
	}
	else{
		if(isset($_GET["denunciar"])){
			$id_playlistSeguir = $_GET["id_playlist"];
			$id_usuarioPlaylistSeguir = $_GET["id_usuario"];
			$nombrePlaylistADenunciar = $_GET["nombrePlaylistADenunciar"];	
				
			header("Location:../pag/denunciarPlaylist.php?id_playlist=$id_playlistSeguir&id_usuario=$id_usuarioPlaylistSeguir&nombrePlaylistADenunciar=$nombrePlaylistADenunciar");
		}
	}

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
								<li><a href="../pag/indexRegistrado.php">VIBA!</a></li>
								<li><a href="../pag/playlists.php">Playlists</a></li>
								<li><a href="../pag/usuario.php">Usuario</a></li>
								<li class="page-scroll"><a href="../pag/cerrarSesion.php">Cerrar Sesi&oacute;n</a></li>
								<li><a href="../pag/paginaRegistrado.php">USUARIO
										 <?PHP echo $_SESSION['usuario']; ?>
  									</a>
								</li>
							</ul>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>

				<!--BUSCADOR-->
					</br>
					<div class="wow fadeIn buscador">
					<form name="buscador" method="POST" action="#">
					<font style="color: white; margin-left:60%">NOMBRE DE PLAYLIST</font>
						<input type="text" name="palabra" required>
						<input class="botonBuscador" type="submit" value="Buscar" name="buscar">
					</form>
					</br>
					</div>
					</br></br></br>
				<!--BUSCADOR-->

				<!--RESULTADO DE LA BUSQUEDA-->
					<div class="resultadosBusqueda">
					<?PHP
						/*BUSCADOR*/

					//Con este query obtendremos los campos por los cuales el usuario puede buscar
					$result = mysqli_query($conexion, "SELECT COLUMN_NAME FROM playlist WHERE COLUMN_NAME LIKE 'nombre' ");

							if(isset($_POST['buscar'])){
								$palabra = $_POST["palabra"];
								$query = "SELECT id_playlist, id_usuario, nombre, imagen, link, tipo FROM playlist WHERE nombre LIKE '%{$palabra}%' AND id_usuario != '$miId' AND tipo != 'soloYo' ";
								$result = mysqli_query($conexion,$query);

								$found = false; // Si el query ha devuelto algo pondrá a true esta variable
								echo "<p>Playlists Relacionadas con tu busqueda: '<b><i>".$palabra."</i></b>'</br>";
								
								while($row = mysqli_fetch_array($result)){
									$found = true;
									echo "<form method='GET' action='buscador.php'>";
/*VER COMO DIRECCIONAR A PLAYLIST*/ echo "</br><a href='" .$row["link"]. "'>";	

									$id_playlist = $row["id_playlist"];
									$id_usuario = $row["id_usuario"];		
									$nombrePlaylistADenunciar = $row["nombre"];
									$imagenPlaylist = $row["imagen"];


									echo "<input type='hidden' name='id_playlist' value='".$id_playlist."'></input>";
									echo "<input type='hidden' name='id_usuario' value='".$id_usuario."'></input>";
									echo "<input type='hidden' name='nombrePlaylistADenunciar' value='".$nombrePlaylistADenunciar."'></input>";
									echo "<input type='hidden' name='imagen' value='".$imagenPlaylist."'></input>";



									echo "<h3>".$row["nombre"]."</h3>
											<img src='".$row["imagen"]."' width='20%' height='25%'></img>
										 </a></br></br>";	

								echo "<input class='botonBuscador' name='seguir' type='submit' value='Seguir'></input>

								<input class='botonBuscador' name='denunciar' type='submit' value='Denunciar'></input></p>";
								
								echo '</form>';
									}	
								}
								if(!$found){
									echo "</br>No hay Playlist relacionada con la palabra <b><i><h3>" .$palabra. "</h3></i></b>";
								}
							
					?>
					</div>
					
			</div>
			</br>
			<!----- //End-header---->

			<!---- banner-info ---->
			<div class="banner-info">
				<div class="container">
					
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

</body>
</html>
