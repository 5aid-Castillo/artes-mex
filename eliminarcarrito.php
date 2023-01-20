<?php
include('con_db.php');
include('cart.php');

$arreglo = $_SESSION['carrito'];
for($i=0;$i<count($arreglo);$i++){
	if($arreglo[$i]['Id'] != $_POST['id']){
		$arregloNuevo[]=array(
			'Id' =>$arreglo[$i]['Id'],
			'Name' =>$arreglo[$i]['Name'],
			'Price' =>$arreglo[$i]['Price'],
			'Img' =>$arreglo[$i]['Img']
		);
	}
}
if(isset($arregloNuevo)){
	$_SESSION['carrito'] = $arregloNuevo;
}else{
	unset($_SESSION['carrito']);
}
echo 'listo';

?>