<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/estilos3.css" />
	<title>Ejercicio Pruebas</title>
	<script> 
		function pulsar(e) { 
  		tecla = (document.all) ? e.keyCode :e.which; 
  		return (tecla!=13); 
		} 
	</script>
</head>
<body>
<form id="form" action="ejercicioprueba.php" method="post" >
	<table border="3" align="center" id="tabla">

		<tr id="primero">
			<td colspan="6" class="titulo">
				<h1>OPERACIONES MATEMATICAS</h1>
			</td>
		</tr>
		<tr id="segundo">
			<td class="priope" align="center">
				<p>Suma y Resta</p>
				<label for="num1">Digite los numeros</label>
				<input id="num1" name="num1" type="text" onkeypress="return pulsar(event)" autocomplete="off" />
				<input id="num11" name="num11" type="text" onkeypress="return pulsar(event)" autocomplete="off" />
				<input id="buttom1" name="enviar1" type="submit" value="Suma" />
				<input id="buttom11" name="enviar11" type="submit" value="Resta" />
			</td>
					
			<td class="segope" align="center">
				<p>Multiplicación y División</p>
				<label for="num2">Digite los numeros</label>
				<p id="pmyd">
					<input id="num2" name="num2" type="text" size="10" onkeypress="return pulsar(event)" autocomplete="off" />
					<input id="num22" name="num22" type="text" size="10" onkeypress="return pulsar(event)" autocomplete="off" />
					<select name="selectmyd">
						<option value="multipli">Multiplicación</option>
						<option value="division">División</option>
					</select>
				</p>	
				<input id="buttom2" name="enviar2" type="submit" value="Enviar" />					
			</td>
					
			<td class="terope" align="center">
				<p>Tabla de multiplicar con tipos de bucles</p>
				<label for="num3">Digite el numero</label>
				<p id="ptdb">
				<input id="num3" name="num3" type="text" onkeypress="return pulsar(event)" autocomplete="off" />
				<input id="buttom3" name="enviar3" type="submit" value="Do" />
				<input id="buttom33" name="enviar33" type="submit" value="While" />
				<input id="buttom33" name="enviar333" type="submit" value="For" />
				</p>
			</td>
		</tr>

		<tr id="tercero">
			<td class="prires" align="center">
				<?php
				if (isset($_POST["enviar1"])) {
					$num1 = $_POST{"num1"};
					$num2 = $_POST{"num11"};
					$num3 = $num1 + $num2;
					echo "Su suma es ";
					echo $num3;
				}elseif (isset($_POST["enviar11"])) {
					$num1 = $_POST{"num1"};
					$num2 = $_POST{"num11"};
					$num3 = $num1 - $num2;
					echo "Su resta es ";
					echo $num3;
				}else
				?>
			</td>

			<td class="segres" align="center">
				<?php
				if (isset($_POST["enviar2"])){
					if ($_POST["selectmyd"] == "multipli"){
						$num1 = $_POST{"num2"};
						$num2 = $_POST{"num22"};
						$num3 = $num1 * $num2;
						echo "Su resultado es ";
						echo $num3;
					}elseif ($_POST["selectmyd"] == "division"){
						$num1 = $_POST{"num2"};
						$num2 = $_POST{"num22"};
						$num3 = $num1 / $num2;
						echo "Su resultado es ";
						echo $num3;
					}					
				}else
				?>		
			</td>

			<td class="terres" align="justify">
				<?php
				$i = 1;
				do {
					if (isset($_POST{"enviar3"})) {
					$num = $_POST{"num3"};
					echo $num . "&nbsp; x &nbsp;" . $i . "&nbsp; = &nbsp;" . ($num * $i) . "<br>";
					}
					$i++;
				} while ($i <= 12);

				$i = 1;
				if (isset($_POST{"enviar33"})) {
					$num = $_POST{"num3"};
					while ($i <= 12){
						echo $num . "&nbsp; x &nbsp;" . $i . "&nbsp; = &nbsp;" . ($num * $i) . "<br>";
						$i++;
					}
				}

				for ($i = 1; $i <= 12; $i++){
						if (isset($_POST{"enviar333"})) {
						$num = $_POST{"num3"};
						echo $num . "&nbsp; x &nbsp;" . $i . "&nbsp; = &nbsp;" . ($num * $i) . "<br>";
						}
					}
			?>		
			</td>
		</tr>

		<tr id="cuarto">
			<td class="cuaope" align="center">
				<p>Factorial</p>
				<label for="num4">Digite el numero</label>
				<p>
					<input id="num4" name="num4" type="text" onkeypress="return pulsar(event)" autocomplete="off" />
					<input id="buttom4" name="enviar4" type="submit" value="Enviar" />
				</p>
			</td>
					
			<td class="quiope" align="center">
				<p>Serie de Fibonacci</p>
				<label for="num5">Digite el numero</label>
				<input id="num5" name="num5" type="text" onkeypress="return pulsar(event)" autocomplete="off" />
				<input id="buttom5" name="enviar5" type="submit" value="Enviar" />
			</td>
					
			<td class="sexope" align="center">
				<p></p>
				<label for="num6">Digite el numero</label>
				<input id="num6" name="num6" type="text" onkeypress="return pulsar(event)" autocomplete="off" />
				<input id="buttom6" name="enviar6" type="submit" value="Enviar" />
			</td>
		</tr>

		<tr id="quinto">
			<td class="cuares" align="center">
				<?php
				if (isset($_POST["enviar4"])) {
					$num1 = $_POST['num4'];
					$num2 = $_POST['num4'];
					for ($i=1; $i<=$num1-1; $i++){
						$num2=$num2*$i;					
						echo $num2." "; 
					}
				}
				?>		
			</td>

			<td class="quires" align="center">
				<?php
				if (isset($_POST["enviar5"])) {
					$num1 = $_POST['num5'];
					$num2 = 0;
					for ($i=0; $i<=10; $i++){
					$sumar=$num1+$num2;
					$num1=$num2;
					$num2=$sumar;
					echo $sumar." "; 
					}
				}
				?>		
			</td>

			<td class="sexres" align="center">
				<?php
				
				?>		
			</td>
		</tr>		

	</table>
</form>
</body>
</html>