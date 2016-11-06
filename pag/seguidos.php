<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
/*	$_SESSION["registrado"] = "true";	se supone que ya esta en true de otras paginas*/

	$consulta = "SELECT usuario FROM usuario INNER JOIN sigue_a ON id_usuario = id_seguidor AND estado = 'sigo' "; /*sigo - noSigo*/
	$resultado = mysqli_query($conexion, $consulta);

	if (mysqli_num_rows($resultado) != 0){
		echo "<div id='central'>PERSONAS QUE SIGO</br></br>";
		echo "<table>";  
		while ($row = mysqli_fetch_row($resultado)){   
		    echo "<tr>";  
		    echo "<td>$row[0]></td>";  
		    echo "</tr>";  
		}  
		echo "</table>";
		echo "</div>";
	}
	else{
		echo "<div id='central'>PERSONAS QUE SIGO</br></br>";
		echo "<div id='central'>NO SEGUIS A NADIE</br></br>";
		echo "</div>";
	}
?>