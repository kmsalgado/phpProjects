<?php
session_start();

if (isset($_SESSION["u_usuario"])) {

}else{
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vendedor</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<link rel="stylesheet" type="text/css" href="css/stylePg.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/js/bootstrap.min.js">
	<link href='https://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' defer=""></script>
	<script src="js/asesor.js" defer=""></script>
</head>
<body>
	<header class="main_h">

		<div class="row">
			<a class="logo" href="asesor.php">VENDEDOR</a>

			<div class="mobile-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<nav>
				<ul>
					<li><a href=".venta">Venta</a></li>
					<li><a href="productos.php">Productos</a></li>
					<li><a href="sesion.php"><i class='icon-off'></i>Cerrar Sesion</a></li>
				</ul>
			</nav>

		</div>
	</header>

	<div class="hero">

		<h1><span>PAGINA VENDEDOR</span><br>Bienvenido Vendedor</h1>

		<div class="mouse">
			<span></span>
		</div>

	</div>
	<div class="container" align="center">
		<br>
		<h1 class="venta" style="text-align: center;  font-size: 50px;">VENDER</h1>
		<div class="row content" align="center">
			<p>
				<form method="post" ACTION="vendedor.php">
					<select name="nomPro[]" style="width: 700px;">
						<option value="default">SELECCIONE UN PRODUCTO</option>
						<?php  
						require ("conexion.php");
						$consulta="SELECT * FROM inventario";
						$matriz=mysqli_query($conexion, $consulta);
						while ($fila = mysqli_fetch_row($matriz)) {
							echo "<option value='producto'>".$fila[1]."</option>";
						}
						?>
					</select>
					<br>
					<label for="cant">Cantidad</label>
					<input type="text" name="cantPro">
					<label for="valor">
						<?php  
						require ("conexion.php");
						$nombre=$_POST["nomPro"];
						$consulta2="SELECT VALOR FROM inventario WHERE CODIGO = '$nombre';";
						$matriz=mysqli_query($conexion, $consulta2);
						while ($fila = mysqli_fetch_row($matriz)) {
							echo "<option value='valor'>".$fila[0]."</option>";
						}
						?>
					</label>
					<br>
					<input type="submit" name="vender" value="Vender">

					<?php
					require ("conexion.php");
					@$boton = isset($_POST["vender"]);

					if($boton != "") {
						$cant=$_POST["cantPro"];
					}
					?>
				</form>
			</p>
		</div>
	</div>
</body>
</html>
