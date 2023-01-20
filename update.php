<?php
include('con_db.php');

$ide=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$id_categoria=$_POST['id_categoria'];
$id_categoria1=0;

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

$sql="UPDATE productos SET  nombre='$nombre',descripcion='$descripcion',precio='$precio',stock='$stock',imagennombre='$imagennombre2',id_categoria='$id_categoria1' WHERE id='$ide'";
$query= mysqli_query($enlace, $sql);

if($query){
    Header("Location: venderenp.php");
    
}else {
}
?>
