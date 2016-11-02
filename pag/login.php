<?php
		error_reporting(0);	/*Desactiva cualquier notificacion*/
		include("../inc/conexionbd.php");

		if($_SESSION["registrado"] == "true")
		session_start();
		$_SESSION["registrado"]= "true";
		require_once("../inc/seguridad.php");


		
		$nombre = $_POST["nombre"];

		if(isset($_POST["entrar"])){
			$errores = array();

	/////////////////////////////////////////////////////////////////////////////////////////////////

			//VALIDO NOMBRE
			if(!($_POST["nombre"] == "")){
				$nombre = $_POST["nombre"];
					
					if(ereg("^[a-zA-ZÑÁÉÍÓÚáéíóú][a-zA-Zñáéíóú ]*$", $nombre)){
						if((strlen($nombre)>=4)&&(strlen($nombre)<=10)){
						}
						else{
							$errores[0] = "El nombre debe tener entre 4 y 10 letras";
						}
					}
					else{
						$errores[0] = "El nombre debe tener solo letras";
					}
				}
				else{
					$errores[0] = "Debe ingresar un nombre";
				}
	
	////////////////////////////////////////////////////////////////////////////////////////////////				

			//VALIDO apellido
			if(!($_POST["apellido"] == "")){
				$apellido = $_POST["apellido"];
					
					if(ereg("^[a-zA-ZÑÁÉÍÓÚáéíóú][a-zA-Zñáéíóú ]*$", $apellido)){
						if((strlen($apellido)>=4)&&(strlen($apellido)<=10)){
						}
						else{
							$errores[1] = "El apellido debe tener entre 4 y 10 letras";
						}
					}
					else{
						$errores[1] = "El apellido debe tener solo letras";
					}
				}
				else{
					$errores[1] = "Debe ingresar un apellido";
				}

	////////////////////////////////////////////////////////////////////////////////////////////////

			//Valido email
				if(!($_POST["email"] == "")){
				$email = $_POST["email"];
					
					if(ereg("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$", $email)){
						
					//hago consulta y la guardo en una variable
							$buscarEmail = "SELECT email FROM usuario WHERE email = '$email' ";

							//hago la consulta en la bd
							$emailEncontrado = mysqli_query($conexion, $buscarEmail);

	 						if(mysqli_num_rows($emailEncontrado) != 1){
	 							//nada, porque el email no fue utilizado 
	 						}
							else{
								$errores[2] = "Email ya utilizado para registrar otro usuario,</br> Utilize un email distinto";
							}
					}
					else{
						$errores[2] = "El email es incorrecto";
					}
				}
				else{
					$errores[2] = "Debe ingresar un email";
				}

	////////////////////////////////////////////////////////////////////////////////////////////////	

			//VALIDO usuario
			if(!($_POST["usuario"] == "")){
				$usuario = $_POST["usuario"];
					
					if(ereg("^[a-zA-Z0-9_-]*", $usuario)){
						if((strlen($usuario)>=4)&&(strlen($usuario)<=10)){
							
							//hago consulta y la guardo en una variable
							$buscarUsuario = "SELECT usuario FROM usuario WHERE usuario = '$usuario' ";

							//hago la consulta en la bd
							$usuarioEncontrado = mysqli_query($conexion, $buscarUsuario);

	 						if(mysqli_num_rows($usuarioEncontrado) != 1){
	 							//nada, porque no existe el usuario
	 						}
							else{
								$errores[3] = "El nombre de usuario ya existe";
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

	////////////////////////////////////////////////////////////////////////////////////////////////

			//Valido clave
			if(!($_POST["clave"] == "")){
				$clave = $_POST["clave"];
					
					if(ereg("^[a-zA-Z0-9]*", $clave)){
						if((strlen($clave)>=4)&&(strlen($clave)<=10)){
							$clave = md5($clave);
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
					$errores[4] = "Debe ingresar una clave";
				}

	////////////////////////////////////////////////////////////////////////////////////////////////

	//Valido si existen errores, si no existen los inserto en la bd y mando un email de activacion
			if(empty($errores)){
				$rol = 'usuario';
				$estado_activo = '0';
				$clave_activacion = md5($email);

				$insertar = "INSERT INTO usuario (id_usuario, nombre, apellido, email, usuario, clave, rol, foto_de_perfil, pais, localidad, cantidad_playlist, estado_activo, clave_momentanea) 
							 VALUES('', '$nombre', '$apellido', '$email', '$usuario', '$clave', '$rol', '', '', '', '', '$estado_activo', '$clave_activacion') ";
				//ejecuto la query
				mysqli_query($conexion, $insertar);

				//mando un mail para que active

					$para = 'bareiro.rsb@gmail.com';			///	NO ME DEJA METER COMILLAS PARA MANDAR UN MAIL
					$titulo = 'Viba - Validacion de Usuario';
					$mensaje = 'Hola Viba Usuario! 
					Para activar tu cuenta haz click aqui:
					http://localhost/vibaMusic/pag/registroExitoso.php?clave_activacion='.$clave_activacion.' 
					o copia y pega la direccion en tu navegador.';  //CAMBIAR DEPENDIENDO DE DONDE ESTOY!!!!!!!!!!!!!!!!!!!!
					$cabeceras = 'From: vibamusic@hotmail.com'; //La direccion de correo desde donde supuestamente se envió

					//envio el mail				 
					mail($para, $titulo, $mensaje, $cabeceras);

						header("Location:usuarioAValidar.php");
					}
					else{
						mysqli_close($conexion);
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
								<li class="page-scroll active-join"><a href="#">Registrate</a></li>
								<li><a href="signin.php">Iniciar Sesi&oacute;n</a></li>
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


   					<div class="wow bounceIn login"><img src="..\images\registro.png"></img></div>
					
					<form class="formulario wow bounceIn" data-wow-delay="0.4s" method="POST" action="login.php">
						<h3>Nombre</h3><input type="text" name="nombre"  value="<?PHP echo $_POST['nombre']; ?>" size="20"></input></br>
						<span><?PHP echo "<font color='red'>"."$errores[0]"."</font>"; ?></span>
						<h3>Apellido</h3><input type="text" name="apellido" value="<?PHP echo $_POST['apellido']; ?>" size="20"></input></br>
						<span><?PHP echo "<font color='red'>"."$errores[1]"."</font>"; ?></span>
						<h3>E-Mail</h3><input type="text" name="email" value="<?PHP echo $_POST['email']; ?>" size="20"></input></br>
						<span><?PHP echo "<font color='red'>"."$errores[2]"."</font>"; ?></span>
						<h3>Usuario</h3><input type="text" name="usuario" value="<?PHP echo $_POST['usuario']; ?>" size="20"></input></br>
						<span><?PHP echo "<font color='red'>"."$errores[3]"."</font>"; ?></span>
						<h3>Contrase&ntilde;a</h3><input type="password" name="clave" value="<?PHP echo $_POST['clave']; ?>"></input></br>
						<span><?PHP echo "<font color='red'>"."$errores[4]"."</font>"."</br>"; ?></span>
						</br>
						<input class="botonlogin" type="submit" name="entrar" value="Registrarse"></input>
					</form>
			
				</div>
			</div>
			
			<div class="clearfix"> </div>
			
			<!---- footer info ---->
				<div class="wow bounceInUp">
					<div class="wow bounceIn vibalogo"><img src="../images\vibalogo.jpg"></img></div>
					
					<div class="wow bounceIn logot"><a href="https://www.facebook.com/vibamusic"><img src="../images\logofb.jpg" width="60" height="60"><h2>FACEBOOK</h2></a></div>
					
					<div class="wow bounceIn logot"><a href="https://youtube.com/vibamusic"><img src="../images\logoyt.jpg" width="60" height="60"><h2>YOUTUBE</h2></a></div>

					<div class="wow bounceIn logot"><a href="https://www.twitter.com/vibamusic"><img src="../images\logot.jpg" width="60" height="60"><h2>TWITTER</h2></a></div>

					<div class="wow bounceIn logot"><a href="https://es.pinterest.com/vibamusic"><img src="../images\logop.jpg" width="60" height="60"><h2>PINTEREST</h2></a></div>
				</div>
				
		</div>
	</body>	
</html>