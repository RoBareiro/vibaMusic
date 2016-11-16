<?PHP 
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];
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
								<li><a href="banneados.php">Banneados</a></li>
								<li  class="active-join"><a href="usuarioAdmin.php">Administrador</a></li>
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
							<a href="usuarioAdmin.php" class="btnUsu">VOLVER AL MEN&Uacute;</a></br>
					</div>
					</br></br>
					<div class="modificar" id="central">
					<?PHP
						echo "<form action='#' method='POST' enctype='multipart/form-data'>";
						echo "<span for='file'>Cambi&aacute; tu foto de Perfil:</span></br></br>";
						echo "<input type='file' name='archivo' id='archivo'></input></br>";

						/*Para subir imagenes*/
						echo "<div class='modificar2'>";


									/*foto antigua*/
									$consulta = "SELECT foto_de_perfil FROM usuario WHERE usuario = '$usuario' ";
									$resultado = mysqli_query($conexion,$consulta);

									if(mysqli_num_rows($resultado) == 1){
											while($fila = mysqli_fetch_row($resultado)){
											echo "<div style='color: #77FF6B;'>Mi Foto:";
	       									echo "<div><img src='".$fila[0]."' width='40%'></img></div></div>";
	       									}
									}
									else{
										echo "<img src='../imgPerfil/perfilSombra.jpg' width='40%'></img>";
									}



									if(isset($_POST['boton'])){
									    // Hacemos una condicion en la que solo permitiremos que se suban imagenes y que sean menores a 20 KB
									    if ((($_FILES["archivo"]["type"] == "image/jpeg") ||
									    ($_FILES["archivo"]["type"] == "image/pjpeg") &&
									    ($_FILES["archivo"]["size"] < 5000000))){
									 
									    //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
									      if ($_FILES["archivo"]["error"] > 0){
									        echo $_FILES["archivo"]["error"] . "";
									      }
									      else{
									        // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
									        if (file_exists("../imgPerfil/" . $_FILES["archivo"]["name"])){
									          echo $_FILES["archivo"]["name"] . " ya existe una imagen con el mismo nombre de archivo. ";
									        }
									        else{
									         // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
									          $numeroAleatorio =  rand(0,1000000);	/*LO AGREGO PARA QUE NO SE REPITAN LOS NOMBRES DE LAS IMG*/
									          
									          move_uploaded_file($_FILES["archivo"]["tmp_name"],
									          "../imgPerfil/". $numeroAleatorio . $_FILES["archivo"]["name"]);
									          echo "<div style='color: #77FF6B;'>Foto Actualizada:";

									          $rutaImagen = "../imgPerfil/". $numeroAleatorio . $_FILES['archivo']['name'];

									          echo "<div><img src='".$rutaImagen."' width='40%'></img></div></div>";

									          $sql = "UPDATE usuario SET foto_de_perfil = '$rutaImagen' WHERE usuario = '$usuario'";
									          $accion = mysqli_query($conexion,$sql);
									        }
									      }
									    }
									    else{
									        // Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
									        echo "</br>Archivo no permitido o Quiere subir una foto de perfil igual a la anterior";
									    }
									}
						echo "</div>"; /*div class resultado de la img*/
						echo "</br>";
						echo "<input type='submit' class='botonlogin' name='boton' value='Actualizar Foto'></input>
						</form>";
						?> 
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