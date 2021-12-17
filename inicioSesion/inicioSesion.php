<?php
    session_start();
    /*crea el formulario */
    function form(){
        echo'<form name="formulario1" method="post" action="">
             <label for="correo">Correo:</label>
             <input type="email" id="correo" name="correo" placeholder="introduce tu correo" required>
             <label for="pw">contraseña:</label>
             <input type="password" id="pw" name="pw" placeholder="introduce la contraseña" required>
             <input type="submit" id="boton" name="boton" value="enviar">
             </form>';
    }
    /*introduce la puntuacion en la bbdd*/
    function inicioSesion(){
        require_once 'operacionesInicio.php';
        $introducir= new Admin();
        $correo="'".$_POST['correo']."'";
        $pw="'".$_POST['pw']."'";
        $introducir->inicioSesion($correo, $pw);
        /*recarga la pagina*/
        echo'<form  action="">
                      <input type="submit" value="volver a buscar" onclick="window.location.reload()">
             </form>';
    }
?>
<!DOCTYPE html>
<!-- Diego Carrión Rodríguez-->
<html>
	<head>
		<title>Inicio Sesion</title>
	</head>
	<body>
		<!-- encabezado de la página-->
		<h1 id="titulo">
			Inicio Sesion
		</h1>
		
		<div>
			<!-- formulario-->
            <?php
                if(isset($_POST["boton"])){
                    inicioSesion();
                }else{
                    form();
                }
             ?>   
    
		</div>
	</body>
</html>	