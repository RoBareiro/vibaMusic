<?php
	error_reporting(0);	/*Desactiva cualquier notificacion*/
	session_start();
	$usuario = $_SESSION["usuario"];
	include("../inc/conexionbd.php");
?>

	<!--Para validar el navegador ajax-->
	<script type="text/javascript">
		
		function getXMLHTTP() {
	        var xmlhttp=false;
	        try{
	            xmlhttp=new XMLHttpRequest();
	        }
	        catch(e)	{
	            try{
	                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            catch(e){
	                try{
	                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	                }
	                catch(e){
	                    xmlhttp=false;
	                }
	            }
	        }
	        return xmlhttp;
    	}
</script>
<!DOCTYPE html>
<html>
	<head>
				<!--Menu de ajax-->
		<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
			<!--FUNCION QUE AGREGA CANCIONES agregarCanciones.php-->
		<script>
		function agregarCanciones() {
		    var strURL="agregarCanciones.php";
		    var req = getXMLHTTP();
		    if (req) {
		        req.onreadystatechange = function() {
		            if (req.readyState == 4) {
		                // only if "OK"
		                if (req.status == 200) {
		                    document.getElementById('central').innerHTML = req.responseText ;
		                } else {
		                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
		                }
		            }
		        }
					req.open("GET", strURL, true);
					req.send();
				}   
			}
			</script>
		<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!---- animated-css ---->
		<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script type="text/javascript" src="../js/jquery.corner.js"></script> 
		<script src="../js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
		<!---- animated-css ---->
		<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="../js/move-top.js"></script>
		<script type="text/javascript" src="../js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!---- start-smoth-scrolling---->
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
	<title>Viba Music!</title>
		
		</head>
		<body>
		<form enctype='multipart/form-data' action='agregarCanciones.php' method='post'>
			<input name='uploadedfile' type='file'><br>
			<input type='submit' value='Subir archivo' style="color: black;">
		</form>
	<?php 
		error_reporting(0);
		$target_path = "../uploads/";
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){
					echo '<script language="javascript">alert("El archivo subio correctamente");</script>';

			}
			header("Location:playlist.php");
	?>		
			<br>
				<a href="../uploads">Lista de archivos subidos exitosamente</a>

				<!--PREGUNTAR POR AJAX A ROOOOO-->

		</body>
</html>