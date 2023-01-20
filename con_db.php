<?php 
	$enlace = new MySQLi("localhost","root","","artes_mex");
	if($enlace -> connect_errno){
		die("Fallo la conexion a MySQL:(" . $enlace -> mysqli_connect_errno()
		    .")" . $enlace -> mysqli_connect_error());
	}
	else
?>