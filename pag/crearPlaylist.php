<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	include("../inc/conexionbd.php");
	session_start();

	

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
<body>
	<form method="POST" action="crearPlaylist.php">
	<div>
		<label>Tipo de Playlist: </label>
			<select style="color: black;"> 
				<option value="publica">Pública</option>
				<option value="misSeguidores">Mis seguidores</option>
				<option value="soloYo">Solo yo</option>
			</select>
			<span><h4>Por defecto la playlist es Pública</h4></span><br><br>
		
		Nombre: <input type="nombreplaylist" name="nombreplaylist" size="20" style="color: black;"></input></br><br>

		<label>Género</label>
			<select>
				<?PHP
				          $consulta = "SELECT nombre FROM genero";
				          $resultado = mysqli_query($conexion, $consulta);

				          $numerodefilas = mysqli_num_rows($resultado);
				          $i=0;

				          while($fila = mysqli_fetch_array($resultado)){
				            $i++;

				            if($i<$numerodefilas){ // No es la última fila
				              echo "<option>" . $fila['nombre'] . "</option>'";
				            }
				            else{ // Sí es la última fila
				              echo "<option>" . $fila['nombre'] . "</option>'";
				            }

				          }
				?>
			</select><br><br>
			

		<label>Ahora, elegí tus canciones:</label><br>
			<select multiple="multiple" style="color:black; width:300px; height:auto;">
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
				
			</select><br><br>

			<label>Compartí tu QR de esta playlist con tus amigos:</label><br>
			<img src="../images/qr.jpg">

			<h4>Si quieres agregar una canción que no esta, ingresa a Agregar Cancion</h4>
			
			
			<br><br>
			<input type="reset" name="borrarPlaylist" value="Deshacer" style="color: black;">
			<input type="submit" name="enviarPlaylist" value="Crear Playlist" style="color: black;">
			

			
		</div>
	</form>

</body>
</html>