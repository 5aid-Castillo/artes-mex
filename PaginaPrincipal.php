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


	<div class="barra-busqueda">
	<div class="contenedor-busqueda">
		<form class="form-busqueda" action="busqueda.php" method="GET">
			<div class="contenedor-busqueda-input">
				<input class="busqueda-input" type="search" name="texto" placeholder="Buscar">
			</div>
			<input class="busqueda-submit" type="submit" value="&#10140;">
			
		</form>
	</div> <!--div contenedor-busqueda -->
</div> <!--div barra-busqueda -->
<br><br>
	
	
	
<?php
 include('con_db.php');
 $resultado= $enlace-> query("SELECT * FROM productos order by rand() LIMIT 12") or die($enlace->error);
 while($fila = mysqli_fetch_array($resultado)){




?>
<div class="product-box">

 
		
	
		<a href="producto.php?id=<?php echo $fila['id'];?>">
		<div class="product">
		<img src="assets/<?php echo $fila['imagennombre'];?>" alt="<?php echo $fila['nombre'];?>" width="300px" height="400px">
		<div class="detail-title"><?php echo $fila['nombre'];?></div>
		<div class="detail-description"><?php echo $fila['descripcion'];?></div>
		<br>
		<br>
		<br>
		<div class="detail-price">$<?php echo $fila['precio'];?> USD</div>
		</a>

	


</div>
</div>

<script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
	<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
<script src="main.js"></script>


<?php }  ?>


</div>
</div>
</body>
</html>