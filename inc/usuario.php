<?php 
    /*Manejo de Usuario*/

    require_once "conexionbd.php";

        class Usuario{
                private $nombre;
                private $apellido;
                private $email;
                private $usuario;
                private $clave;
                private $rol = 'usuario';
                
?> 