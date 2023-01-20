<?php
 	
	session_start();
	if(@!$_SESSION['Usuario']){
		header("Location:index2.php");
	}
	include'con_db.php';

	if(!isset($_SESSION['carrito'])){header("Location:PaginaPrincipal.php");}
	
	$arreglo=$_SESSION['carrito'];
	$total=0;
	for($i=0;$i<count($arreglo);$i++){
		$total = $total + $arreglo[$i]['Price'];	
	}


	//$myslqi ->query('SELECT * FROM login WHERE id=.'.$_GET['id']) or die($mysqli->error);
	//$_GET['id'] = $id_usuario;
//if(isset($_GET['id'])){

$re = $enlace->query('SELECT IdUsuario,correo from usuario')or die($enlace->error);
	//	$id_usuario=0;

	//	if(mysqli_num_rows($re)>0){
	$fila=mysqli_fetch_row($re);
	$id_usuario=$_SESSION['IdUsuario'];
	
//}
//}else{

//}

		//if(isset($_GET['id']))
		//	$user="";
			//$email="";
			//$re=$mysqli->query('SELECT * FROM login WHERE id='.$_GET['id']) or die ($mysqli->error);
		//$fila=mysqli_fetch_row($re);
		//$user=$fila[1];
		//$email=$fila[3];
		//$arr[]= array(
			//'ID'=>$_GET['id'],
		//	'User' =>$user,
		//	'Email'=>$email
		//	);
	//	$_SESSION['carrito']=$arr;



	$fecha = date('Y,m,d h:m:s');
	$enlace ->query("INSERT INTO ventas(id_usuario,total,fecha) values($id_usuario,$total,'$fecha')") or die($enlace ->error);
	$id_venta= $enlace ->insert_id; 

	for ($i=0; $i<count($arreglo); $i++) {
		$enlace ->query("INSERT INTO productos_venta(id_venta,id_producto,precio) values(
			
			$id_venta,
			".$arreglo[$i]['Id'].",
			".$arreglo[$i]['Price']."
			) ")or die($enlace ->error); 
	}



$enlace ->query("INSERT INTO envios(pais,direccion,estado,cp,id_venta,phone)values(
	
	'".$_POST['pais']."',
	'".$_POST['direccion']."',
	'".$_POST['estado']."',
	'".$_POST['cp']."',
	$id_venta,
	'".$_POST['phone']."'
	)

	")or die($enlace->error);

include 'mail.php';

unset($_SESSION['carrito']);
header("Location:pagar.php?id_venta=".$id_venta);
?>