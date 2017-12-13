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
			<a class="logo" href="asesor.php">ADMINISTRADOR</a>

			<div class="mobile-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<nav>
				<ul>
					<li><a href="admin.php">Articulos</a></li>
					<li><a href="usuarios.php">Usuarios</a></li>
					<li><a href="sesion.php"><i class='icon-off'></i>Cerrar Sesion</a></li>
				</ul>
			</nav>

		</div>
	</header>

	<div class="hero">

		<h1><span>PAGINA ADMINISTRADOR</span><br>Bienvenido Administrador</h1>

		<div class="mouse">
			<span></span>
		</div>

	</div>
	<div class="container" align="center">
		<br>
		<h1 class="productos" style="text-align: center;  font-size: 50px;">CREAR PRODUCTO</h1>
		<div class="row content" align="center">
			<p>
				<form method="post" ACTION="crear.php">
					<label for="nombre">Nombre del Producto</label>
					<input type="text" name="nombrePro">
					<label for="canti">Cantidad</label>
					<input type="number" name="cantidad">
					<label for="valo">Valor</label>
					<input type="number" name="valor">
					<br>
					<input type="submit" name="crear" value="Crear">
					<input type='submit' name="volver" value='Volver'>					
					
					<?php
					require ("conexion.php");
					error_reporting(0);
					@$boton = isset($_POST["crear"]);

					if (isset($_POST['volver'])){
						Header("Location: admin.php");
					}elseif ($boton != "") {
						$ver = mysqli_query($conexion ,"SELECT * FROM inventario WHERE PRODUCTO = '$nombreProducto';");
						$nombreProducto = $_POST["nombrePro"];
						$cant = $_POST["cantidad"];
						$val = $_POST["valor"];

						if (mysqli_num_rows($ver) >= 1) {
							echo "<br>";
							echo "<br>";
							echo "El Producto ya existe!";

						}else{
							$crearProducto = "INSERT INTO inventario(CODIGO, PRODUCTO, CANTIDAD, VALOR) values (CODIGO, '$nombreProducto', $cant, $val)";
							$matris=mysqli_query($conexion, $crearProducto);

							if ($matris==false) {
								echo "<br>";
								echo "<br>";
								echo "Hay campos vacios";

							}else{
								Header("Location: admin.php");

							}
						}
					}
					?>
				</form>
			</p>
		</div>
	</div>
</body>
</html>
