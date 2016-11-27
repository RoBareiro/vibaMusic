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

	if(mysqli_num_rows($query) == 0){ //si no encuentro un registro, significa que no lo vote
		$votoQuery = "INSERT INTO voto (id_voto, id_playlist, id_usuario) VALUES('', '$id_playlist', '$miId')";
		$accionQuery = mysqli_query($conexion, $votoQuery);
		echo "<font style='color: green;'>Usted vot&oacute; Positivo</font>";
	}
	else{
		echo "<font style='color: red;'>Usted ya vot&oacute; Positivo a esta playlist</font>";
	}
?>