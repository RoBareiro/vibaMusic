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



/*PARA BUSCAR MIS SEGUIDORES*/
	$consulta = "SELECT u.usuario, u.foto_de_perfil, u.id_usuario, s.id_seguidor FROM usuario u, sigue_a s WHERE u.id_usuario = s.id_seguidor AND s.id_seguido = '$miId' AND s.id_playlist = '$id_playlist'";

	$resultado = mysqli_query($conexion, $consulta);
	$found = false;

	echo "<font style='color: green;'>USUARIOS QUE ME SIGUEN</font></br>";

	if($cantidad = mysqli_num_rows($resultado) > 0){
		while($row = mysqli_fetch_array($resultado)){
				$found = true;
				echo "<h3>".$row["usuario"]."</h3><img src='".$row["foto_de_perfil"]."' width='20%'></img></br></br>";	
		}
	}
	else{
		echo "<font>No tiene seguidores</font>";
	}
?>