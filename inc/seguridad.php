<?php 
	error_reporting(0);	/*Desactiva cualquier notificacion*/
		session_start();
			if(!($_SESION["registrado"] != "true")){ 
				session_destroy();
				header("location:errorRegistro.php"); //TENGO QUE CREAR UNA PAGINA DE ERROR PARA AVISAR AL USUARIO
			}

?>