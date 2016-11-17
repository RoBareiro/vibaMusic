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


	if(isset($_POST["suspenderUsuario"])){
		$errores = array();
		$fecha_banneo = date('y-m-d');
		$id_denunciado = $_POST["usuarioSuspendido"];

		/*consulta para saber si ya fue baneado*/
		$consultaBaneado = "SELECT id_denunciado FROM banneado WHERE id_denunciado ='$id_denunciado' ";
		$sqlBaneado = mysqli_query($conexion,$consultaBaneado);
		$motivo = $_POST["motivo"];

		if($resultado = mysqli_num_rows($sqlBaneado) == 0){
			$consultaSuspender = "INSERT INTO banneado (id_banneado, id_denunciado, motivo, fecha_banneo) VALUES('','$id_denunciado','$motivo','$fecha_banneo')";
			$accion = mysqli_query($conexion,$consultaSuspender);

			/*traigo el mail del suspendido*/
			$mailSql = "SELECT email FROM usuario WHERE id_usuario = '$id_denunciado'";
			$ejecutoMail = mysqli_query($conexion,$mailSql);
			$emailSuspendido = mysqli_fetch_assoc($ejecutoMail);

			/*Envio mail al usuario avisandole que va a ser suspendido*/
			/*$para = "bareiro.rsb@gmail.com"; MISMO PROBLEMA QUE EN EL LOGIN !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

			$para = $emailSuspendido["email"]; /*FIJATE ACA, PROBAR*/
			$titulo = 'Viba - Usuario Suspendido';
			$mensaje = 'Su Usuario fue suspendido por el siguiente motivo: ' . "$motivo";  
			$cabeceras = 'From: somos.viba.music@gmail.com'; //La direccion de correo desde donde supuestamente se envió

					//envio el mail				 
			mail($para, $titulo, $mensaje, $cabeceras);


			$errores[0] = "<font color='#76ff00'>Usuario Suspendido con Exito - Se Notific&oacute; al usuario</font>";
		}
		 else{
			$errores[0] = "<font color='red'>El Usuario que selecciono ya fue Suspendido</font>";		
		}
	}


/*REVALIDAR USUARIO*/
	/*para traer la lista de usuarios*/
	$consultaRevalidacion = "SELECT id_usuario, usuario, nombre, apellido FROM usuario INNER JOIN banneado ON id_usuario = id_denunciado AND rol = 'usuario'";

	$ejecutoRevalidacion = mysqli_query($conexion, $consultaRevalidacion);


	if(isset($_POST["usuarioRevalidado"])){
		$errores = array();
		$id_denunciadoRev = $_POST["revalidarUsuario"];

		
		/*consulta para saber si esta en la tabla de baneados*/
		$baneado = "SELECT id_denunciado FROM banneado WHERE id_denunciado ='$id_denunciadoRev' ";
		$baneadoSql = mysqli_query($conexion,$baneado);


		if($resultado = mysqli_num_rows($baneadoSql) == 1){ /*si es = 1 es porque fue banneado anteriormente*/

			$consultaRevalidar = "DELETE FROM banneado WHERE id_denunciado = '$id_denunciadoRev'";
			$accionRevalidar = mysqli_query($conexion,$consultaRevalidar);
			
			$errores[1] = "<font color='#76ff00'>Usuario Revalidado con Exito</font>";
		}
		else{
			$errores[1] = "<font color='red'>El Usuario que selecciono ya fue Revalidado</font>";
		}
	}



?>


<html>
	<head>
	
	<!--Menu ajax-->
	<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>

	<!--Para validar el navegador ajax-->
	<script type="text/javascript">
		
		function getXMLHTTP() {
	        var xmlhttp=false;
	        try{
	            xmlhttp=new XMLHttpRequest();
	        }
	        catch(e)	{
	            try{
	                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            catch(e){
	                try{
	                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	                }
	                catch(e){
	                    xmlhttp=false;
	                }
	            }
	        }
	        return xmlhttp;
    	}

		function reportesUsuarios() {
		    var strURL="reportesUsuarios.php";
		    var req = getXMLHTTP();
		    if (req) {
		        req.onreadystatechange = function() {
		            if (req.readyState == 4) {
		                // only if "OK"
		                if (req.status == 200) {
		                    document.getElementById('central').innerHTML = req.responseText ;
		                } else {
		                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
		                }
		            }
		        }
					req.open("GET", strURL, true);
					req.send();
				}   
			}
</script>
	

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
								<li><a href="usuarioAdmin.php">Administrador</a></li>
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
							<a href="suspenderUsuario.php" class="btnUsu">BANEAR</a></br>
							<a href="bajaUsuario.php" class="btnUsu">ELIMINAR</a></br>
							<a href="#" class="btnUsu" onclick="reportesUsuarios()">REPORTES</a></br>
					</div>
					<div class="modificar" id="central">

					<form class='formulario wow bounceIn' data-wow-delay='0.4s' method='POST' action='suspenderUsuario.php'>
					<?PHP  echo "</br>" .$errores[0]. "</br>"; ?>
						<h3><font color='white'>SUSPENDER AL USUARIO:</font></h3>
										<span>
											<?PHP
										        echo "</br><select name='usuarioSuspendido'>";
										        
										        while($fila = mysqli_fetch_assoc($ejecuto)){
										            echo "<option value='" . $fila["id_usuario"] . " '>" . $fila["nombre"] . " " . $fila["apellido"] . ": " . $fila["usuario"] . "</option>";
										        }
										        echo "</select>";
								        	?>
										</span>
										</br></br>
										Motivo:</br>
										<textarea name="motivo" col="3" row="7" style="resize:none;">Este será enviado al Email correspondiente</textarea>
										</br></br>
							<input class='botonlogin' type='submit' name='suspenderUsuario' value='SUSPENDER'></input>
					</form>

					</br></br></br>

					<form class='formulario wow bounceIn' data-wow-delay='0.4s' method='POST' action='suspenderUsuario.php'></br>
					<?PHP echo "</br><font color='red'>" .$errores[1]. "</font></br>"; ?>
						<h3><font color='white'>REVALIDAR AL USUARIO:</font></h3>
										<span>
											<?PHP
										        echo "</br><select name='revalidarUsuario'>";
										        
										        while($fila = mysqli_fetch_assoc($ejecutoRevalidacion)){
										            echo "<option value='" . $fila["id_usuario"] . " '>" . $fila["nombre"] . " " . $fila["apellido"] . ": " . $fila["usuario"] . "</option>";
										        }
										        echo "</select></br>";
								        	?>
										</span>
										</br>
							<input class='botonlogin' type='submit' name='usuarioRevalidado' value='REVALIDAR'></input>
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


