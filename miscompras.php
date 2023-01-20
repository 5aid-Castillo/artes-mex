<?php
 
	session_start();
	include('con_db.php');
	//$arreglo = $_SESSION['carrito'];
	if(!isset($_GET['id_venta'])){
		header("Location:PaginaPrincipal.php");
	}
	

	$datos = $enlace->query("SELECT
	ventas.*,
	usuario.Usuario,usuario.correo 
	 FROM ventas 
	 INNER JOIN usuario on ventas.id_usuario = usuario.IdUsuario
	 WHERE ventas.id=".$_GET['id_venta']) or die($enlace->error);
	$datosUsuario=mysqli_fetch_row($datos);
	
	

	$datos2=$enlace->query("SELECT * FROM envios WHERE id_venta=".$_GET['id_venta']) or die ($enlace->error);
	$datosEnvio= mysqli_fetch_row($datos2);

	

	$datos3=$enlace ->query("SELECT productos_venta.*,
			productos.nombre as nombre_producto, productos.imagennombre
			from productos_venta inner join productos on productos_venta.id_producto = productos.id 
			where id_venta =".$_GET['id_venta'])or die ($enlace ->error);

	//$datos4=$mysqli ->query("SELECT * FROM login ")or die($mysqli->error);
	//$datosuser=mysqli_fetch_row($datos4);

	//$datos5=$mysqli ->query("SELECT * FROM ventas WHERE id") or die($mysqli ->error);
	//$datosvent=mysqli_fetch_row($datos5);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>See Order</title>
		<link rel="stylesheet" href="css/stylepage.css" media="screen">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/index.css">
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

		<li><a href="">Vender</a></li>
	

		<li><a href="miscompras.php">Mis Compras</a></li>

		<li><a href="carrito.php"> &#x1f6d2; </a></li>



		<li><a href="" style="color: #C0392B;"> <strong> <?php echo  $_SESSION['Usuario'];?> </strong></a></li>

		<li><a href="desconectar.php">Salir</a></li>

	</ul>

</nav>


</div>
</div>

</head>
<body>
<br>
	<div class="store-wrapper">           
		<h1 style="color:#fff;">Ver Pedido</h1>
	</div>

<div class="pedido" align="center">

<form action="#" method="post">

<div style="background: #0099CC; color: #fff;width: 350px; height: 100px; border-radius: 10px;">
	

<label><strong>Nombre:</strong> <?php echo $datosUsuario[4];?></label><br>
<label><strong>Correo Electronico: </strong><?php echo $datosUsuario[5];?></label><br>
<label><strong>Direccion: </strong> <?php echo $datosEnvio[2];?></label><br>
<label><strong>Estado: </strong> <?php echo $datosEnvio[3]?></label><br>



</div>

</form>
<?php
	while($f = mysqli_fetch_array($datos3)){
?>
<div>
	<div class="product-box"><br><br>
	<div class="product">	
	<img src="assets/<?php echo $f['imagennombre']; ?>"><br></div></div><br><br><br>
	<div style="background: #0099CC;color: #fff; width: 350px; height: 75px; border-radius:10px;">
	<span><?php echo $f['nombre_producto'];?>&nbsp;</span><br>
	<span><strong>Precio: $<?php echo $f['precio'];?></strong></span>

	<h4>Total: $<?php echo $datosUsuario[2];?></h4>

</div>
<?php } ?>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
</body>


</html>

