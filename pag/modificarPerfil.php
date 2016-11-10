<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];

	/*pregunto si es usuario o admin*/
	$consulta = "SELECT rol FROM usuario WHERE usuario = '$usuario'";
	$resultado = mysqli_query($conexion, $consulta);


	if(mysqli_num_rows($resultado)==1){
		$rol = mysqli_fetch_row($resultado);

		if($rol[0] == 'usuario'){
			echo "<a href='actualizarUsuario.php'><div style='color: white;'>Cambiar Nombre De Usuario</div></a></br>";
			echo "<a href='actualizarClave.php'><div style='color: white;'>Cambiar Clave</div></a></br>";
			echo "<a href='actualizarFoto.php'><div style='color: white;'>Cambiar Foto De Perfil</div></a></br>";
			echo "<a href='actualizarUbicacion.php'><div style='color: white;'>Ver Mi Ubicaci&oacute;n Geogr&aacute;fica actual</div></a></br>";
			
		}
		else{
			echo "<a href='actualizarAdmin.php'><div style='color: white;'>Cambiar Nombre De Administrador</div></a></br>";
			echo "<a href='actualizarClaveAdmin.php'><div style='color: white;'>Cambiar Clave</div></a></br>";
			echo "<a href='actualizarFotoAdmin.php'><div style='color: white;'>Cambiar Foto De Perfil</div></a></br>";
			echo "<a href='actualizarUbicacionAdmin.php'><div style='color: white;'>Ver Mi Ubicaci&oacute;n Geogr&aacute;fica actual</div></a></br>";
		}
	}


?>
