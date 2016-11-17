<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	$_SESSION["registrado"] = "true";
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];


	/*PARA EL PDF*/
	require_once ('../dompdf/dompdf_config.custom.inc.php');
	require_once('../dompdf/dompdf_config.inc.php');

	if(isset($_POST["generar"])){

		$graficoTabla  = $_POST['table_div'];
   		list(, $graficoTabla) = explode(';', $graficoTabla);
  		list(, $graficoTabla) = explode(',', $graficoTabla);
   		$graficoTabla = base64_decode($graficoBarras);
   		file_put_contents('../tmp/graficoTabla.png', $graficoTabla);

		$html = '<html>
				<head>
 					<title></title>
    			</head>
					
					<body>
						<span>GRAFICO DE PERSONAS POR PAIS</span></br></br>
						<img src="../tmp/graficoTabla.png" width"100%" height="60%"></img>		
					</body>

    			</html>';

		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream("graficoUsuariosBaneados", array("Attachment" => false));

	}


?>










<html>
	<head>

	<!--Para grafico de torta-->
			
	<script type="text/javascript" src="../js/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = google.visualization.arrayToDataTable([
        ['Usuario','Fecha (Año-Mes-Día)'],
          
          <?PHP
          $consulta = "SELECT usuario, fecha_banneo FROM usuario, banneado WHERE id_usuario = id_denunciado";
          $resultado = mysqli_query($conexion, $consulta);

          $numerodefilas = mysqli_num_rows($resultado);
          $i=0;

          while($fila = mysqli_fetch_array($resultado)){
            $i++;

            if($i<$numerodefilas){ // No es la última fila
              echo "['" . $fila['usuario'] . "', '" . $fila['fecha_banneo'] . "'],\n";
            }
            else{ // Sí es la última fila
              echo "['" . $fila['usuario'] . "', '" . $fila['fecha_banneo'] . "']\n";
            }

          }

          mysql_close($conexion);
        ?>

        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));


        table.draw(data, {showRowNumber: true, width: '70%', height: '50%'});
         // Wait for the chart to finish drawing before calling the getImageURI() method.
         //PARA GENERAR IMAGEN DE GRAFICO
	      	google.visualization.events.addListener(chart, 'ready', function () {
	        table_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
	        console.log(table_div.innerHTML);
	      });

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
								<li><a href="usuarioAdmin.php">ADMINISTRADOR</a></li>
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
							<a href="banneados.php" class="btnUsu">VOLVER AL MEN&Uacute;</a></br>
					</div>
					</br></br>
					<div class="modificar" id="central">
						
						<!--GRAFICO GOOGLE CHARTS-->
						<span>GRAFICO DE USUARIOS BANEADOS POR FECHA</span></br></br>

						<form method="POST" action="usuariosBanneados.php">		
						
							<div id="table_div" style="width: 100%; height: 60%;">
								<!--APARECE EL GRAFICO-->
							</div>
						</br>
							<input type="submit" name="generar" value="GENERAR PDF" class="botonlogin"></input>
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