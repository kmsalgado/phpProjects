<?php
session_start();

if (isset($_SESSION["u_usuario"])) {

}else{
  header("Location:index.php");
}
?>
<html>
<head>
	<title>Cotizacion Administrador</title>
  <link rel="stylesheet" type="text/css" href="css/styleTable.css" />
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <h1>Bienvenido Administrador</h1>
  <div id="cerrarsesion" align="right">
    <button><a href="cerrarSesion.php"><i class='icon-off'></i>Cerrar sesion</a></li></button>    
  </div>
  <form action="CotizacionAdmin.php" method="post">
    <label for="num1">cantidad viajeros</label>
    <input type="number" name="cantpa" >
    <br>
    <br>
  	<!-- <label for="num2">niños</label>
  	<input type="number" name="num2" id="num2">
  	<br>
  	<br> -->
  	<label for="num3">descuento</label>
  	<input type="number" name="descue" >
  	<br>
  	<br>
  	<select name="destino">
  		<option value="Santa Marta">Santa Marta</option>
  		<option value="San Andres">San Andres</option>
  		<option value="Cancun">Cancun</option>
  	</select>
  	<br>
  	<br>
  	<input type="checkbox" name="hotel" value="hotel">Hotel<br>
  	<input type="checkbox" name="comidas" value="comidas">Comidas<br>
  	<input type="checkbox" name="bebidas" value="bebidas">Bebidas<br>
  	<input type="checkbox" name="excurciones" value="excurciones">Excurciones<br>
  	<br>
  	<input type="submit" value="Cambiar Precios" name="cambio" >
  	<input type="submit" value="Calcular" name="boton">
  	<input type="submit" value="Consultar Precios" name="actualizar">
    <input type="submit" value="Crear Cotizacion" name="crear">
    <input type="submit" value="Consultar Cotizacion" name="consultaCoti">
    <br>
  </form>

  <?php
  include ("Calculos.php");
  require ("datosconeccion.php");

  if (isset($_POST['cambio'])){
   Header("Location: cambiar-valores-vuelo.php");
 }

 if (isset($_POST["actualizar"])) {

   echo " <h1> Precios Actuales </h1> <br>";
   $consultarvalores="select * from preciosbase";
   $conexionBD=mysqli_connect("localhost","root","","usuarios");
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
	if(isset($_POST["excurciones"])){
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

if (isset($_POST["crear"])) {  
  $cant = $_POST["cantpa"];
  $desc = $_POST["descue"];
  $dest = $_POST["destino"];
  $opcion1 = 0;
  $hot = 0;
  $com = 0;
  $beb = 0;
  $exc = 0;

  if (isset($_POST["hotel"])) {
    $hot = 1;
  }
  if (isset($_POST["comidas"])) {
    $com = 1;
  }
  if (isset($_POST["bebidas"])) {
    $beb = 1;
  }
  if (isset($_POST["excurciones"])) {
    $exc = 1;
  }

  switch ($_POST["destino"]) {
    case 'Santa Marta':
    $opcion1=1;
    break;
    case 'San Andres':
    $opcion1=2;
    break;
    case 'Cancun':
    $opcion1=3;
    break;
    default:
    echo "Por Favor Seleccione un Destino";
    break;
  }

  $crearCotizacion = "INSERT INTO cotizacion(idcotizacion, cantPasajeros, descuento, destino, hotel, comidas, bebidas, excurciones) values (idcotizacion, $cant, $desc, '$dest', $hot, $com, $beb, $exc)";
  $matris=mysqli_query($conexion, $crearCotizacion);
  if ($matris==false) {

    echo "error al registrar";
    
  }else{
    echo "Registro Exitoso";
  }

}

if (isset($_POST["consultaCoti"])) {
  $consulta="SELECT * FROM cotizacion";
  echo "<table class='tableListar table-hover' id='dev-table' border='1'>
  <thead>
    <tr>
      <th>Cantidad Adultos</th>
      <th>Descuento</th>
      <th>Destino</th>
      <th>Hotel</th>
      <th>Comidas</th>
      <th>Bebidas</th>
      <th>Excurciones</th>
    </tr>
  </thead>";
  $matriz=mysqli_query($conexion, $consulta);
  while ($fila = mysqli_fetch_row($matriz)) {
    echo "<tbody>";
    echo "<tr>";
    echo "<td>".$fila[1]."</td>";
    echo "<td>".$fila[2]."</td>";
    echo "<td>".$fila[3]."</td>";
    echo "<td>".$fila[4]."</td>";
    echo "<td>".$fila[5]."</td>";
    echo "<td>".$fila[6]."</td>";
    echo "<td>".$fila[7]."</td>";
    echo "</tr>";
    echo "</tbody>";
  }
}

?>

</table>

</body>
</html>

