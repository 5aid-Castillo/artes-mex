<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
     <link rel="stylesheet" href="css/stylepage.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>ArtesMex</title>
</head>

<body>
	
<section class="form-register">
<form method="post" autocomplete="off"> 
	<div class="container">

		<h4>Formulario de Registro</h4>
		<input type="text" name="nombres" placeholder="Ingrese su nombre" class="controls" required>
		<input type="text" name="nick" placeholder="Ingrese su usuario" class="controls" required>
		<input type="email" name="email" placeholder="Ingrese su correo" class="controls" >
		<input type="password" name="password" placeholder="Ingrese su contraseña" class="controls" required>



		<p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>	
	<input class="botons" type="submit" name="registrar" value="Registrar"><p><a href="login.php">¿Ya tengo Cuenta?</a></p></input>

</form>

</section>



<?php
if(isset($_POST['registrar'])){
		require("RegistrarUsuario.php");
}
?>
</body>
</html>