<!DOCTYPE html>
<?php
session_start(); //el usuario aparecera en la pagina principal 
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/stylepage.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/e4f194785e.js" crossorigin="anonymous"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


	<title>ArtexMex</title>


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

		<li><a href="" style="color: #C0392B;"> <strong> <?php echo  $_SESSION['Usuario'];?> </strong></a></li>
		<li><a href="desconectar.php">Salir</a></li>
	</ul>
</nav>
</div>
</div>


</head>
<body>


<?php
	include('con_db.php');
?>

<div class="conteiner mt-5">
	<div class="row">
		
		<div class="col-md-3">
			<h1 style="color:#FFFFFF">Ingrese datos</h1>
			<form action="insertar.php" method="POST" enctype="multipart/form-data">

				<label style="color:#FFFFFF">Nombre Del Producto</label>
				<input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre Producto">

				<label style="color:#FFFFFF">Descripcion del producto</label>
				<input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion">

				<label style="color:#FFFFFF">Precio Del Producto</label>
				<input type="number" class="form-control mb-3" name="precio" placeholder="Precio">
				
				<label style="color:#FFFFFF">Stock del producto</label>
				<input type="number" class="form-control mb-3" name="stock" placeholder="Stock">

				<label style="color:#FFFFFF">Imagen del producto</label>
				<input type="file" class="form-control mb-3" name="imagennombre" id="imagennombre">
				<input type="hidden" name="imagennombre1" id="imagennombre1">

				<label style="color:#FFFFFF">Categoria del producto:</label>
				<select name="id_categoria">
					<option selected>Alebrijes</option>
					<option>Barro</option>
					<option>Guayaveras</option>
					<option>Huipiles</option>
					<option>Juguetes</option>
					<option>Pi??atas</option>
					<option>Rebozos</option>
					<option>Sarapes</option>
					<option>Sombreros</option>
					<option>Talabera</option>
				</select>

				<br> <br>
				<button type="submit" class="btn btn-primary">Enviar</button>

			</form>
		</div>

		<div class="col-md-8">
			<table class="table">

				<thead class="table-success table-striped">
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>stock</th>
						<th>imagen</th>
						<th>Categoria</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
			
				<tbody>
					<?php

					$nombreus=$_SESSION['Usuario'];
	
					//echo $nombreus;
	
					$consulta="SELECT IdUsuario FROM usuario WHERE usuario='$nombreus'";
    				$EjecutarConsulta=mysqli_query($enlace, $consulta);
    				$verfilas=mysqli_num_rows($EjecutarConsulta);
    				$fila= mysqli_fetch_array($EjecutarConsulta);

    				//echo $fila[0];

    				$consulta1="SELECT * FROM productos WHERE idUsuarioVende='$fila[0]'";
    				$EjecutarConsulta1=mysqli_query($enlace, $consulta1);
    				$verfilas1=mysqli_num_rows($EjecutarConsulta1);
    				$fila1= mysqli_fetch_array($EjecutarConsulta1);

                        if (!$EjecutarConsulta1){
                            echo "Error en la consulta";
                        }else{
                            if ($verfilas1<1) {
                                echo"<tr><td>sin registros</td></tr>";
                            }else
                            {
                                for ($i=0; $i < $fila1; $i++) {
                                	$aux="nothing";
                                	if ($fila1[7]==1) {
                                		$aux="Alebrijes";
                                	}
                                	if ($fila1[7]==2) {
                                		$aux="Barro";
                                	}
                                	if ($fila1[7]==3) {
                                		$aux="Guayaveras";
                                	}
                                	if ($fila1[7]==4) {
                                		$aux="Huipiles";
                                	}
                                	if ($fila1[7]==5) {
                                		$aux="Juguetes";
                                	}
                                	if ($fila1[7]==6) {
                                		$aux="Pi??atas";
                                	}
                                	if ($fila1[7]==7) {
                                		$aux="Rebozos";
                                	}
                                	if ($fila1[7]==8) {
                                		$aux="Sarapes";
                                	}
                                	if ($fila1[7]==9) {
                                		$aux="Sombreros";
                                	}
                                	if ($fila1[7]==10) {
                                		$aux="Talabera";
                                	}

                                    echo'
                                        <tr style="color:#FFFFFF">
                                        <td>'.$fila1[1].'</td>
                                        <td>'.$fila1[2].'</td>
                                        <td>'.$fila1[3].'</td>
                                        <td>'.$fila1[4].'</td>
                                        <td><img src="assets/'.$fila1[5].'" height="50px" width="50px" ></td>
                                        <td>'.$aux.'</td>

                                        <th><a href="actualizar.php?id='.$fila1[0].'" class="btn btn-info">Editar</a></th>
                                        <th><a href="delete.php?id='.$fila1[0].'" class="btn btn-danger">Eliminar</a></th>                        
                                        </tr>
                                    ';
                                    $fila1= mysqli_fetch_array($EjecutarConsulta1);
                                }
                            }
                        }
                  	?>
				</tbody>

			</table>
		</div>

	</div>
</div>


</body>
</html>