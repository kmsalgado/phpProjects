<?php
ob_start();
?>
<!DOCTYPE html>
<html >
<head>

  <meta charset="UTF-8">
  <title>Registrarse</title>
  <link rel="stylesheet" type="text/css" href="css/style2.css" />
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
  <form method="post" action="register.php">
    <div class="register">
      <input type="number" placeholder="Identificacion* (C.C, T.I)" name="cedula" autocomplete="off" size="10" min="0" max="1000000000"><br>
      <input type="text" placeholder="Nombres*" name="nombre" autocomplete="off"><br>
      <input type="text" placeholder="Apellidos*" name="apellido" autocomplete="off"><br>
      <input type="email" placeholder="Correo*" name="correo" autocomplete="off"><br>
      <input type="tel" placeholder="Telefono" name="telefono" autocomplete="off" size="10"><br>
      <input type="password" placeholder="Contraseña*" name="clave"><br>
      <input type="text" placeholder="Usuario*" name="usuario" autocomplete="off"><br>
      <select name="tipoUsuario" >
        <option value="Administrador">Administrador</option>
        <option value="Asesor">Asesor</option>
        <option value="Vendedor">Vendedor</option>
      </select>      
      <button type="btn" id="register" value="" name="registrar">Registrar</button>
      <button type="btn" id="volver" value="" name="volver">Volver</button>

      <?php
      require ("conexion.php");

      @$boton = isset($_POST["registrar"]);

      if (isset($_POST['volver'])){
       Header("Location: index.php");
     }
     elseif ($boton != "") {
      $id = $_POST["cedula"];
      $nom = $_POST["nombre"];
      $ape = $_POST["apellido"];
      $mail = $_POST["correo"];
      $tel = $_POST["telefono"];
      $clave = $_POST["clave"];
      $usu = $_POST["usuario"];
      $tipusu = $_POST["tipoUsuario"];
      $opcion1=0;

      switch ($_POST["tipoUsuario"]) {
        case 'Administrador':
        $opcion1=1;
        break;
        case 'Asesor':
        $opcion1=2;
        break;
        case 'Vendedor':
        $opcion1=3;
        break;
        default:
        echo "Por Favor Seleccione un Usuario";
        break;
      }

      $verifica = mysqli_query($conexion ,"SELECT * FROM usuarios WHERE idusuarios = '$id';");
      $verifica2 = mysqli_query($conexion ,"SELECT * FROM usuarios WHERE correo = '$mail';");
      $verifica3 = mysqli_query($conexion ,"SELECT * FROM usuarios WHERE user = '$usu';");
      if (mysqli_num_rows($verifica) >= 1) {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<div align='center'>";
        echo "<strong> La identificacion ya existe!</strong>";
        echo "</div>";

      }else{
        if (mysqli_num_rows($verifica2) >= 1) {
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<br>";
          echo "<div align='center'>";
          echo "<strong> El correo ya fue registrado! </strong>";
          echo "</div>";

        }else{
          if (mysqli_num_rows($verifica3) >= 1) {
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<div align='center'>";
            echo "<strong> El usuario ya existe! </strong>";
            echo "</div>";

          }else{
            $crearUsuario = "INSERT INTO usuarios(idusuarios, nombre, apellido, correo, telefono, contra, user, tipoUser) VALUES ($id, '$nom', '$ape', '$mail', $tel, '$clave', '$usu', '$tipusu')";
            $matris=mysqli_query($conexion, $crearUsuario);

            if ($matris==false) {
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<div align='left'>";
              echo "<strong> Hay campos vacios </strong>";
              echo "</div>";

            }else{
              Header("Location: index.php");

            }
          }
        }
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
