<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	include("../inc/conexionbd.php");
	session_start();
	$usuario = $_SESSION["usuario"];

	if(isset($_POST["enviarPlaylist"])){
			$nombre= $_POST['nombre'];
			$genero= $_POST['genero'];
			$tipo= $_POST['tipoP'];
			$imagen = $_POST['ruta'];

			$id= "SELECT id_usuario from usuario where usuario = '$usuario'";
			$consultaid= mysqli_query($conexion, $id);	//ESTO TE DEVUELVE UNA CANTIDAD DE FILAS
			$assoc = mysqli_fetch_assoc($consultaid);	//ESTO GUARDA UN ARRAY CON EL INDICE COMO NOMBRE
			$elId = $assoc["id_usuario"];	//ESTO GUARDA EN $elID EL VALOR QUE TRAE EL ARRAY 
			$fechac= date('y-m-d');

			$insertarp = "INSERT into playlist (id_playlist, id_usuario, id_genero, id_reproduccion, nombre, codigo_qr, fecha_creacion, imagen, link, tipo)
							VALUES('', '$elId', '$genero', '', '$nombre', '', '$fechac', '$imagen', 'NULL', '$tipo')";
			$consultap= mysqli_query($conexion, $insertarp);
			header("location: playlistsOk.php");
			}
			
	/*//set it to writable location, a place for temp generated PNG files
	$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'../qr/temp'.DIRECTORY_SEPARATOR;
	//html PNG location prefix
	$PNG_WEB_DIR = '../qr/temp/';
	include ("../qr/qrlib.php");    
	//ofcourse we need rights to create temp dir
	if (!file_exists($PNG_TEMP_DIR))
	mkdir($PNG_TEMP_DIR);
	$filename = $PNG_TEMP_DIR.'test.png';
	$matrixPointSize = 10;
	$errorCorrectionLevel = 'L';
	$filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
	QRcode::png('información', $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
	echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>'; */

	

?>

<!DOCTYPE>
<html>
<head>
		<!--Menu de ajax-->
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
<body>
	<div>
		<form method="POST" action="crearPlaylist.php"  enctype='multipart/form-data'>
			Nombre: <input type="text" name="nombre" size="20" style="color: black;"></input></br><br>
			<label>Género</label>
				<select name="genero" style="color: black">
					<option value="1">Pop</option>
					<option value="2">Rock</option>
					<option value="3">R&B</option>
					<option value="4">Rap</option>
					<option value="5">Hip-Hop</option>
					<option value="6">Reaggeton</option>
					<option value="7">Reagge</option>
					<option value="8">Balada</option>
					<option value="9">Electro</option>
				</select><br><br>

			<label>Tipo de Playlist: </label>
				<select style="color: black;" name="tipoP"> 
					<option value="publica">Pública</option>
					<option value="misSeguidores">Mis seguidores</option>
					<option value="soloYo">Solo yo</option>
				</select>
				<span><h4>Por defecto la playlist es Pública</h4></span><br><br>
			
			<label>Ahora, elegí tus canciones:</label><br>
				<select multiple="multiple" style="color:black; width:300px; height:250px;">
					<?PHP
					$consultac = "SELECT titulo FROM cancion";
					$resultadoc = mysqli_query($conexion, $consultac);
		        	$numerodefilas = mysqli_num_rows($resultadoc);
					$i=0;
					          while($fila = mysqli_fetch_array($resultadoc)){
					            $i++;
					            if($i<$numerodefilas){ // No es la última fila
					              echo "<option>" . $fila['titulo'] . "</option>'";
						            }
					            else{ // Sí es la última fila
					              echo "<option>" . $fila['titulo'] . "</option>'";
						            }
					          }
					?>		
				</select>
				<br><br>
				<?PHP
						echo "<input type='file' name='archivo' id='archivo'></input></br>";
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
									        if (file_exists("../imgPlaylist/" . $_FILES["archivo"]["name"])){
									          echo $_FILES["archivo"]["name"] . " ya existe una imagen con el mismo nombre de archivo. ";
									        }
									        else{
									         // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
									          $numeroAleatorio =  rand(0,1000000);

									          move_uploaded_file($_FILES["archivo"]["tmp_name"],
									          "../imgPlaylist/". $numeroAleatorio . $_FILES["archivo"]["name"]);

									         $rutaImagen = "../imgPlaylist/". $numeroAleatorio . $_FILES['archivo']['name'];		
									        }
									      }
									    }			    
									    echo "<input type='hidden' name='ruta' value='" .$rutaImagen. "'></input>";				
				?> 
				<br><br>
				<input type="reset" name="borrarPlaylist" value="Deshacer" class="botonlogin"></input>
				<input type="submit" name="enviarPlaylist" value="Crear Playlist" class="botonlogin"></input>
		</form>

	</div>
</body>
</html>