<?php
session_start();

include('con_db.php');

$nombreus=$_SESSION['Usuario'];
	
//echo $nombreus;
	
$consulta="SELECT IdUsuario FROM usuario WHERE usuario='$nombreus'";
$EjecutarConsulta=mysqli_query($enlace, $consulta);
$verfilas=mysqli_num_rows($EjecutarConsulta);
$fila= mysqli_fetch_array($EjecutarConsulta);

//echo $fila[0];//este contiene el id del usuario idUsuarioVende
$idUsuarioVende = $fila[0];
//$consulta1="SELECT * FROM productos WHERE idUsuarioVende='$fila[0]'";
//$EjecutarConsulta1=mysqli_query($enlace, $consulta1);
//$verfilas1=mysqli_num_rows($EjecutarConsulta1);
//$fila1= mysqli_fetch_array($EjecutarConsulta1);


$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
//$imagennombre=$_POST['imagennombre'];
//$imagennombre=isset($_POST['imagennombre'])? $_POST['imagennombre'] : '';
$id_categoria=$_POST['id_categoria'];
$id_categoria1=0;
//$id_vendedor = $_POST['idUsuarioVende'];



if (!file_exists($_FILES['imagennombre']['tmp_name']) || !is_uploaded_file($_FILES['imagennombre']['tmp_name']))
{
	$imagennombre2=$_POST["imagennombre1"];
}
else 
{
	$ext = explode(".", $_FILES["imagennombre"]["name"]);
	if ($_FILES['imagennombre']['type'] == "image/jpg" || $_FILES['imagennombre']['type'] == "image/jpeg" || $_FILES['imagennombre']['type'] == "image/png")
	{
		$imagennombre2 = round(microtime(true)) . '.' . end($ext);
		move_uploaded_file($_FILES["imagennombre"]["tmp_name"], "assets/" . $imagennombre2);
	}
}

if ($id_categoria=='Alebrijes') {
	$id_categoria1=1;
}
if ($id_categoria=='Barro') {
	$id_categoria1=2;
}
if ($id_categoria=='Guayaveras') {
	$id_categoria1=3;
}
if ($id_categoria=='Huipiles') {
	$id_categoria1=4;
}
if ($id_categoria=='Juguetes') {
	$id_categoria1=5;
}
if ($id_categoria=='Piñatas') {
	$id_categoria1=6;
}
if ($id_categoria=='Rebozos') {
	$id_categoria1=7;
}
if ($id_categoria=='Sarapes') {
	$id_categoria1=8;
}
if ($id_categoria=='Sombreros') {
	$id_categoria1=9;
}
if ($id_categoria=='Talabera') {
	$id_categoria1=10;
}

$sql="INSERT INTO productos (nombre, descripcion, precio, stock, imagennombre, idUsuarioVende, id_categoria) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$imagennombre2', '$idUsuarioVende', '$id_categoria1')";
$query= mysqli_query($enlace, $sql);

if($query){
    Header("Location: venderenp.php");
    
}else {
}
?>
