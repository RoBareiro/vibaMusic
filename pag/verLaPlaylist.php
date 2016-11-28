<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];
	$id_playlist = $_GET["idPlaylist"];

?>


<html>
	<head>
	<!--Para la playlist-->
	<script language="javascript" type="text/javascript" src="../js/funcionesReproductor.js"></script>
	<!--Para la playlist-->


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

    	//FUNCION QUE CREAR PLAYLIST Y ME LLEVA AL PHP crearPlaylist.php
		function crearPlaylist() {
		    var strURL="crearPlaylist.php";
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


		//FUNCION QUE AGREGA CANCIONES Y ME LLEVA AL PHP agregarCanciones
		function agregarCanciones() {
		    var strURL="agregarCanciones.php";
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

		//votoPositivo
		function votoPositivo() {
		      if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp=new XMLHttpRequest();
		      }
		      else {// code for IE6, IE5
		        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      xmlhttp.onreadystatechange=function() {
		        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		          document.getElementById("voto").innerHTML=xmlhttp.responseText;
		        }
		      }

		      var usuario = "<?PHP echo $usuario; ?>";
		      var id_playlist = "<?PHP echo $id_playlist; ?>";

		      xmlhttp.open("GET","votoPositivo.php?id_playlist="+id_playlist+"&usuario="+usuario,true);
		      xmlhttp.send();
		  }

		//votoNegativo
		function votoNegativo() {
		      if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp=new XMLHttpRequest();
		      }
		      else {// code for IE6, IE5
		        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      xmlhttp.onreadystatechange=function() {
		        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		          document.getElementById("voto").innerHTML=xmlhttp.responseText;
		        }
		      }

		      var usuario = "<?PHP echo $usuario; ?>";
		      var id_playlist = "<?PHP echo $id_playlist; ?>";

		      xmlhttp.open("GET","votoNegativo.php?id_playlist="+id_playlist+"&usuario="+usuario,true);
		      xmlhttp.send();
		  }

</script>


<!--PARA GOOGLE MAPS-->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyDVf4hQbFybBwz2POTYdYKHGeq70HXJKBM"></script>

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
//	div.innerHTML = "<br>Latitud: " + latitud + "<br>Longitud: " + longitud;
		}	


function refrescarUbicacion(){	
	navigator.geolocation.watchPosition(mostrarUbicacion);
	}	
</script>


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
  mapholder.style.width='50%';

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


	<!--Para cambiar solo el contenido central-->
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
	<title>Viba Music!</title>
	</head>

<body onload="cargarmap()">
		<div class="bg">
		<!----- start-header---->
		<div class="container">
			<div id="home" class="header wow bounceInDown" data-wow-delay="0.4s">
					<div class="top-header">
					
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li><a href="indexRegistrado.php">VIBA!</a></li>
								<li class="active-join"><a href="playlists.php">Playlists</a></li>
								<li><a href="usuario.php">Usuario</a></li>
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
				<!--BUSCADOR-->
					</br>
					<div class="wow fadeIn buscador">
					<form name="buscador" method="POST" action="../inc/buscador.php">
					<font style="color: white; margin-left:60%">NOMBRE DE PLAYLIST</font>
						<input type="text" name="palabra" required>
						<input class="botonBuscador" type="submit" value="Buscar" name="buscar">
					</form>
					</div>
				<!--BUSCADOR-->
		</div>
			<!----- //End-header---->
		
			<!---- banner-info ---->
			<div class="banner-info">
				<div class="container">
					</br>
					<div class="opciones bounceIn">
							<a href="#" class="btnUsu" onclick="crearPlaylist()">CREAR PLAYLIST</a></br>
							<a href="misPlaylist.php" class="btnUsu">MIS PLAYLISTS</a></br>
							<a href="#" class="btnUsu" onclick="agregarCanciones()">AGREGAR CANCIONES</a><br>
							<a href="lasQueSigo.php" class="btnUsu" onclick="lasQueSigo()">LAS QUE SIGO</a><br>
					</div>
					<div class="modificar" id="central">
					

					<?PHP
						$escuchar = 'Escuchar';
						$dejarDeSeguir = 'Dejar de Seguir';
						$borrarPlaylist = 'Borrar Playlist';

						if($_GET['opcion'] == $escuchar){
						$nombreQuery = "SELECT nombre FROM playlist WHERE id_playlist ='$id_playlist' ";
						$exec = mysqli_query($conexion, $nombreQuery);
						$nombrePlaylist = mysqli_fetch_assoc($exec);

						echo "<font style='color: green;'>".$nombrePlaylist['nombre']."</font></br></br>";

						echo "<div class='wow fadeIn container banner-info'  data-wow-delay='0.5s'>
										<div id='reproductorBox' class='reproductorBox'>";
						echo "<select id='selectTrack' class='audio' 
			   									multiple onchange='cambiarTrack(this.options[this.selectedIndex]);' style='height: 115px;'>";

			   			/*Query para traer las canciones de la playlist que seleccione*/
			   			$query = "SELECT titulo, archivo FROM cancion c INNER JOIN playlist_cancion pc ON c.idCancion = pc.id_cancion AND pc.id_playlist = '$id_playlist' ";
						$ejecuto = mysqli_query($conexion, $query);
						/*Query para traer las canciones de la playlist que seleccione*/

			   			while($fila = mysqli_fetch_array($ejecuto)){
							echo "<option path='".$fila["archivo"]."'>".$fila["titulo"]."</option>";
						}

						echo "</select>";
						echo "<script>cargarReproductor();</script>
							  </div></div>";
						
						echo "<br><a href='#' onclick='votoPositivo(this.value)'><img src='../images/positivo.png' width='10%'></img></a> Me Gusta :D</br></br>";
						
						echo "<a href='#' onclick='votoNegativo(this.value)'><img src='../images/negativo.png' width='10%'></img></a> No Me Gusta :O<br>";
						}
						else{
							/*mi id*/
							$consultaId = "SELECT id_usuario from usuario WHERE usuario = '$usuario' ";
							$accion = mysqli_query($conexion, $consultaId);
							$id = mysqli_fetch_assoc($accion);
							$miId = $id["id_usuario"];

							if($_GET['opcion'] == $dejarDeSeguir){
							$eliminar = "DELETE FROM sigue_a WHERE id_playlist = '$id_playlist' AND id_seguidor = '$miId'";
							$elimino = mysqli_query($conexion, $eliminar);

							echo "<font style='color: green;'>Usted ha dejado de seguir a esta playlist</font>";
							}
							else{
								if($_GET['opcion'] == $borrarPlaylist){
									$sql = "DELETE FROM playlist WHERE id_playlist = '$id_playlist' AND id_usuario = '$miId'";
									$do = mysqli_query($conexion, $sql);
									echo "<font style='color: green;'>Usted ha borrado la playlist</font>";
								}
							}
						}						
					?>
					</br>
					<div id='voto'>
					</div>

					<span style="color: green;"> Donde estoy escuchando la playlist</span></br>
							
							<div id="demo"></div>	<!--demo id es para mostrar los errores que puedan llegar a salir-->
							<div id="mapholder">
								<!--ACA APARECE EL MAPA, SE TOMA EL ID mapholder y se trabaja sobre el-->
							</div>
							
							<div id="ubicacion">
					
							</div>
							</br>
								
							</div>
					<!--Generarse google maps-->
					
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
