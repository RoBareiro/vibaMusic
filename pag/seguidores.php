<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];

	/*consulta para obtener mi ID*/
	$consultaMiUsuario = "SELECT id_usuario FROM usuario WHERE usuario = '$usuario' ";
	$resultadoMiUsuario = mysqli_query($conexion,$consultaMiUsuario);
	$fila = mysqli_fetch_row($resultadoMiUsuario);

	$consulta = "SELECT usuario FROM usuario INNER JOIN sigue_a ON id_seguido = '$fila[0]' AND estado = 'sigue' ";
	$resultado = mysqli_query($conexion, $consulta);

	if(mysqli_num_rows($resultado) != 0){
		echo "PERSONAS QUE ME SIGUEN</br></br>";

		echo "<div>";
		echo "<table class='seguidores'>";  
	
		while($row = mysqli_fetch_row($resultado)){   
		    echo "<tr class='trSeguidores'><td class='trSeguidores'>".$row[0]."</td><td class='trSeguidores'><input type='button' class='botonSeguidores' value='Dejar de Seguir'></imput></td>"; 
		    echo "</tr>";  
		}  
	
		echo "</table>";
		echo "</div>";
	}
	else{
		echo "<div class='seguidores'>NO TE SIGUE NADIE</br></br>";
		echo "</div>";
	}
?>