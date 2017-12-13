<?php
session_start();

if (isset($_SESSION["u_usuario"])) {

}else{
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Administrador</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <link rel="stylesheet" type="text/css" href="css/stylePg.css">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/js/bootstrap.min.js">
  <link href='https://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' defer=""></script>
  <script src="js/asesor.js" defer=""></script>
</head>
<body>
  <header class="main_h">

    <div class="row">
      <a class="logo" href="asesor.php">ADMINISTRADOR</a>

      <div class="mobile-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav>
        <ul>
          <li><a href="admin.php">Articulos</a></li>
          <li><a href="usuarios.php">Usuarios</a></li>
          <li><a href="sesion.php"><i class='icon-off'></i>Cerrar Sesion</a></li>
        </ul>
      </nav>

    </div>
  </header>

  <div class="hero">

    <h1><span>PAGINA ADMINISTRADOR</span><br>Bienvenido Administrador</h1>

    <div class="mouse">
      <span></span>
    </div>

  </div>
  <div class="container" align="center">
    <br>
    <h1 class="productos" style="text-align: center;  font-size: 50px;">CREAR USUARIO</h1>
    <div class="row content" align="center">
      <p>
        <form method="post" ACTION="crearUsuario.php">
          <label for="id">Identificacion</label>
          <input type="number" name="idusu">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombreusu">
          <label for="apellido">Nombre</label>
          <input type="text" name="apellidousu">
          <label for="correo">Correo</label>
          <input type="email" name="correousu">
          <label for="telefono">Telefono</label>
          <input type="tel" name="telefonousu" size="10">
          <label for="contra">Contraseña</label>
          <input type="password" name="contrausu">
          <label for="usuario">Nombre de Usuario</label>
          <input type="text" name="usu">
          <br>
          <select name="tipoUsuario" >
            <option value="Administrador">Administrador</option>
            <option value="Asesor">Asesor</option>
            <option value="Vendedor">Vendedor</option>
          </select>
          <br>
          <input type="submit" name="crear" value="Crear">
          <input type='submit' name="volver" value='Volver'>
          
          <?php
          require ("conexion.php");
          error_reporting(0);
          @$boton = isset($_POST["crear"]);

          if (isset($_POST['volver'])){
            Header("Location: usuarios.php");
          }elseif ($boton != "") {
            $id = $_POST["idusu"];
            $nom = $_POST["nombreusu"];
            $ape = $_POST["apellidousu"];
            $mail = $_POST["correousu"];
            $tel = $_POST["telefonousu"];
            $clave = $_POST["contrausu"];
            $usu = $_POST["usu"];
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
              echo "La identificacion ya existe!";

            }else{
              if (mysqli_num_rows($verifica2) >= 1) {
                echo "El correo ya fue registrado!";

              }else{
                if (mysqli_num_rows($verifica3) >= 1) {
                  echo "El usuario ya existe!";

                }else{
                  $crearUsuario = "INSERT INTO usuarios(idusuarios, nombre, apellido, correo, telefono, contra, user, tipoUser) VALUES ($id, '$nom', '$ape', '$mail', $tel, '$clave', '$usu', '$tipusu')";
                  $matris=mysqli_query($conexion, $crearUsuario);

                  if ($matris==false) {
                    echo "Hay campos vacios";

                  }else{
                    Header("Location: usuarios.php");

                  }
                }
              }
            }            
          }
          ?>
        </form>
      </p>
    </div>
  </div>
</body>
</html>
