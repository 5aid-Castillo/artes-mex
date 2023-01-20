<?php

session_start();
include('con_db.php');
	//$arreglo = $_SESSION['carrito'];
	if(!isset($_GET['id_venta'])){
		header("Location: ./");
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

require __DIR__ . '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-7223697446752673-071500-d4a10fb1dd407a3a99843adabeaf2884-790214006');

//TEST-891225526895675-071220-d83f1e1acf91ca0c3709abedb62fd66e-789165060
//APP_USR-7223697446752673-071500-d4a10fb1dd407a3a99843adabeaf2884-790214006
// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://localhost/artes_mex/thankyou.php?id_venta=".$_GET['id_venta']."&metodo=mercado_pago",
    "failure" => "https://localhost/errorpago.php?error=failure",
    "pending" => "https://localhost/errorpago.php?error=pending"
);
$preference->auto_return = "approved";


$datos=array();

while($f = mysqli_fetch_array($datos3)){
// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = $f['nombre_producto'];
$item->quantity = 1;
$item->unit_price = $f['precio'];
$datos[]=$item;
}
$preference->items = $datos;
$preference->save();
//curl -X POST -H "Content-Type: application/json" "https://api.mercadopago.com/users/test_user?access_token=TEST-891225526895675-071220-d83f1e1acf91ca0c3709abedb62fd66e-789165060" -d "{'site_id':'MLM'}"

//vendedor
//{"id":790214006,"nickname":"TESTRRN2GQD8","password":"qatest8348","site_status":"active","email":"test_user_83817498@testuser.com"}
//comprador
//{"id":790214585,"nickname":"TEST9XCF0HX7","password":"qatest200","site_status":"active","email":"test_user_17716009@testuser.com"}

?>

<!DOCTYPE html>
<html>
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
<script src="https://www.paypal.com/sdk/js?client-id=Af36IPq7PCAIYRFjqKAmUsOyitbCMGcnL-WEjZQ1a9CTC2-Iqu8e53oh0uRNvG-kmp8TgEEDZnSH7QCx&currency=MXN"> // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>
    <br>
	<div class="store-wrapper">           
		<h1 style="color: #F1C40F">Elejir metodo de Pago</h1>
	</div>
<br>
<div class="pedido" align="center" style="background: #fff ;">








<h1 style="color: #229954";>Total: $<?php echo $datosUsuario[2];?></h1>
<!--imagen mercado pago -->
<br>

<img src="logo_mercado/mercadopago.png" width="400px" height="100px">
<form action="https://localhost/artes_mex/thankyou.php?id_venta=<?php echo $_GET['id_venta']?>&metodo=mercado_pago" method="POST">

	<script 
    src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference ->id;?>"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
  </script>

</form>

<br>
<div id="paypal-button-container"></div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
<script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $datosUsuario[2];?>'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
          	//console.log(details);
          	if(details.status == 'COMPLETED'){
          		location.href="thankyou.php?id_venta=<?php echo $_GET['id_venta'];?>&metodo=paypal";
          	}
           
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>

</body>
</html>