<?php

session_start();
	include('con_db.php');
if(isset($_GET['id_venta']) && isset($_GET['metodo'])){
	include('con_db.php');
	$enlace->query("INSERT INTO pagos (id_venta,metodo)
		values(".$_GET['id_venta'].",'".$_GET['metodo']."')") or die($enlace->error);
	header("Location: thankyou.php?id_venta=".$_GET['id_venta']);
	}



?>
<!DOCTYPE html>


<html lang="en">
<head>

	<meta charset="utf-8">
	<title>ArtesMex</title>
	<link rel="stylesheet" href="css/stylepage.css" media="screen">
	<link rel="stylesheet" href="css/estilo.css">

	
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
<div class="store-wrapper" style="color:#fff">
		<h1>Confirmar compra</h1>
	</div><br>
<div class="successfuly" align="center">
	<div class="estilo">
	<h2 align="center">Gracias por su compra</h2><br>
</div>
<p>Su pedido se completo con exito</p><br>
<div class="botones-1">
<a href="miscompras.php?id_venta=<?php echo $_GET['id_venta'];?>">Ver Pedido</a><br>
</div>

<style>.successfuly{color: #566573; background:#fff;width: 100%; height: 20%;padding: 30px 15px; font-size: 25px; }

	.botones-1 a{
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
    	.botones-1 a:hover{
    	background-color: #008CBA;
      	color: white;
    	}
    	.botones-1 button{
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
      	 font-size: 10px;
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
    	.botones-1 button:hover{
    		background-color: #008CBA;
      	color: white;

    	} 
    	.botones-1 input{
    		border-radius: 6px;
    		position: relative;
    		display: inline-block;
    		padding: 10px 1px;
    		text-align: center;
    		width: 7%;
    		letter-spacing: 4px;
    	}
    	.estilo{
			text-align: left; 
			font-family: Comic Sans MS; 
			font-weight:bold; 
			font-size: 30px; 
			color: #EBD758; 
			text-shadow: -1px 0 #414D68, 0 1px #414D68, 1px 0 #414D68, 0 -1px #414D68, -2px 2px 0 #414D68, 2px 2px 0 #414D68, 1px 1px #414D68, 2px 2px #414D68, 3px 3px #414D68, 4px 4px #414D68, 5px 5px #414D68;

    	}
    	
 </style>
	
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carouse1.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>

</body></html>