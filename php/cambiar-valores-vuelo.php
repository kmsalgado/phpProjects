<?php
require ("seguridad.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cambiar Precios</title>
	<link rel="stylesheet" type="text/css" href="css/styleTable.css" />
</head>
<body>
	<form action="cambiar-valores-vuelo.php" method="post" accept-charset="utf-8">

		<input type="submit" name="salir" value="salir">
		<input type="submit" name="volver" value="volver">

		<p>valor que va a actualizar</p>
		<input type="text" name="valor" placeholder="intrudusca nuevo valor">
		<p>Destino</p>
		<select name="destino">
			<option value="Santa Marta">Santa Marta</option>
			<option value="San Andres">San Andres</option>
			<option value="3">Cancun</option>
		</select>
		<br>
		<br>
		<input type="submit" name="enviar" value="enviar">
		<input type="submit" name="consultar" value="consultar">
	</form>
	<?php
	require("datosconeccion.php");

	if (isset($_POST['volver'])){
		Header("Location: CotizacionAdmin.php");
	}

	if (isset($_POST['salir'])){
		Header("Location: index.php");
	}

	if (isset($_POST["enviar"])) {

		$valorNuevo=$_POST["valor"];
		echo "<td>".$valorNuevo."</td>";
		echo "<td> Destino actualizado</td>";

		$actualizaSantamarta="UPDATE PRECIOBASE SET valor='$valorNuevo' WHERE Destino= 'Santa Marta'";
		$actualizaSanAndres="UPDATE PRECIOBASE SET valor='$valorNuevo' WHERE Destino= 'San Andres'";
		$actualizaCancun="UPDATE PRECIOBASE SET valor='$valorNuevo' WHERE Destino= 'Cancun'";

		$conexionBD = mysqli_connect($hostBD,$usuarioBD,$contrasenaBD,$nombreBD);
		if (mysqli_connect_errno()) {

			echo "error conexion a la base de datos ";
			exit();
		}

		switch ($_POST["destino"]) {

			case 'Santa Marta':
			$resultados=mysqli_query($conexionBD,$actualizaSantamarta);
			if ($resultados==false) {

				echo "Error al actualizar";

			}else{
				echo "<tr>";
				echo "<td> valor actualizado </td>";
				echo "<td> Santamarta Actualizado</td>";
				echo "</tr>";
			}
			break;

			case 'San Andres':
			$resultados=mysqli_query($conexionBD,$actualizaSanAndres);
			if ($resultados==false) {

				echo "Error al actualizar";

			}else{
				echo "<tr>";
				echo "<td> valor actualizado </td>";
				echo "<td> San Andres  Actualizado</td>";
				echo "</tr>";
			}
			break;

			case 'Cancun':
			$resultados=mysqli_query($conexionBD,$actualizaCancun);
			if ($resultados==false) {

				echo "Error al actualizar";

			}else{
				echo "<tr>";
				echo "<td> valor actualizado </td>";
				echo "<td> Cancun Actualizado</td>";
				echo "</tr>";
			}
			break;

		}

	}





	?>

</body>
</html>
