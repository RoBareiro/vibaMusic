<?php 
    /*Conexion a la bd Viba*/
    require_once "configbd.php";

    /*Conectamos la bd*/
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("No se puede seleccionar la base de datos.");

?> 