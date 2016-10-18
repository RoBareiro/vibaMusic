<?php 
    /*Conexion a la bd Viba*/

    require_once "configbd.php";

        class Conexion{
                private $conexion;

                public function __construct(){
                        $this->conexion = new mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);   /*decia solo mysqli*/

                        if($this->conexion->connect_errno){
                                echo "Fallo al conectar a la Base de Datos: ". $this->conexion->connect_error;
                                return;    
                            }

                        $this->conexion->set_charset(DB_CHARSET);
                    }
            }
?> 