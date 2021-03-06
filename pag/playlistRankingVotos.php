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

		$dompdf = new DOMPDF();
		$dompdf->load_html(utf8_decode($html));
		$dompdf->render();
		$dompdf->stream("playlistRankingVotos", array("Attachment" => false));

	}



?>










<html>
	<head>

	<!--Para grafico-->
			
	<script type="text/javascript" src="../js/loader.js"></script>
    <script type="text/javascript">    
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
     
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'nombre');
        data.addColumn('number', 'cantidad');
        data.addRows([
          <?PHP
					$consulta = "SELECT COUNT(*) AS cantidad, nombre FROM voto v INNER JOIN playlist p ON v.id_playlist = p.id_playlist GROUP BY v.id_playlist";

					$resultado = mysqli_query($conexion, $consulta);

					$numerodefilas = mysqli_num_rows($resultado);
					$i=0;

					while($fila = mysqli_fetch_array($resultado)){
						$i++;

						if($i<$numerodefilas){ // No es la última fila
							echo "['" . $fila['nombre'] . "', " . $fila['cantidad'] . "],\n";
						}
						else{ // Sí es la última fila
							echo "['" . $fila['nombre'] . "', " . $fila['cantidad'] . "]\n";
						}

					}

					mysql_close($conexion);
				?>
        ]);

        var options = {
          title: 'Cantidad de votos positivos por Playlist',
          titleTextStyle: { color: 'black',  fontSize: 25,  bold: 1 },
          is3D: true,
          fontSize: 20,
          legend: {position: 'right', alignment: 'top' ,textStyle: {color: 'black', fontSize: 15}},

        };

        var chart = new google.visualization.BarChart(document.getElementById('barras'));


        chart.draw(data, options);
         
         // Wait for the chart to finish drawing before calling the getImageURI() method.
         //PARA GENERAR IMAGEN DE GRAFICO
	      	google.visualization.events.addListener(chart, 'ready', function () {
	        barras.innerHTML = '<img src="' + chart.getImageURI() + '">';
	        console.log(barras.innerHTML);
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
								<li class="active-join"><a href="reportes.php">Playlists</a></li>
								<li><a href="banneados.php">Usuarios</a></li>
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
							<a href="reportes.php" class="btnUsu">VOLVER AL MEN&Uacute;</a></br>
					</div>
					</br></br>
					<div class="modificar" id="central">
						
						<!--GRAFICO GOOGLE CHARTS-->
						<span>CANTIDAD DE VOTOS POR PLAYLIST</span></br></br>

						<form method="POST" action="playlistRankingVotos.php">		
						
							<div id="barras" style="width: 100%; height: 60%;">
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