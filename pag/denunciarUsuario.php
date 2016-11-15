<?PHP 
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];

	/*busco los datos del denunciante para armar el mail*/
	$denuncianteSql = "SELECT id_usuario, nombre, apellido FROM usuario WHERE usuario = '$usuario'";
	$consultaSql = mysqli_query($conexion,$denuncianteSql);

	$datosDenunciante = mysqli_fetch_assoc($consultaSql);

	$id_usuarioDenunciante = $datosDenunciante["id_usuario"];
	$nombreDenunciante = $datosDenunciante["nombre"];
	$apellidoDenunciante = $datosDenunciante["apellido"];
	/*busco los datos del denunciante para armar el mail*/	


	$consulta = "SELECT id_usuario, usuario FROM usuario WHERE rol = 'usuario' AND id_usuario != '$usuario'";
	$ejecuto = mysqli_query($conexion, $consulta);

	if(isset($_POST["denunciar"])){
		$errores = array();
		$id_denunciado = $_POST["usuarioDenunciado"];
		$textoDenuncia = $_POST["textoDenuncia"];

		/*tomo datos del denunciado para yo despues banearlo*/
		$consultaDenuncia = "SELECT usuario, nombre, apellido FROM usuario WHERE id_usuario ='$id_denunciado' ";
		$sql = mysqli_query($conexion,$consultaDenuncia);	/*me trae todos los datos del denunciado*/
		
		/*me guardo los datos del denunciado*/
		$datos = mysqli_fetch_assoc($sql);
		$usuarioDenunciado = $datos["usuario"];
		$nombreDenunciado = $datos["nombre"];
		$apellidoDenunciado = $datos["apellido"];
		/*me guardo los datos del denunciado*/

		if($resultado = mysqli_num_rows($sql) == 1){
			if(empty($errores)){
					$para = "bareiro.rsb@gmail.com";
					/*$para = "rncastaniervivas@hotmail.com.ar"*/

					$titulo = 'DENUNCIA DE USUARIO';
					
					$mensaje = 'El usuario ' .$usuario. ' ha realizado una denuncia sobre el usuario ' ."$usuarioDenunciado". ' - ' ."$nombreDenunciado". ' ' ."$apellidoDenunciado". 
					' .    El motivo es el siguiente: ' ."$textoDenuncia". 
					


					'      Nombre Completo del Usuario del Denunciante: '."$nombreDenunciante". ' ' ."$apellidoDenunciante". 
					' - Id del Usuario Denunciante: '."$id_usuarioDenunciante".



					'      Nombre Completo del Usuario del Denunciado: '."$nombreDenunciado".' '."$apellidoDenunciado". 
					' - Id del Denunciado: '."$id_denunciado";

					$cabeceras = 'From: Usuario'. "$usuario";

					//envio el mail				 
					mail($para, $titulo, $mensaje, $cabeceras);
					$errores[0] = "</br><h3><font color='#76ff00'>Denuncia Realizada con EXITO</font></h3>";
			}
		 	else{
				$errores[0] = "</br><h3><font color='#76ff00'>ERROR al Realizar la Denuncia</font></h3>";		
			}
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
						Formulario de Denuncia
						<form class="formulario wow bounceIn" data-wow-delay="0.4s" method="POST" action="denunciarUsuario.php">

						<span><?PHP echo $errores[0]; ?></span>

						<h3><div style="color: white;">DE: <?PHP echo $_SESSION['usuario']; ?></div></h3>
						<h3><div style="color: white;">PARA: Administrador de Viba Music!</div></h3>
						<h3><div style="color: white;">DENUNCIO A: </div></h3>
							<?PHP
								echo "<select name='usuarioDenunciado'>";
										        
								while($fila = mysqli_fetch_assoc($ejecuto)){
									echo "<option value='" . $fila["id_usuario"] . " '>" . $fila["usuario"] . "</option>";
								}

								echo "</select></br>";
							?>					
						
						<h3>Ingrese el motivo de la denuncia:</h3>
						<textarea name="textoDenuncia" rows="7" cols="40" required style="resize:none;"></textarea>
						</br></br>
						<input class="botonlogin" type="submit" name="denunciar" value="Enviar Denuncia"></input>
					</form>
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