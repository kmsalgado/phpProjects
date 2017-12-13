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
	<title>Asesor</title>
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
			<a class="logo" href="asesor.php">ASESOR</a>

			<div class="mobile-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<nav>
				<ul>
					<li><a href=".productos">Productos</a></li>
					<li><a href="vendedores.php">Vendedores</a></li>
					<li><a href="sesion.php"><i class='icon-off'></i>Cerrar Sesion</a></li>
				</ul>
			</nav>

		</div>
	</header>

	<div class="hero">

		<h1><span>PAGINA ASESOR</span><br>Bienvenido Asesor</h1>

		<div class="mouse">
			<span></span>
		</div>

	</div>
	<div class="container" align="center">
	<br>
	<h1 class="productos" style="text-align: center;  font-size: 50px;">TABLA PRODUCTOS</h1>
		<div class="row content" align="center">
			<p>
				<?php
				require ("conexion.php");
				$consulta="SELECT * FROM inventario";
				echo "<table class='table' border='1' align='center'>
				<thead>
					<tr>
						<th>#</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Valor</th>
					</tr>
				</thead>";
				$matriz=mysqli_query($conexion, $consulta);
				while ($fila = mysqli_fetch_row($matriz)) {
					echo "<tbody>";
					echo "<tr>";
					echo "<td>".$fila[0]."</td>";
					echo "<td>".$fila[1]."</td>";
					echo "<td>".$fila[2]."</td>";
					echo "<td>".$fila[3]."</td>";
					echo "</tr>";
					echo "</tbody>";
				}
				?>
			</p>
		</div>
	</div>
</body>
</html>
