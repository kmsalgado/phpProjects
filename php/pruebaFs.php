<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>

<body>

<!-- <p>&nbsp;</p>
<form name="form1" method="post" action="pruebaFs.php">
	<p>
		<label for="num1">primer numero</label>
		<input type="text" name="num1" id="num1">
		<label for="num2">segundo numero</label>
		<input type="text" name="num2" id="num2">
		<label for="num3">soy una calculadora. digita un numero</label>
		<input type="text" name="num3" id="num3">
	</p>
	<p>
		<input type="submit" name="button" id="button" value="mostrar tablas">
	</p>
</form>
<p>&nbsp;</p> -->

<table border="1">
    <tr>
      <td>
      	<form name="form1" method="post" action="pruebaFs.php">
      	<p>
      		<label for="num1">primer numero</label>
			<input type="text" name="num1" id="num1">
			<label for="num2">segundo numero</label>
			<input type="text" name="num2" id="num2">
			<p>
				<input type="submit" name="button" id="button" value="suma">
			</p>
			<p>
				<input type="submit" name="button2" id="button" value="resta">
			</p>
      	</p>
      	</form>
      	<?php 
      	if(isset($_POST["button"])){
		$numero=$_POST["num1"];
		$numero2=$_POST["num2"];
		echo $numero . "+" . $numero2 . "=" . ($numero+$numero2) . "<br>";
		}else if(isset($_POST["button2"])){
		$numero=$_POST["num1"];
		$numero2=$_POST["num2"];
		echo $numero . "-" . $numero2 . "=" . ($numero-$numero2) . "<br>";
		}
		?>
      </td>
      <td>
      	<form name="form1" method="post" action="pruebaFs.php">
      	<p>
      		<label for="num3">primer numero</label>
			<input type="text" name="num3" id="num3">
			<label for="num4">segundo numero</label>
			<input type="text" name="num4" id="num4">
			<p>
				<input type="submit" name="button3" id="button" value="multiplicar">
			</p>
			<p>
				<input type="submit" name="button4" id="button" value="dividir">
			</p>
      	</p>
      	</form>
      	<?php 
      	if(isset($_POST["button3"])){
		$numero3=$_POST["num3"];
		$numero4=$_POST["num4"];
		echo $numero3 . "*" . $numero4 . "=" . ($numero3*$numero4) . "<br>";
		}else if(isset($_POST["button4"])){
		$numero3=$_POST["num3"];
		$numero4=$_POST["num4"];
		echo $numero3 . "/" . $numero4 . "=" . ($numero3/$numero4) . "<br>";
		}
		?>
      </td>
      <td>
      	<form name="form1" method="post" action="pruebaFs.php">
	<p>
		<label for="num5">digita un numero</label>
		<input type="text" name="num5" id="num5">
	<p>
		<input type="submit" name="button5" id="button" value="do">
		<input type="submit" name="button6" id="button" value="while">
		<input type="submit" name="button7" id="button" value="for">
	</p>
		</form>
		<?php 
		$numero=$_POST["num5"];
		$i=1;
      	if(isset($_POST["button6"])){
		while ($i<=10) {
		echo $numero . "x" . $i . "=" . ($numero*$i) . "<br>";
		$i++;
		}
		}else if(isset($_POST["button5"])){
		do{
		echo $numero . "x" . $i . "=" . ($numero*$i) . "<br>";
		$i++;
		}while($i<=10);
		}
		else if(isset($_POST["button7"])){
			for ($i; $i <= 10; $i++) { 
		echo $numero . "x" . $i . "=" . ($numero*$i) . "<br>";
		}
		}
		
		?>
      </td>
    </tr>
    <tr>
      <td>
      	<p>
      		<label for="num1">base</label>
			<input type="text" name="num1" id="num1">
			<label for="num2">altura</label>
			<input type="text" name="num2" id="num2">
			<label for="num2">radio</label>
			<input type="text" name="num3" id="num2">
      	<?php 
      	if(isset($_POST["button8"])){
		$numero3=$_POST["num1"];
		$numero4=$_POST["num2"];
		echo "el area del rectangulo es: " . ($numero3*$numero4) . "cm" . "<br>";
		}else if(isset($_POST["button9"])){
		$numero3=$_POST["num3"];
		$pi=3.1416;
		echo "el area del circulo es: " . ($pi*($numero3*2)) . "<br>";
		}
		?>
      		<p>
				<input type="submit" name="button8" id="button" value="rectangulo">
			</p>
			<p>
				<input type="submit" name="button9" id="button" value="circulo">
			</p>
      	</p>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>

<?php
//print "hola mundo";//este es para imprimir
//echo "hola mundo";//este es para imprimir mas rapido

//$nombre = "33"; //el $ es para definir la variable. ahutomaticamente se convierte de int a string etc
//echo "su variable tiene el dato " . $nombre; //el . es para concatenar

// $edad=15;
// if($edad<14){
// 	echo "no puede entrar al sena";
// }else if($edad>18){
// 	echo "se inscribe con cedula";
// }else{
// 	echo "se inscribe con targeta";
// }

// $numero=10;//tres formas distintas de hacer tabla de multiplicar
// $i=1;

// while ($i<=10) {
// 	echo $numero . "x" . $i . "=" . ($numero*$i) . "<br>";
// 	$i++;
// }

// do{
// 	echo $numero . "x" . $i . "=" . ($numero*$i) . "<br>";
// 	$i++;
// }while($i<=10);

// for ($i; $i <= 10; $i++) { 
// 		echo $numero . "x" . $i . "=" . ($numero*$i) . "<br>";
// }

// if(isset($_POST["button"])){
// $lora=$_POST["num1"];
// echo "rrrr roa rrr " . $lora;
// }

// if(isset($_POST["button"])){
// $numero=$_POST["num1"];
// $numero2=$_POST["num2"];
// $numero3=$_POST["num3"];
// }



// echo $numero . "+" . $numero2 . "=" . ($numero+$numero2) . "<br>";



// $i=1;
// do{
// 	echo $numero2 . "x" . $i . "=" . ($numero2*$i) . "<br>";
// 	$i++;
// }while($i<=10);

// $i=1;
// for ($i; $i <= 10; $i++) { 
// 		echo $numero3 . "x" . $i . "=" . ($numero3*$i) . "<br>";
// }

?>

<?php 
 ?>



</body>
</html>