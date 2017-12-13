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
			<a class="logo" href="asesor.php">Administrador</a>

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
		<h1 class="productos" style="text-align: center;  font-size: 50px;">Usuarios</h1>
		<div class="row content" align="center">
			<form method="post" action="usuarios.php">
				<div align="left" style="height: 70px; float: left;">
					<input type="number" name="codigo" placeholder="Identificacion Usuario" style='display:inline-block; width:185px;'>
					<input type='submit' name="eliminar" value='Eliminar'>
					<input type="submit" name="crearUsuario" formaction="crearUsuario.php" value="Crear">
				</div>
				<?php
				require ("conexion.php");
				if (isset($_POST["eliminar"])) {
					$id=$_POST['codigo'];
					$borrar="DELETE FROM usuarios WHERE CODIGO ='$id'";
					$matris=mysqli_query($conexion, $borrar);
					if ($matris==false) {
						echo "Usuario no Existe";
					}else{
						echo "Se ah eliminado el Usuario";
						Header("Location: usuarios.php");
					}
				}
				?>
			</form>
			<p>
				<?php
				require ("conexion.php");
				//$a = 0;
				$consulta="SELECT * FROM usuarios ORDER BY nombre";
				echo "<table class='table' border='1' align='center'>
				<thead>
					<tr>
						<th>Identificacion</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Telefono</th>
						<th>Nombre de Usuario</th>
						<th>Tipo de Usuario</th>
					</tr>
				</thead>";
				$matriz=mysqli_query($conexion, $consulta);
				while ($fila = mysqli_fetch_row($matriz)) {
					echo "<tbody>";
					echo "<tr>";
					echo "<td>".$fila[0]/*++$a*/."</td>";
					echo "<td>".$fila[1]."</td>";
					echo "<td>".$fila[2]."</td>";
					echo "<td>".$fila[3]."</td>";
					echo "<td>".$fila[4]."</td>";
					echo "<td>".$fila[6]."</td>";
					echo "<td>".$fila[7]."</td>";
					echo "</tr>";
					echo "</tbody>";
				}
				?>				
			</p>
		</div>
	</div>
</body>
</html>
