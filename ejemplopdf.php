<?php 
# Cargamos la librería dompdf.
error_reporting(0);	/*Desactiva cualquier notificacion*/
require_once ('dompdf/dompdf_config.custom.inc.php');
require_once('dompdf/dompdf_config.inc.php');


# Contenido HTML del documento que queremos generar en PDF.
$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ejemplo de Documento en PDF.</title>
</head>
<body>

<h2>Ingredientes para la realización de Postres.</h2>
<p>Ingredientes:</p>
<dl>
<dt>Chocolate</dt>
<dd>Cacao</dd>
<dd>Azucar</dd>
<dd>Leche</dd>
<dt>Caramelo</dt>
<dd>Azucar</dd>
<dd>Colorantes</dd>
</dl>

</body>
</html>';

$dompdf = new DOMPDF();
$dompdf ->set_paper("A4", "portrait");
$dompdf->load_html(utf8_decode($html));
$dompdf->render();
$dompdf->stream("sample.pdf");


?>