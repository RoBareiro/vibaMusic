<?PHP
	/*Hacemos el voto Positivo*/
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	include("../inc/conexionbd.php");
	
	$id_playlist = $_GET['id_playlist'];
	$usuario = $_GET["usuario"];

	/*mi id*/
	$consultaId = "SELECT id_usuario from usuario WHERE usuario = '$usuario' ";
	$accion = mysqli_query($conexion, $consultaId);
	$id = mysqli_fetch_assoc($accion);
	$miId = $id["id_usuario"];
	
	/*busco si ya vote positivo*/
	$buscar = "SELECT * FROM voto WHERE id_usuario = '$miId' AND id_playlist = '$id_playlist' ";
	$query = mysqli_query($conexion, $buscar);

	if(mysqli_num_rows($query) == 1){ //si encuentra el voto, lo borra
		$votoQuery = "DELETE FROM voto WHERE id_playlist = '$id_playlist' AND id_usuario = '$miId' ";
		$accionQuery = mysqli_query($conexion, $votoQuery);
		echo "<font style='color: green;'>Usted vot&oacute; Negativo</font>";
	}
	else{
		echo "<font style='color: red;'>Usted ya vot&oacute; Negativo a esta playlist</font>";
	}
?>











