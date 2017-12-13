<!DOCTYPE html>
<html >
<head>

  	<meta charset="UTF-8">
  	<title>Conjunto Residencial</title>
  	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</head>

<body>

  	<div class="body"></div>
		<div class="header">
			<div>Agencia<span>De Viajes</span></div>
		</div>
		<br>
    <form method="post" action="validar.php">
		    <div class="login">
				  <input type="email" placeholder="Correo" name="correo"><br>
				    <input type="password" placeholder="Contraseña" name="clave"><br>
				    <button type="btn" id="" value="" name="enviar">Login</button>
		    </div>
    </form>
    <?php

      //require ("datosconeccion.php");//para enlasar con los datos iniciales de datosconeccion.php

      // $conexion=mysqli_connect($hostBD,$usuarioBD,$contrasenaBD,$nombreBD);//esto es para hacer la coneccion con la base de datos

     //$consulta1=("select correo from datosingreso");
      //$consulta2=("select contra from datosingreso");
      //$consulta3=("select user from datosingreso");

      //if (mysqli_connect_errno()) {//esto es para verificar la coneccion con la base de datos
        //echo "no se pudo conectar"."<br>";
      //}else{
        //echo "coneccion exitosa"."<br>";
      //}

      //$matrizresultado=mysqli_query($conexion,$consulta1);//esto es para hacer una matriz con la consulta
      //$matrizresultado2=mysqli_query($conexion,$consulta2);
      //$matrizresultado3=mysqli_query($conexion,$consulta3);

      //$fila=mysqli_fetch_row($matrizresultado);

      //echo $fila[0];

      //while($fila=mysqli_fetch_row($matrizresultado)){//esto es para recorre la matriz y buscar el correo
        //echo $fila[0] . " ";
        //echo $fila[1] . " ";
        //echo $fila[2] . " ";
        //$user[]=$fila[0];
        //echo "<br>";
      //}

      //while($fila=mysqli_fetch_row($matrizresultado2)){//esto es para recorre la matriz y buscar el pass
       // $pas[]=$fila[0];
      //}
      //while($fila=mysqli_fetch_row($matrizresultado3)){//esto es para recorre la matriz y buscar el tipo de usuario
      //  $tipouser[]=$fila[0];
      //}


      //mysqli_close($conexion);//esto es para cerrar la coneccion con la base de datos





      //if (isset($_POST["enviar"])) {
        //for ($i=0; $i < count($user); $i++) { //el count es para ir hasta el ultimo reguistro que halla
          //if ($_POST["correo"]==$user[$i] && $pas[$i]==$_POST["clave"] && $tipouser[$i]=="admin") {
           // session_start();
           // $_SESSION["tipou"]=$tipouser[$i];
          //  header ('location: CotizacionAdmin.php');
          //} elseif($_POST["correo"]==$user[$i] && $pas[$i]==$_POST["clave"] && $tipouser[$i]=="normal"){
         //   session_start();
          //  $_SESSION["tipou"]=$tipouser[$i];
           // echo $_SESSION["tipou"];
           // header ('location: CotizacionAsesor.php');

         // }
          //  session_destroy();
        //}
      //}



    ?>
</body>
</html>
