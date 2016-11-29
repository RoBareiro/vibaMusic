<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	$usuario = $_SESSION["usuario"];
	include("../inc/conexionbd.php");

	if (isset($_POST['agregarCanciones'])) {
		
		$target_path = "../uploads/";
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
			
		$nombre= $_POST['nombreCancion'];
		$artista= $_POST['artistaCancion'];
		$album= $_POST['albumCancion'];
		$duracion= $_POST['duracionCancion'];
		$genero= $_POST['generoCancion'];
		$ruta= $target_path;

		$idArtista= "SELECT idArtista from artista where nombre = '$artista'";
		$consultaid= mysqli_query($conexion, $idArtista);
		$assoc= mysqli_fetch_assoc($consultaid);

				if ($cantidad=mysqli_num_rows($consultaid)==0) {
					$insertarId= "INSERT into artista (idArtista, nombre) values ('', '$artista')";
					$resultado= mysqli_query($conexion, $insertarId);
					$idArt = mysqli_insert_id($conexion);
				}else{
					$idArtexistente="SELECT idArtista from artista where nombre='$artista'";
					$consultaid= mysqli_query($conexion, $idArtexistente);
					$assoce= mysqli_fetch_assoc($consultaid);
					$idArt = $assoce['idArtista'];
						}


		$insertarc= "INSERT into cancion (idCancion, titulo, idArtista, album, duracion, id_genero, archivo)
					 values('', '$nombre', '$idArt', '$album', '$duracion', '$genero', '$ruta')";
		$query= mysqli_query($conexion, $insertarc);
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){				
					header("location: agregarCancionesOk.php");
				}
		}
?>

<!DOCTYPE>
<html>
	<head>
				<!--Menu de ajax-->
		<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
			
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
	<title>Viba Music! - Agrega tus propios archivos</title>
		
		</head>
		<body>
		<div class="canciones">
			<h2>¡¡Agrega tus propias canciones!!</h2>
			<form enctype='multipart/form-data' action='agregarCanciones.php' method='post'><br><br>
				<label>Nombre:</label><br><input type="text" name="nombreCancion" size="30" style="color: black;"><br><br>

				<label>Interprete:</label><br><input type="text" name="artistaCancion" size="30" style="color: black;"><br><br>

				<label>Género:</label><br><select name="generoCancion" style="color: black;">
					<option value="1">Pop</option>
					<option value="2">Rock</option>
					<option value="3">R&B</option>
					<option value="4">Rap</option>
					<option value="5">Hip-Hop</option>
					<option value="6">Reaggeton</option>
					<option value="7">Reagge</option>
					<option value="8">Balada</option>
					<option value="9">Electro</option>
				</select><br><br>

				<label>Album:</label><br><input type="text" name="albumCancion" size="30" style="color: black;"><br><br>

				<label>Duración: (mm:ss)</label><br><input type="text" name="duracionCancion" size="5" style="color: black;"><br><br>
				<input name='uploadedfile' type='file'></input><br><br>
				<input type='submit' name="agregarCanciones" value='Subir archivo' class="botonlogin"></input>
			</form>
		</div>
		</body>
</html>