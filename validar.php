<?php


session_start();
require("con_db.php");
sleep(1);

$email = $_POST['email'];
$password = sha1($_POST['password']);

$res = mysqli_query($enlace, "SELECT * FROM usuario WHERE correo = '$email'");
if($f = mysqli_fetch_array($res)){
	if($password == $f['contrasena']){
			$_SESSION['IdUsuario']=$f['IdUsuario'];
			$_SESSION['Usuario']=$f['Usuario'];
		
			header("Location:PaginaPrincipal.php");
			
		
	}else{
		echo'<script>alert("PASSWORD INCORRECTA")</script>';

		echo "<script>location.href='login.php'</script>";
	}

}else{
	echo'<script>alert("ESTE USUARIO NO EXISTE POR FAVOR REGISTRESE PARA PODER INGRESAR")</script>';

		echo "<script>location.href='index.php'</script>";

}



	?>




