<!DOCTYPE html>

<?php
session_start(); //el usuario aparecera en la pagina principal 
?>


<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../css/stylepage.css">
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<script src="https://kit.fontawesome.com/e4f194785e.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../CSS DE PRINCIPAL/index.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


	<title>ArtexMex</title>


	<div class="logo" align="center">
	<a href="../PaginaPrincipal.php">
		

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
					<li><a href="alebrijes.php">Alebrijes</a></li>
					<li><a href="barro.php">Barro</a></li>
					<li><a href="guayaberas.php">Guayaberas</a></li>
					<li><a href="huipiles.php">Huipiles</a></li>
					<li><a href="juguetes.php">Juguetes</a></li>
					<li><a href="pinatas.php">Pinatas</a></li>
					<li><a href="rebozos.php">Rebozos</a></li>
					<li><a href="sarapes.php">Sarapes</a></li>
					<li><a href="sombreros.php">Sombreros</a></li>
					<li><a href="talabera.php">Talabera</a></li>
				</ul>				
		</li>
		<li><a href="../venderenp.php">Vender</a></li>
		<li><a href="../miscompras.php">Mis Compras</a></li>
		<li><a href="../carrito.php"> &#x1f6d2; </a></li>

		<li><a href="" style="color: #C0392B;"> <strong> <?php echo  $_SESSION['Usuario'];?> </strong></a></li>

		<li><a href="../desconectar.php">Salir</a></li>

	</ul>

</nav>


</div>
</div>


</head>
<body>

<div class="barra-busqueda">
	<div class="contenedor-busqueda">
		<form class="form-busqueda" action="../busqueda.php" method="GET">
			<div class="contenedor-busqueda-input">
				<input class="busqueda-input" type="search" placeholder="Buscar" name="texto">
			</div>
			<input class="busqueda-submit"type="submit" value="&#10140;"/>	
			
		</form>
	</div>

</div>
<div class="main-content">
				<div class="content-page">
					<div class="title-section">Productos destacados</div>
					<div class="products-list" id="space-list">
					</div>
				</div>
			</div>



	<?php 
	include('../con_db.php');
	$consulta=$enlace ->query("SELECT * FROM productos WHERE stock >= 1 AND id_categoria = 6")or die($enlace->error);
	while($row=mysqli_fetch_array($consulta))
	{

		?>

			<div class="product-box">
				<a href="../producto.php?id=<?php echo $row['id'];?>">
				<div class="product">
				<img src="../assets/<?php echo $row['imagennombre'];?>"> 
				<div class="detail-title"> <?php echo $row['nombre'];?> </div>
				<div class="detail-description"><?php echo $row['descripcion'];?> </div>
				<div class="detail-price">US<?php echo $row['precio'];?></div>
			</a>

				

			</div>
		</div>
		
<?php } ?>

</body>
</html>