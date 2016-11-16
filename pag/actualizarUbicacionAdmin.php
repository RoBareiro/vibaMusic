<?PHP
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");


?>

<html>
<head>

<!--Para el google maps 
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyDVf4hQbFybBwz2POTYdYKHGeq70HXJKBM"></script>
-->

<!-- Se determina y escribe la localizacion -->
<script type="text/javascript">
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(mostrarUbicacion);
	}
	else{
		alert("¡Error! Este navegador no soporta la Geolocalización.");
	}

function mostrarUbicacion(position){
	var latitud = position.coords.latitude;
	var longitud = position.coords.longitude;
	var exactitud = position.coords.accuracy;	
	var div = document.getElementById("ubicacion");

	var div = document.getElementById("ubicacion");
	div.innerHTML = "<br>Latitud: " + latitud + "<br>Longitud: " + longitud;
		}	


function refrescarUbicacion(){	
	navigator.geolocation.watchPosition(mostrarUbicacion);
	}	
</script>

<!-- Se escribe un mapa con la localizacion anterior-->

<script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDpkFwDJ8HZxZtB1MV66Ta_digxlzO9Dmk"></script>
<!--EN ESTA LINEA HAY QUE CONSEGUIR LA KEY DE GOOGLE API PARA QUE SE PUEDAN VER LOS MAPAS!!!!!!!!!!!!!!!!!!!!-->

<script type="text/javascript">
var x=document.getElementById("demo");

function cargarmap(){
	navigator.geolocation.getCurrentPosition(showPosition,showError);

function showPosition(position){
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='50%';
  mapholder.style.width='100%';

  var myOptions={
	  center:latlon,
	  zoom:17,
	  mapTypeId:google.maps.MapTypeId.ROADMAP,
	  mapTypeControl:false,
	  navigationControlOptions:{
	  style:google.maps.NavigationControlStyle.SMALL
  			}
  };

  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({
  	position:latlon,
  	map:map,
  	title:"Estas Aqui!",
  	animation: google.maps.Animation.Drop
  });
  }

function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="La información de la localización no esta disponible."
      break;
    case error.TIMEOUT:
      x.innerHTML="El tiempo de petición ha expirado."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Ha ocurrido un error desconocido."
      break;
    }
  }}



</script>

<!--google maps-->

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

<body onload="loadMap()">
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
								<li class="active-join"><a href="usuarioAdmin.php">Administrador</a></li>
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
					</br>
					</br>
						<div class="modificar" id="central">
							<span>Mi Ubicaci&oacute;n</span></br></br>
							
							<div id="demo"></div>	<!--demo id es para mostrar los errores que puedan llegar a salir-->
							<div id="mapholder">
								<!--ACA APARECE EL MAPA, SE TOMA EL ID mapholder y se trabaja sobre el-->
							</div>
							
							<div id="ubicacion">
					
							</div>
							</br>
								<button class="botonlogin" onclick="cargarmap()">Cargar mapa</button>
							</div>
						</br>
						</div> <!--del class modificar central-->

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