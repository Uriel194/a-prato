<!--<?php
session_start();
$iden = $_GET['id'];
if (!isset($_SESSION['correo'])) 
{
  echo "<script>alert('¡Inicia sesion para acceder a la pagina principal!');</script>";
  echo "<script>window.location = 'index.html';</script>";
}
include "conexion.php";

$c = "SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";
$eje = mysqli_query($conectar, $c);
$e=mysqli_fetch_assoc($eje);


include "conexion.php";
?>-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prato - Editar Usuario</title>
    <link rel="shortcut icon" href="../img/casa.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/item.min.css">
    <link rel="stylesheet" href="../css/comment.min.css">
</head>
<body>
<!--Nav-->
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand"><img src="../img/icono.png" id="icono-nav"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a class="nav-link disabled text-light" href="../cuenta.php">Cuenta</a>
        <a class="nav-link text-light" href="../proyectos.php">Proyectos</a>
        <a class="nav-link text-light" href="#">Palapa</a>
        <a class="nav-link text-light" href="../propuesta-mejora.php">Propuesta de mejora</a>
        <!--
        <?php
        $sqli="SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";
        $result=mysqli_query($conectar,$sqli);
        $numero_filas = mysqli_num_rows($result);
          $fila=mysqli_fetch_assoc($result);  
        if($fila['tipo_usuario']=="admin"){
          echo "<a class='nav-link text-light panel' href='php/admin.php'>Panel de Control</a>";
        }
        ?>
        -->
        <a class="nav-link text-light" href="cerrar_sesion.php">
          <div class="nav-link text-light salir"></div>
        </a>
    </form>
  </div>
</nav>
<!--Proyectos-->
<table class="tbc" align="center">
<tr>
<td id="est-cuenta">
  <br>
  <center>
    <div class="alert alert-warning" role="alert">
        <h2>Editar Usuario</h2>  
    </div>
  </center>
</td>
</tr>
<tr>
<td>
    <center>
    <div class="ed-usr" style="width: 50%">
    <form class="form" method="POST" action="editarusr_funcion.php">
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
        <?php 
        $c = "SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";
        $eje = mysqli_query($conectar, $c);
        $e=mysqli_fetch_assoc($eje);

        if($e['tipo_usuario']!="admin"){
          echo "<script>window.location = '../cuenta.php';</script>";
        }

        $sqli="SELECT * FROM usuarios WHERE id_usuario ='".$iden."'";
        $result=mysqli_query($conectar,$sqli);
        $numero_filas = mysqli_num_rows($result);
          $fila=mysqli_fetch_assoc($result);  
        ?>
        <?php
        echo "<input type='text' name='nombusr' class='form-control' value='".$fila['nombre_usuario']."' required>";
        ?>
        </div>
        <br>
        <br>
        <label for="staticEmail" class="col-sm-2 col-form-label">Apellido P:</label>
        <div class="col-sm-10">
        <?php
        echo "<input type='text' name='apep' class='form-control' value='".$fila['apellidop']."' required>";
        ?>
        </div>
        <br>
        <br>
        <label for="staticEmail" class="col-sm-2 col-form-label">Apellido M:</label>
        <div class="col-sm-10">
        <?php
        echo "<input type='text' name='apem' class='form-control' value='".$fila['apellidom']."' required>";
        ?>
        </div>
        <br>
        <br>
        <label for="staticEmail" class="col-sm-2 col-form-label">Tipo: </label>
        <div class="col-sm-10">
        <select id="inputState" name="tipousr" class="form-control">
            <option selected>normal</option>
            <option>admin</option>
        </select>
        </div>
        <br>
        <br>
        <label for="staticEmail" class="col-sm-2 col-form-label">Correo:</label>
        <div class="col-sm-10">
        <?php
        echo "<input type='text' name='correousr' class='form-control' value='".$fila['correo']."' required>";
        ?>
        </div>
        <br>
        <br>
        <label for="staticEmail" class="col-sm-2 col-form-label">Contraseña:</label>
        <div class="col-sm-10">
        <?php
        echo "<input type='text' name='contrausr' class='form-control' value='".$fila['contrasena']."' required>";
        ?>
        </div>
        <br>
        <br>
        <label for="staticEmail" class="col-sm-2 col-form-label">N Casa:</label>
        <div class="col-sm-10">
        <?php
        echo "<input type='number' name='nucasa' class='form-control' value='".$fila['no_casa']."' required>";
        ?>
        </div>
        <br>
        <br>
        <br>
        <div class="col-sm-10">
            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="admin.php">
                <button class="btn btn-danger" type="button">Cancelar</button>
            </a>
        </div>
    </div>
    </form>
    </div>
    </center>
</td>
</tr>
</table>
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>