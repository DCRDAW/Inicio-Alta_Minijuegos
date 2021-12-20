<?php
    require_once 'admin.php';
    function form(){
        echo'
        <form name="formulario1" method="post" action="">
        <label for="nick">Nick:</label>
        <input type="text" id="nick" name="nick" placeholder="introduce tu nick" required>
        <label for="correo">Correo:</label>
        <input type="text" id="correo" name="correo" placeholder="introduce el correo" required>
        <label for="pw">Contraseña:</label>
        <input type="password" id="pw" name="pw" placeholder="introduce la contraseña" required>
        <br /><br />
        <h4>Elige tus juegos favoritos</h4>
        ';
        sacarJuegos();
        echo'
        <input type="submit" id="boton" name="boton" value="enviar">
        </form>
             ';
    }

    function sacarJuegos(){
        $admin=new Admin();
        $nfilas=$admin->sacarJuegos();
        if ($nfilas>0) {
            $filas=$admin->sacarFilas();
            for($i=0;$i<$nfilas;$i++){
                echo' <input type="checkbox" id='.$filas[$i]['nombre'].' name="preferencia[]" value='.$filas[$i]['idMinijuego'].'>';
                echo '<label for='.$filas[$i]['nombre'].'">'.$filas[$i]['nombre'].'</label><br>';
                
            }
        }
        
    }
    function enviado(){
        $admin=new Admin();
        $nick="'".$_POST['nick']."'";
        $correo="'".$_POST['correo']."'";
        $pw="'".$_POST['pw']."'";
        $juegos=$_POST['preferencia'];
        $admin->alta($nick,$correo,$pw,$juegos);
        
        
    }
?>
<!DOCTYPE html>
<!-- Diego Carrión Rodríguez-->
<html>
	<head>
		<title>Formulario</title>
	</head>
	<body>
		<!-- encabezado de la página-->
		<h1 id="titulo">
			form
		</h1>
		
		<div>
			<!-- formulario-->
            <?php
                if(isset($_POST["boton"])){
                    enviado();   
                }else{
                    form();
                }
             ?>   
    
		</div>
	</body>
</html>	