<?php
    require_once '../conexion.php';
    /*clase admin, que es la que llama a la conexion */
    class Admin 
    {
        public $conexion;
        function __construct(){
            $this->conexion=new Conexion();
        }

        function inicioSesion($correo,$pw){
            $consulta= 'SELECT nick FROM usuario WHERE correo='.$correo.'and password='.$pw;
            $this->conexion->consultar($consulta);
            if(empty($this->conexion->nfilas())){
                echo 'la contraseña o el correo estan mal introducidos';
                $_SESSION["nombre"] =null;
            }else{
                $_SESSION["nombre"] = $this->conexion->extraerFilas()['nick'];
                echo 'bienvenido,'.$_SESSION["nombre"];
            }
        }
    }
?>    