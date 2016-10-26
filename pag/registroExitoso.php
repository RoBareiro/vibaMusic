<?PHP
	include("conexionbd.php");
	$activation_key = $_POST["clave_activacion"];		//deberia agarrar la clave que esta en el link del mail

	// Busca la entrada en la tabla de usuarios para la clave de activación recibida
	$consulta = "SELECT claveMomentanea FROM usuario WHERE clave_momentanea = '$activation_key'";
	$resultado = mysqli_query($conexion, $consulta);

		if($resultado == 1){
			$sql = "UPDATE usuario SET estado_activo = '1' WHERE clave_activacion = $activation_key";
			mysqli_close($conexion);
		}
		else{
			echo "El usuario no pudo ser activado";
			mysqli_close($conexion);
		}

/* CON CLASES
	$stm = $dbh->prepare("select count(1) from users where activation_key=?");
	$stm->bind_param("s",$activation_key);
	$stm->bind_result($total);
	$message = "";
	$stm->execute();
	$stm->fetch();
	$stm->close();
	if ($total == 1) { // Si se ha encontrado...
	    // Retrieve the email address
	    $stm = $dbh->prepare("select email from users where activation_key=?");
	    $stm->bind_param("s",$activation_key);
	    $stm->bind_result($email);
	    $stm->execute();
	    $stm->fetch();
	    $stm->close();
	    // Poner a uno el campo validated en la tabla usuarios
	    $stm = $dbh->prepare("update usuarios set validated=1 where activation_key=?");
	    $stm->bind_param("s",$activation_key);
	    $stm->execute();
	    $stm->close();
	    // Introducir al usuario en sesión
	    $_SESSION["user"] = $email;
	    $message .= "Gracias por registrarse con nosotros<br/><br/>" .
	        "¡Bienvenido a ejemplo.com!<br/><br/>" .
	        "<a href='http://ejemplo.com' class=\"btn\"'>Continuar</a>"; */
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
								<li><a href="../index.php">VIBA!</a></li>
								<li><a href="premium.php">Premium</a></li>
								<li><a href="ayuda.php">Ayuda</a></li>
								<li><a href="login.php">Registrate</a></li>
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

			<!--VER VER VER VER VER VER VER VER VER VER VER VER VER VER VER VER VER VER-->
				<?PHP
					echo "<div style='margin-top:10%; margin-left:0%; margin-bottom: 10%; padding-top: 5%; padding-bottom: 5%; background:rgba(114, 189, 163, 0.90); font-size:50px; text-align: center; color: black;' <br>Usuario activado exitosamente!</br> Para ingresar a su cuenta haga click <a href='signin.php' style='color: #EDEDED;  font-style:italic';>AQUI</a><br>
						<br></div>";
				?>   					
			
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