<?php
    class Conexion
    {
        public $mysqli;
        public $resultado;
        function __construct(){
            $this->mysqli = new mysqli('localhost', 'root', '', 'minijuego');
        }
        //hace la consulta
        function consultar($consulta){
            $this->resultado= $this->mysqli->query($consulta);
            return $this->resultado;
        }
        //hace el fetch
        function extraerFilas(){
            return $this->resultado->fetch_assoc();
        }
        //devuelve el numero de error
        function error(){
            return $this->mysqli->errno;
        }
        //devuelve el numero de filas afectadas
        function filasAfectadas(){
            return $this->mysqli->affected_rows;
        }
        function nfilas(){
            return  $this->resultado ->num_rows;
        }
    }
?>
