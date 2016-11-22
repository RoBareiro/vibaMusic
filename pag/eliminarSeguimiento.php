<?PHP
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	$usuario = $_SESSION["usuario"];

	$nombreUsuarioAEliminar = $_GET["elUsuario"];
	echo $nombreUsuarioAEliminar; die();
?>