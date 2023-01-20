
<?php
	session_start();
	if(@!$_SESSION['Usuario']){
		header("Location:login.php");
	}
	?>


<!DOCTYPE HTML>
<html lang="en">


<head>
<meta charset="utf-8">
	<title>ArtesMex</title>
	<link rel="stylesheet" href="css/stylepage.css">
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


	<?php
 include("con_db.php");
if ( isset($_GET['id'])){

	$resultado = $enlace ->query("SELECT * FROM productos WHERE id=".$_GET['id'])or die ($enlace->error);
if(mysqli_num_rows($resultado) > 0 ){
	$fila=mysqli_fetch_row($resultado);
}else{
	header("Location: PaginaPrincipal.php");
}
}else{
	//redireccionar.
	header("Location: PaginaPrincipal.php");
}
 ?>


	
<div class="product" style="float:left;margin:90px 70px;">
	<img src="assets/<?php echo $fila[5];?>" alt="<?php echo $fila[1];?>">
</div>		

<div align="center" class="prods" style="background:#FAFAFA;float: right;margin: 70px 20px; border-radius:10px; width:50%; height:50%">
		<h1 class="det-prod" style="color: #0099CC"><?php echo $fila[1];?></h1><br>
		<h1 class="det-prec" style="color: #58D68D"><strong>$<?php echo $fila[3];?></strong><strong style="color: #566573;"> USD</strong></h1><br>
		<h3 class="det-des" style="color: #566573"><?php echo $fila[2];?></h3>
		<br><br><br><br>
	

<div class="botones-1">

	<a href="cart.php?id=<?php echo $fila[0];?>">Agregar al Carrito </a>
	<br><br>
	<a href="PaginaPrincipal.php">Regresar</a>	<br><br>
			
	
</div>
</div>



<style>
        .product-box a
        {
          text-decoration: none;

        }
        .product
        {
          
          border-radius: 10px;
          box-shadow: 0 0 8px 3px #ccc;
          background-color: #fff; 
        }
        .product img
        {
          width: 450px;
          border-radius: 10px 10px 0 0;
          height: 450px;

    	}

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

    </style>
<script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
	<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
<script src="main.js"></script>





</div>



</body>
</html>