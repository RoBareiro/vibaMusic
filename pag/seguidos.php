<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];

	/*consulta para obtener mi ID*/
	$consultaMiUsuario = "SELECT id_usuario FROM usuario WHERE usuario = '$usuario' ";
	$resultadoMiUsuario = mysqli_query($conexion,$consultaMiUsuario);
	$fila = mysqli_fetch_assoc($resultadoMiUsuario);
	$miId = $fila["id_usuario"];
	$id_playlist = -1;

	$consulta = "SELECT usuario FROM usuario WHERE id_usuario = (SELECT id_seguido FROM sigue_a WHERE id_seguidor = '$miId' AND estado = 'sigue' AND id_playlist = '$id_playlist')";
	$resultado = mysqli_query($conexion, $consulta);

	if($cantidad = mysqli_num_rows($resultado) != 0){
		echo "PERSONAS QUE SEGUIS</br></br>";

		echo "<div>";
		echo "<table class='seguidores'>";  
	
		while($row = mysqli_fetch_array($resultado)){   
		    echo "<tr class='trSeguidores'><td class='trSeguidores'>".$row[0]."</td><td class='trSeguidores'><input type='button' class='botonSeguidores' value='Dejar de Seguir'></imput></td>"; 
		    echo "</tr>";  
		}  
	
		echo "</table>";
		echo "</div>";
	} 
	else{
		echo "<div class='seguidores'>NO SEGUIS A NADIE</br></br>";
		echo "</div>";
	}
?>