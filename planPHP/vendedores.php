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
	<script>
		function pulsar(e) {
			tecla = (document.all) ? e.keyCode :e.which;
			return (tecla!=13);
		}
	</script>

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
					<li><a href="asesor.php">Productos</a></li>
					<li><a href=".vendedores">Vendedores</a></li>
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
		<h1 class="vendedores" style="text-align: center;  font-size: 50px;">VENDEDORES</h1>
		<div class="row content" align="center">
			<FORM METHOD="POST" ACTION="vendedores.php">
				<div align="left" style="height: 70px; float: left;">
					<input type="number" name="codigoUser" placeholder="Id de vendedor" style='display:inline-block; width:140px;' onkeypress="return pulsar(event)">
					<input type='submit' name="bloquear" value='Bloquear'>
					<input type='submit' name="desbloquear" value='Desbloquear'>
				</div>
				<?php
				require ("conexion.php");
				if (isset($_POST["bloquear"])) {
					$iduser=$_POST['codigoUser'];				
					$bloquear="UPDATE usuarios SET estado = 1 WHERE idusuarios ='$iduser'";
					$matris=mysqli_query($conexion, $bloquear);
					if ($matris==false) {
						echo "<div align='left' style='padding-top: 20px;'>";
						echo "Vendedor no Existe";
						echo "</div>";
					}else{
						Header("Location: vendedores.php");
					}
					
				}
				elseif (isset($_POST["desbloquear"])) {
					$iduser=$_POST['codigoUser'];
					$desbloquear="UPDATE usuarios SET estado = 0 WHERE idusuarios ='$iduser'";
					$matris=mysqli_query($conexion, $desbloquear);
					if ($matris==false) {
						echo "<div align='left' style='padding-top: 20px;'>";
						echo "Vendedor no Existe";
						echo "</div>";
					}else{
						Header("Location: vendedores.php");
					}				
				}
				?>
			</FORM>
			<p>
				<?php
				require ("conexion.php");
				//$a = 0;
				$consulta="SELECT * FROM usuarios WHERE tipoUser = 'Vendedor' ORDER BY nombre";
				echo "<table class='table' border='1' align='center'>
				<thead>
					<tr>
						<th>Identificacion</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Telefono</th>
						<th>Nombre de Usuario</th>
						<th>Estado</th>
					</tr>
				</thead>";
				$matriz=mysqli_query($conexion, $consulta);
				while ($fila = mysqli_fetch_row($matriz)) {
					echo "<tbody>";
					if ($fila[8] == 1) {
						echo "<tr id='campo'>";
						echo "<td>".$fila[0]/*++$a*/."</td>";
						echo "<td>".$fila[1]."</td>";
						echo "<td>".$fila[2]."</td>";
						echo "<td>".$fila[3]."</td>";
						echo "<td>".$fila[4]."</td>";
						echo "<td>".$fila[6]."</td>";
						echo "<td> Bloqueado </td>";
						echo "</tr>";
					}else{
						echo "<tr>";
						echo "<td>".$fila[0]/*++$a*/."</td>";
						echo "<td>".$fila[1]."</td>";
						echo "<td>".$fila[2]."</td>";
						echo "<td>".$fila[3]."</td>";
						echo "<td>".$fila[4]."</td>";
						echo "<td>".$fila[6]."</td>";
						echo "<td> Activo </td>";
						echo "</tr>";
					}	
					echo "</tbody>";
				}
				?>				
			</p>
		</div>
	</div>
</body>
</html>
