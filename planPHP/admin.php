<?php
ob_start();
?>
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
	<title>Administrador</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<link rel="stylesheet" type="text/css" href="css/stylePg2.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/js/bootstrap.min.js">
	<link href='https://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' defer=""></script>
	<script src="js/asesor.js" defer=""></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function()
	{
		$("#mostrar").on( "click", function() {
			$('#oculto').toggle();
		});
	});
	</script>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#search').keyup(function () {
			var rex = new RegExp($(this).val(), 'i');
			$('.contenidobusqueda tr').hide();
			$('.contenidobusqueda tr').filter(function () {
				return rex.test($(this).text());
			}).show();
		})
	});
	</script>

</head>
<body>
	<header class="main_h">

		<div class="row">
			<a class="logo" href="asesor.php">Administrador</a>

			<div class="mobile-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<nav>
				<ul>
					<li><a href=".productos">Articulos</a></li>
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
		<h1 class="productos" style="text-align: center;  font-size: 50px;">TABLA PRODUCTOS</h1>
		<div class="row content" align="center">
			<form method="post" action="admin.php">
				<div align="left" style="height: 70px; float: left;">
					<input type="text" id="search" placeholder ="Buscar Producto" autofocus style="width:130px;" autocomplete="off"/>
					<input type="submit" name="crear" value="Crear">
					<input type="submit" name="modificar" value="Modificar">
					<input id="mostrar" type="button" value="Eliminar" value="toggle()">
				</div>
				<div id="oculto" style='display:none; height: 70px; float: center;' align="right">
					<input type="text" name="codigo" placeholder="Codigo Para Eliminar" style='display:inline-block; width:165px;'>
					<input type='submit' name="enviar" value='Enviar' style='display:inline-block;'>
				</div>
			</form>
			<?php
			require ("conexion.php");

			if (isset($_POST['crear'])){
				Header("Location: crear.php");
			}elseif (isset($_POST['modificar'])){
				Header("Location: modificar.php");
			}elseif (isset($_POST["enviar"])) {
				$id=$_POST['codigo'];
				$borrar="DELETE FROM inventario WHERE CODIGO ='$id'";
				$matris=mysqli_query($conexion, $borrar);
				if ($matris==false) {
					echo "Producto no Existe";
				}else{
					Header("Location: admin.php");
				}
			}
			?>
			<br>
			<br>
			<p>
				<?php
				require ("conexion.php");
				$consulta="SELECT * FROM inventario ORDER BY PRODUCTO";
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
					echo "<tbody class='contenidobusqueda'>";
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
<?php
ob_end_flush();
?>
