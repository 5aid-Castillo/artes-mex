<?php
	session_start();
	if(@!$_SESSION['Usuario']){
		header("Location:login.php");
	}
	if(!isset($_SESSION['carrito'])){
		header('Location:PaginaPrincipal.php');
	}
	$arreglo = $_SESSION['carrito'];
	?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>ArtesMex</title>

	<link rel="stylesheet" href="css/stylepage.css" media="screen">
	<link rel="stylesheet" href="css/estilo.css">en">
	
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

<form action="insertarpedido.php" method="post">	
<body >
<!--
<script src="https://www.paypal.com/sdk/js?client-id=Af36IPq7PCAIYRFjqKAmUsOyitbCMGcnL-WEjZQ1a9CTC2-Iqu8e53oh0uRNvG-kmp8TgEEDZnSH7QCx&currency=MXN"> // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>
-->

    
	<div class="store-wrapper">           
		<h1 style="color: #F1C40F ;">Verificacion</h1>
	</div>

<div class="contenedores" >
	
<div class="details" style="float:left;">
	<h2> Detalles de Facturacion</h2>
	
	<div class="from-group">
	
		<label >Country<span>*</span></label>
		<select id="country" name="pais" >
			<option value="1">Selecciona un pais</option>
			<option value="2">Estados Unidos</option>
			<option value="3">Canada</option>
			<option value="4">Mexico</option>
			<option value="5">Colombia</option>
			<option value="6">Argentina</option>
			<option value="7">Francia</option>
			<option value="8">China</option>
			<option value="9">Alemania</option>
			<option value="10">Rusia</option>
		</select>
	</div><!--group-->
	<br>
	<div class="from-group row" method="post">
		<label>Nombre Completo<span>*</span></label>
		<input id="c_fname" method="post" name="c_fname" class="input-48" required><br><br>
		<label>Direccion<span>*</span></label>
		<input id="direccion" method="post"name="direccion"class="input-48" placeholder="" required><br><br>
		<label>Estado<span></span></label>
		<input id="estado"method="post"name="estado"placeholder="Ciudad y Estado"class="input-48"required><br><br>
		<label>Codigo Postal<span></span></label>
		<input id="cp"method="post"name="cp" class="input-48"required><br><br>
		<label>Correo Electronico<span>*</span></label>
		<input id="email_address" placeholder="correo@ejemplo.com" method="post"name="email_address"required><br><br>
		<label>Telefono<span>*</span></label>
		<input id="phone" method="post"name="phone" class="input-48"placeholder="Numero de Telefono" required><br>


	</div><!--group 2-->
</div><!--detalles-->

</form>


	<div class="order" style="float:right;">
		<h1>Tu Pedido</h1><br>
		<table>
			<thead>
				<th>Producto</th> 
				<th>&nbsp;&nbsp;&nbsp;&nbsp;Total</th>

			</thead>
			<tbody>
		<?php
		include('con_db.php');

		$total=0;
		for($i=0;$i<count($arreglo);$i++){
			$total = $total + ($arreglo[$i]['Price']);
				?>

				<tr>

					<td><?php echo $arreglo[$i]['Name'];?></td>
						

					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo number_format($total,2,'.',''); $arreglo[$i]['Price'];?> US</td>
				</tr>

			<?php } ?>
			<tr class="order-color">
				<td><br><strong>Precio Total del Pedido</strong></td>
				<td><br><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo number_format($total,2,'.','');?> USD</strong></td>
			</tr>


			</tbody>


				

                   

			<!--<div id="paypal-button-container"></div>-->

		</table><br>


		



<!--

<div id="paypal-button-container"></div>
-->


<br>

<input type="submit"href="pagar.php" class="buy-buy" value="Place Order"method="post"style="border-radius:10px;position: relative;display: inline-block;padding:10px 20px; color: #ECF0F1 ; letter-spacing: 4px; font-size: 24px;text-decoration:none; overflow:hidden; background: #239B56; transition:0.2;"><style>.buy-buy:hover{box-shadow: 0 0 20px #82E0AA  , 0 0 60px #82E0AA , 0 0 80px #a945c7;transition-delay: 0.1s;background: #82E0AA;color:#82E0AA;</style></input>
	</div>



</div> <!--contenedores-->



<style>.details{background:#0099CC;color:#fff;border-radius:10px; width:55%; padding:50px 90px;} .details input{padding: 12px 40px; border-radius: 10px;  } .order{background:#fff;width: 40%; border-radius:20px;padding:50px 60px; height: 20%;}.order h1{color:#7D3C98;}.order th{color:#000;} .order-color{color:#27AE60;}</style>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carouse1.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>

<!--
<script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '300'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
          	console.log(details);
            alert('Transaction completed by ' + details.payer.name.given_name);
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>-->
</body>

</html>