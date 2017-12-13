<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/estilos2.css" />
	<title>Multiplicaciones</title>
	<script> 
		function pulsar(e) { 
  		tecla = (document.all) ? e.keyCode :e.which; 
  		return (tecla!=13); 
		} 
	</script>
<body>

<form id="form" action="prueba.php" method="post" >
	<table border="1.5px" align="center" id="tabla">
		<tr id="primero">
			<td class="">
				<h1>FORMAS DE HACER UNA MULTIPLICACIÓN EN PHP</h1>
			</td>
			<td class="">
				<h1>RESULTADOS</h1>
			</td>
		</tr>
		<tr id="segundo">
			<td class="mwhile" align="center">
				<p> Tabla de multiplicar con while (1-10) </p>
				<label for="num1">Digite el numero</label>
				<input id="num1" name="num1" type="text" onkeypress="return pulsar(event)"/>
				<input id="buttom" name="enviar" type="submit" value="Enviar" />
				</td>
			<td class="while">
				<?php
				$i = 1;

				if (isset($_POST{"enviar"})) {
					$num = $_POST{"num1"};
					while ($i <= 10){
						echo $num . "&nbsp; x &nbsp;" . $i . "&nbsp; = &nbsp;" . ($num * $i) . "<br>";
						$i++;
					}
				}
				?>		
			</td>
		</tr>	

		<tr id="tercero">	
			<td class="mdo" align="center">
				<p>Tabla de multiplicar con do (10-20)</p>
				<label for="num2">Digite el numero</label>
				<input id="num2" name="num2" type="text" onkeypress="return pulsar(event)"/>
				<input id="buttom2" name="enviar2" type="submit" value="Enviar" />
				<td class="do">
					<?php
					$i = 10;

					do {
						if (isset($_POST{"enviar2"})) {
						$num = $_POST{"num2"};
						echo $num . "&nbsp; x &nbsp;" . $i . "&nbsp; = &nbsp;" . ($num * $i) . "<br>";
						}
						$i++;
					} while ($i <= 20);

					?>
				</td>
			</td>
		</tr>

		<tr id="cuarto">
			<td class="mfor" align="center">
				<p>Tabla de multiplicar con for (20-30)</p>
				<label for="num3">Digite el numero</label>
				<input id="num3" name="num3" type="text" onkeypress="return pulsar(event)"/>
				<input id="buttom3" name="enviar3" type="submit" value="Enviar" />
				<td class="for">
					<?php 

					for ($i = 20; $i <= 30; $i++){
						if (isset($_POST{"enviar3"})) {
						$num = $_POST{"num3"};
						echo $num . "&nbsp; x &nbsp;" . $i . "&nbsp; = &nbsp;" . ($num * $i) . "<br>";
						}
					}

					?>
				</td>				
			</td>
		</tr>

	</table>
</form>
</body>
</html>