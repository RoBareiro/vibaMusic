<?PHP
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");


	$claveVieja = $_POST["claveVieja"];
	$usuario = $_SESSION["usuario"];
	
	if(isset($_POST["claveNueva"])){
		$errores = array();

		/*valido clave vieja*/
			if(!($_POST["claveVieja"] == "")){

					if(ereg("^[a-zA-Z0-9]*", $claveVieja)){
						if((strlen($claveVieja)>=4)&&(strlen($claveVieja)<=10)){
							$claveVieja = md5($claveVieja);

							$busqueda = "SELECT clave FROM usuario WHERE usuario = '$usuario' AND clave = '$claveVieja' ";
							$accion = mysqli_query($conexion, $busqueda);
							if(mysqli_num_rows($accion) == 1){
									/*si la encuentra no pasa nada*/
							}
							else{
								$errores[3] = "</br>La clave original es incorrecta";
							}
						}
						else{
							$errores[3] = "La clave debe tener entre 4 y 10 letras";
						}
					}
					else{
						$errores[3] = "La clave debe tener solo letras y/o numeros";
					}
			}
			else{
				$errores[3] = "Debe ingresar la clave original";
			}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/*valido clave nueva*/
			if(!($_POST["nuevaClave"] == "")){
				$nuevaClave = $_POST["nuevaClave"];

					if(ereg("^[a-zA-Z0-9]*", $nuevaClave)){
						if((strlen($nuevaClave)>=4)&&(strlen($nuevaClave)<=10)){
							$nuevaClave = md5($nuevaClave);

							$busqueda = "SELECT clave FROM usuario WHERE usuario = '$usuario' AND clave = '$claveVieja' ";
							$accion = mysqli_query($conexion, $busqueda);
							if(mysqli_num_rows($accion) == 1){
								$nuevaConsulta = "UPDATE usuario SET clave = '$nuevaClave' WHERE usuario = '$usuario'";
								$resultado = mysqli_query($conexion,$nuevaConsulta);
							}
							else{
								$errores[4] = "La clave original no se encontro";
							}
						}
						else{
							$errores[4] = "La clave debe tener entre 4 y 10 letras";
						}
					}
					else{
						$errores[4] = "La clave debe tener solo letras y/o numeros";
					}
			}
			else{
				$errores[4] = "Debe ingresar la clave nueva";
			}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			/*valido clave nueva REPETIR*/
			if(!($_POST["nuevaClaveRepetir"] == "")){
				$nuevaClaveRepetir = $_POST["nuevaClaveRepetir"];

					if(ereg("^[a-zA-Z0-9]*", $nuevaClaveRepetir)){
						if((strlen($nuevaClaveRepetir)>=4)&&(strlen($nuevaClaveRepetir)<=10)){
							$nuevaClaveRepetir = md5($nuevaClaveRepetir);

							if($nuevaClaveRepetir == $nuevaClave){
								/*no pasa nada*/
							}
							else{
								$errores[2] = "La repeticion de la clave no es igual a la clave nueva";
							}
						}
						else{
							$errores[2] = "La clave debe tener entre 4 y 10 letras";
						}
					}
					else{
						$errores[2] = "La clave debe tener solo letras y/o numeros";
					}
			}
			else{
				$errores[2] = "Debe repetir la clave nueva";
			}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			if(empty($errores)){
				echo "<script type='text/javascript'> 
						alert('Clave Actualizada Correctamente'); 	 
				 	  </script>";
					}
					else{
						mysqli_close($conexion);
					}

	}	
?>










<html>
</head>
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
						<form class="formulario wow bounceIn" data-wow-delay="0.4s" method="POST" action="actualizarClave.php">
							<h3>Clave anterior</h3><input type="password" name="claveVieja" size="20"></input>
							<span><?PHP echo "<font color='red'>"."$errores[3]"."</font>"; ?></span>
							</br>
							<h3>Clave Nueva</h3><input type="password" name="nuevaClave" size="20"></input></br>
							<span><?PHP echo "<font color='red'>"."$errores[4]"."</font>"; ?></span>
							
							<h3>Repetir Clave Nueva</h3><input type="password" name="nuevaClaveRepetir" size="20"></input></br>
							<span><?PHP echo "<font color='red'>"."$errores[2]"."</font>"; ?></span>
							</br>
							<input class="botonlogin" type="submit" name="claveNueva" value="Cambiar"></input>
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