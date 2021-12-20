<?php
    require_once '../procesosDB.php';
    /*clase admin, que es la que llama a la conexion */
    class Admin 
    {
        public $conexion;

        function __construct(){
            $this->conexion=new Procesos();
        }
        function sacarJuegos(){
            $consulta= 'SELECT idMinijuego,nombre FROM minijuegos';
            $this->conexion->consultar($consulta);
            if($this->conexion->nfilas()==0){
                return $this->conexion->error();
            }else{
                return $this->conexion->nfilas();
            }
            
        }
        function alta($nick,$correo,$pw,$juegos){
            $usuario=null;
            $consulta='
                INSERT INTO usuarios(pw,nick,correo)
                    VALUES('.$pw.','.$nick.','.$correo.');
                
            ';
            $this->conexion->consultar($consulta);

            $consulta='
                SELECT idUsuario from usuarios
                where nick='.$nick.'and correo='.$correo.' ;
            ';
            $this->conexion->consultar($consulta);

            if(empty($this->conexion->error())){
                $usuario= $this->conexion->extraerFilas()[0]['idUsuario'];
            }else{
                echo $this->conexion->error();
            } 
            $consulta='INSERT INTO preferencias(idUsuario,idMinijuego)
            VALUES';
            for($i=0;$i<count($juegos);$i++){
                $consulta=$consulta.'('.$usuario.','.$juegos[$i].')';
                if ($i<count($juegos)-1) {
                    $consulta=$consulta.',';
                }else{
                    $consulta=$consulta.';';
                }
            }
            $this->conexion->consultar($consulta);
            if(empty($this->conexion->error())){
                echo 'todo correcto';
            }else{
                echo $this->conexion->error();
            } 
            
        }
        function sacarFilas(){
            return $this->conexion->extraerFilas();
        }
    }
?>    