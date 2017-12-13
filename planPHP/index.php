<?php
ob_start();
?>
<!DOCTYPE html>
<html >
<head>

  <meta charset="UTF-8">
  <title>Miscelanea</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
    function pulsar(e) {
      tecla = (document.all) ? e.keyCode :e.which;
      return (tecla!=13);
    }
  </script>

</head>

<body>

  <div class="body"></div>
  <div class="header">
    <div>Misce<span>lanea</span></div>
  </div>
  <br>
  <form method="post" action="index.php">
    <div class="login">
      <input type="text" placeholder="Usuario" name="usuario"><br>
      <input type="password" placeholder="Contraseña" name="clave"><br>      
      <button type="btn" id="login" value="" name="enviar">Ingresar</button>
      <button type="btn" id="register" value="" name="register">Registrarse</button>
      <?php
      require ("conexion.php");

      if (isset($_POST['register'])){
        Header("Location: register.php");
      }
      elseif (isset($_POST['enviar'])){
        error_reporting(0);
        $usu = $_POST['usuario'];
        $clave = $_POST['clave'];
        $proceso = "SELECT * FROM usuarios WHERE contra='$clave'  AND  user = '$usu';";

        if($resultado = $conexion->query($proceso)) {
          while($row = $resultado->fetch_array()) {
            $userok = $row["user"];
            $passok = $row["contra"];
            $tipouserok = $row["tipoUser"];
            $estadook = $row["estado"];
          }
        }

        if ($usu == $userok && $clave == $passok && $tipouserok == "Administrador" && $estadook == 0) {//Inicia sesion como adminitrador.
          session_start();
          $_SESSION["u_usuario"] = 1;
          header("location:admin.php");
        }
        else if($usu == $userok && $clave == $passok && $tipouserok =="Asesor" && $estadook == 0){//Inicia sesion como asesor.
          session_start();
          $_SESSION["u_usuario"] = 1;
          header("location:asesor.php");

        }
        else if($usu == $userok && $clave == $passok && $tipouserok =="Vendedor" && $estadook == 0){//Inicia sesion como vendedor.
          session_start();
          $_SESSION["u_usuario"] = 1;
          header("location:vendedor.php");

        }
        else if($usu == $userok && $clave == $passok && $tipouserok =="Administrador" && $estadook == 1){//Inicia sesion como admin bloqueado.
          session_start();
          $_SESSION["u_usuario"] = 2;
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<strong>Administrador bloqueado</strong>";

        }
        else if($usu == $userok && $clave == $passok && $tipouserok =="Asesor" && $estadook == 1){//Inicia sesion como asesor bloqueado.
          session_start();
          $_SESSION["u_usuario"] = 2;
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<strong>Asesor bloqueado</strong>";

        }
        else if($usu == $userok && $clave == $passok && $tipouserok =="Vendedor" && $estadook == 1){//Inicia sesion como vendedor bloqueado.
          session_start();
          $_SESSION["u_usuario"] = 2;
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<strong>Vendedor bloqueado</strong>";

        }
        else{
          $_SESSION["u_usuario"] = 0;
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<strong>Usuario o contraseña incorrectos</strong>";
        }

      }


      ?>
    </div>
  </form>

</body>
</html>
<?php
ob_end_flush();
?>
