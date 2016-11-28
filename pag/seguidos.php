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


/*PARA BUSCAR LOS QUE SIGO*/
	$consulta = "SELECT u.usuario, u.foto_de_perfil, u.id_usuario, s.id_seguido FROM usuario u, sigue_a s WHERE u.id_usuario = s.id_seguido AND s.id_seguidor = '$miId' AND s.id_playlist = '$id_playlist'";

	$resultado = mysqli_query($conexion, $consulta);
	$found = false;

	echo "<font style='color: green;'>USUARIOS QUE SIGO</font></br>";

	if($cantidad = mysqli_num_rows($resultado) > 0){
		while($row = mysqli_fetch_array($resultado)){
				$found = true;

				echo "<form method='POST' action='eliminacionDeSeguimiento.php'>";	

				echo "<input type='hidden' name='id_seguido' value='".$row['id_seguido']."'></input>";
				echo "<input type='hidden' name='usuario' value='".$row['usuario']."'></input>";

				echo "<h3>".$row["usuario"]."</h3><img src='".$row["foto_de_perfil"]."' width='20%'></img></br>";	

				echo "</br><input class='botonBuscador' name='dejarDeSeguir' type='submit' value='Dejar de Seguir'></input>";
				echo '</form></br>';
		}
	}
	else{
		echo "<font>No sigue a ningun usuario</font>";
	}
?>