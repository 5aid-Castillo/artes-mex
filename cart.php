<!DOCTYPE html>

 <?php
	session_start();
	if(@!$_SESSION['Usuario']){
		header("Location:login.php");
	}
	?>





<html lang="en">
<head>

	<meta charset="utf-8">
	<title>ArtesMex</title>
<link rel="stylesheet" href="css/stylepage.css">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">


<div class="logo" align="center">
	<a href="PaginaPrincipal.php">
		

		<figure class="triangulo-1"><figure class="triangulo-2"><figure class="triangulo-3"> </figure></figure></figure> 

	
			<h1 style="color: white;"> <strong> ARTES</strong><strong style="color: #1E8449;">M</strong>E<strong style="color: #C0392B ;">X </strong></h1> 
		
	
</a>

</div>

<div class="header">
	<div class="container">
<nav class="menu">
		

	<ul>
		
		
		<li><a href="">Categorias</a>
				<ul class="submenu">
					<li><a href="./categorias/alebrijes.php">Alebrijes</a></li>
					<li><a href="./categorias/barro.php">Barro</a></li>
					<li><a href="./categorias/guayaberas.php">Guayaberas</a></li>
					<li><a href="./categorias/huipiles.php">Huipiles</a></li>
					<li><a href="./categorias/juguetes.php">Juguetes</a></li>
					<li><a href="./categorias/pinatas.php">Pinatas</a></li>
					<li><a href="./categorias/rebozos.php">Rebozos</a></li>
					<li><a href="./categorias/sarapes.php">Sarapes</a></li>
					<li><a href="./categorias/sombreros.php">Sombreros</a></li>
					<li><a href="./categorias/talabera.php">Talabera</a></li>
					
				</ul>				
		</li>

		<li><a href="venderenp.php">Vender</a></li>
	

		<li><a href="miscompras.php">Mis Compras</a></li>

		<li><a href="carrito.php"> &#x1f6d2; </a></li>



		<li><a href="" style="color: #C0392B;"> <strong><?php echo  $_SESSION['Usuario'];?> </strong></a></li>

		<li><a href="desconectar.php">Salir</a></li>

	</ul>

</nav>


</div>
</div>
</head>


<body>
		<br><br>

<div align="center" class="tit-car" style="color:#FE2E9A">
		<h1>Carrito de Compras</h1>
	</div>	<br>

<?php
include('con_db.php');
if(isset($_SESSION['carrito'])){
	if(isset($_GET['id'])){
		$arreglo=$_SESSION['carrito'];
		$encontro=false;
		$numero=0;
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['Id'] == $_GET['id']){
				$encontro=true;
				$numero=$i;

			}
		}
		if($encontro == true){
			//$arreglo[$numero]=$arreglo[$numero]+1;
			$_SESSION['carrito']=$arreglo;
			header("Location:cart.php");
		}else{
			//no estaba el registro
		$name="";
		$price="";
		$image_p="";
		$res=$enlace ->query('SELECT * FROM productos WHERE id='.$_GET['id'])or die($enlace ->error);
		$fila=mysqli_fetch_row($res);
		$name=$fila[1];
		$price=$fila[3];
		$image_p=$fila[5];
		$arregloNuevo= array(
			'Id'=>$_GET['id'],
			'Name'=>$name,
			'Price'=>$price,
			'Img'=>$image_p
		);
		array_push($arreglo, $arregloNuevo);
		$_SESSION['carrito']=$arreglo;
		header("Location:cart.php");
		}
	}
}else{
	if(isset($_GET['id'])){
		$name="";
		$price="";
		$image_p="";
		$res=$enlace ->query('SELECT * FROM productos WHERE id='.$_GET['id'])or die($enlace ->error);
		$fila=mysqli_fetch_row($res);
		$name=$fila[1];
		$price=$fila[3];
		$image_p=$fila[5];
		$arreglo[]= array(
			'Id'=>$_GET['id'],
			'Name'=>$name,
			'Price'=>$price,
			'Img'=>$image_p
			
		);
		$_SESSION['carrito']=$arreglo;
		header("Location:cart.php");
	}
}
?>

<form method="post">

<div class="table-carrito" align="center">

	<table class="table1" border="1"  width="70%" style="border-radius: 6px">
		<thead class="head-table">
			<tr>
			
			<th>Imagen del Producto</th>
			<th>Producto</th>
			<th>Precio</th>
			<th>Eliminar</th>
		 	</tr>
		</thead>
		
<tbody>


<?php
$total=0;
	if (isset($_SESSION['carrito'])) {
		$arregloCarrito = $_SESSION['carrito'];
		for($i=0;$i<count($arregloCarrito);$i++){
			$total=$total + ($arregloCarrito[$i]['Price']);
?>

<tr>
	
	<td align="center">
		<img src="assets/<?php echo $arregloCarrito[$i]['Img'];?>" width="250px" height="250px"></td>

	<td align="center"><?php echo $arregloCarrito[$i]['Name'];?></td>
	

	<td align="center">$<?php echo $arregloCarrito[$i]['Price'];?></td>

	<td align="center"><a href="eliminarcarrito.php" class ="btn-remove"  data-id="<?php echo $arregloCarrito[$i]['Id'];?>" style="border-radius:10px;position: relative;display: inline-block;padding:15px 30px; color: #ECF0F1 ; letter-spacing: 4px; font-size: 24px;text-decoration:none; overflow:hidden; background: #C0392B; transition:0.2;" ><style> .btn-remove:hover{box-shadow: 0 0 20px  #EC7063   , 0 0 60px  #EC7063   , 0 0 80px  #EC7063 ;transition-delay: 0.1s;background:  #EC7063 ;color:#F1948A ;}</style> X </a></td>
</tr>



<?php }}?>

</tbody>
</table>
	<div style="background: #FAFAFA;border-radius: 5px; width: 20%; padding: 1.5%;">

				<h3 style="background: #FAFAFA;">Total del Carrito</h3>
				<strong style="color: #31B404">$<?php echo $total; ?> USD</strong>
	
		</div>
		

</div>
		
</form>


	
<br>
<br>
<div align="center">
<a href="PaginaPrincipal.php" class="pag-prin">&#10096; Continuar Comprando</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="checkout.php" class="pag-prin">Solicitar Compra	&#10097;</a>
</div>
<br><br>


<!--css de la tabla-->
<style> 
.head-table{
	background: #0099CC;
	color: white;
}
tbody tr:nth-child(odd){
	background-color: #FAFAFA;
}
tbody tr:nth-child(even){
	background-color:#A9D0F5 ;

}

.pag-prin{
    	  display: block;
    	  
    	 text-decoration: none;
    	 color: #0099CC;
    	 background: transparent;
    	 border: 2px solid #0099CC;
    	 border-radius: 6px;
    	 border: none;
      	 color: white;
     	 padding: 16px 32px;
      	 text-align: center;
     	 display: inline-block;
      	 font-size: 16px;
      	 margin: 4px 2px;
      	 -webkit-transition-duration: 0.4s; /* Safari */
      	 transition-duration: 0.4s;
      	 cursor: pointer;
      	 text-decoration: none;
      	 text-transform: uppercase;
    	 background-color: white; 
     	 color: #566573; 
      	 border: 5px solid #008CBA;
    	}
    	.pag-prin:hover{
    	background-color: #008CBA;
      	color: white;
    	}
    	.boton-disum{
    		display: block;
    	  
    	 text-decoration: none;
    	 color: #0099CC;
    	 background: transparent;
    	 border: 2px solid #0099CC;
    	 border-radius: 6px;
    	 border: none;
      	 color: white;
     	 padding: 10px 10px;
      	 text-align: center;
     	 display: inline-block;
      	 font-size: 12px;
      	 margin: 4px 2px;
      	 -webkit-transition-duration: 0.4s;
      	 transition-duration: 0.4s;
      	 cursor: pointer;
      	 text-decoration: none;
      	 text-transform: uppercase;
    	 background-color: white; 
     	 color: #566573; 
      	 border: 5px solid #008CBA;

    	}
    	.boton-disum:hover{
    		background-color: #008CBA;
      	color: white;

    	} 
    	.cant{
    		border-radius: 6px;
    		position: relative;
    		display: inline-block;
    		padding: 10px 4px;
    		text-align: center;
    		width: 15%;
    		letter-spacing: 4px;
    	}
    	.btn-remove{
    		border-radius: 10px;
    		position: relative;
    		display: inline-block;
    		padding: 15px 30px;
    		color: #ECF01;
    		letter-spacing: 4px;
    		font-size: 24px;
    		text-decoration: none;
    		overflow: hidden;
    		background:#C0392B;
    		transition: 0.2;
    	}
    	.btn-remove:hover{
    		box-shadow: 0 0 20px #EC7063, 0 0 60px #EC7063, 0 0 80px #EC7063;
    		transition-delay: 0.1s;
    		background:#EC7063;
    		color: #F1948A;
    	}


</style>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carouse1.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>
<script >
	$(document).ready(function(){
		$(".btn-remove").click(function(event){
			event.preventDefault();
			var id=$(this).data('id');
			var boton=$(this);
			$.ajax({
				method:'POST',
				url:'eliminarcarrito.php',
				data:{
					id:id
					}
			}).done(function(respuesta){
				boton.parent('td').parent('tr').remove();

			});

		});
	});
</script>
</body>
</html>