<?php
require ("seguridad.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cotizacion Asesor</title>
	<link rel="stylesheet" type="text/css" href="css/styleTable.css" />
</head>
<body>
	<h1>Bienvenido Asesor</h1>
	<form action="CotizacionAsesor.php" method="post">
		<label for="num1">cantidad viajeros</label>
		<input type="number" name="num1" id="num1">
		<br>
		<br>
		<!-- <label for="num2">niños</label>
		<input type="number" name="num2" id="num2">
		<br>
		<br> -->
		<select name="destino">
			<option value="Santa Marta">Santa Marta</option>
			<option value="San Andres">San Andres</option>
			<option value="3">Cancun</option>
		</select>
		<br>
		<br>
			<input type="checkbox" name="hotel" value="hotel">Hotel<br>
			<input type="checkbox" name="comidas" value="comidas">Comidas<br>
			<input type="checkbox" name="bebidas" value="bebidas">Bebidas<br>
			<input type="checkbox" name="excurcionesa" value="excurciones">Excurciones<br>
			<br>
			<input type="submit" value="Consultar" name="coti">
			<input type="submit" value="Cotizar" name="boton">
			<br>
		</form>

	<?php
	include ("Calculos.php");
	require ("datosconeccion.php");


	if (isset($_POST["boton"])) {
		$cc = new Viaje($_POST["destino"]);

		echo "<br>" . "precio base " . $cc -> get_preciobase() . "<br>" . "<br>";
		if(isset($_POST["hotel"])){
			$cc -> hotel($_POST["destino"]);
		}
		if(isset($_POST["comidas"])){
			$cc -> comidas($_POST["destino"]);
		}
		if(isset($_POST["bebidas"])){
			$cc -> bebidas($_POST["destino"]);
		}
		if(isset($_POST["excurcionesa"])){
			$cc -> excurciones($_POST["destino"]);
		}
		if(isset($_POST["num1"])){
			$cc -> adultos($_POST["num1"]);
		}
		if(isset($_POST["num3"])){
			$cc -> descuentos($_POST["num3"]);
		}

		echo "precio total " . $cc -> get_preciobase();
	}

	if (isset($_POST["coti"])) {

		echo " <h1> Precios Actuales </h1> <br>";
		$consultarvalores=" select * from preciosbase";
		$conexionBD=mysqli_connect($hostBD,$usuarioBD,$contrasenaBD,$nombreBD);
		if (mysqli_connect_errno()) {

			echo "Error a la coneccion con la base de datos";
			exit();
		}
		$resutados=mysqli_query($conexionBD,$consultarvalores);
		while ($fila= mysqli_fetch_row($resutados)) {
			echo $fila[1] . " ";
			echo $fila[2] . "<br/>" ;

		}
	}



	 ?>

</body>
</html>
