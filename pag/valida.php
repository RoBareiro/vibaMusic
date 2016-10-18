<?php 
    error_reporting(0); /*Desactiva cualquier notificacion*/
    include("conexionbd.php");

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    if(isset($_POST["enviar"])){

      if(isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
          
          if(ereg("^[a-zA-Z0-9]", $usuario)){
            if((strlen($usuario)>=4)&&(strlen($usuario)<=10)){

              if(isset($_POST["password"])){
                $password = $_POST["password"];

                if(ereg("^[a-zA-Z0-9]", $password)){

                  $passwordMd5 = md5($password);


     function validaNombre($nombre){
        if(isset($nombre)){
          if(trim($nombre) != ''){
            if(ereg("^[a-zA-Z]",$nombre){
              return true;
            }
            else
            {
              return echo "Solo deben ingresarse letras en el nombre";; /*funcion ereg*/
            }
          }
          else
          {
            return echo "Debe ingresar un nombre";; /*funcion trim*/
          }
        }
        else{
          return false; /*funcion isset*/
        }


  

     function validaApellido($valor, $opciones=null){
        if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
           return false;
        }else{
           return true;
        }
     }

     function validaUsuario($valor, $opciones=null){
        if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
           return false;
        }else{
           return true;
        }
     }

     function validaClave($valor, $opciones=null){
        if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
           return false;
        }else{
           return true;
        }
     }

     function validaEmail($valor){
        if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
           return false;
        }else{
           return true;
        }
     }
?>