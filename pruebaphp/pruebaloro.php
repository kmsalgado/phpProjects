<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<title>Formulario lora</title>
</head>
<body>

<form id="form1" action="pruebaloro.php" method="post">
	<fieldset>
		<legend>Formulario Lora</legend>
		<p>
		<label for="num1">Soy una lora digita algo</label>
		<input id="num1" name="num1" type="text" />
		</p>
		<p>
		<input id="buttom" name="enviar" type="submit" value="Molestar lora" />
		</p>

		<?php

		if(isset($_POST{"enviar"})) {
		$lora = $_POST{"num1"};
		echo "RRR ROAR RRR &nbsp;" . $lora;
		}

		?>

	</fieldset>
</form>
</body>
</html>