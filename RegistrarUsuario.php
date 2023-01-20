<?php
	sleep(1);
	$name = $_POST['nombres'];
	$nick = $_POST['nick'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	
	require("con_db.php");
	$checkemail = mysqli_query($enlace,"SELECT * FROM usuario WHERE correo = '$email'");
	$check_mail = mysqli_num_rows($checkemail);
		if ($check_mail > 0){
			echo ' <script
				language="javascript">alert("Atencion,ya existe el mail designado para usuario, verifique sus datos"); </script>
				';
		}else{
			mysqli_query($enlace,"INSERT INTO usuario VALUES('','$name','$nick','$email','$password')");
			echo ' <script
				language="javascript">alert("Usuario registrado con exito, por favor inicie sesion");</script> ';
				header("Location:login.php");
			

		}

		?>

