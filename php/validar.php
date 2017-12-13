<?php 


$usuario = $_POST['correo'];
$password = $_POST['clave'];

include("datosconeccion.php");

$proceso = $conexion ->query("SELECT contra, correo, user  FROM datosingreso WHERE contra='$password'  AND  correo = '$usuario'");

$row = mysqli_fetch_array($proceso);


if ($row["user"]=="admin") {//Inicia sesion como adminitrador.
       session_start();
$_SESSION["u_usuario"] = 1;
header("location:CotizacionAdmin.php");	

}else if($row["user"]=="normal"){//Inicia sesion como cliente
       session_start();
$_SESSION["u_usuario"] = 1;
header("location:CotizacionAsesor.php");

}else{
$_SESSION["u_usuario"] = 0;
header("location:index.php");	
}
?>