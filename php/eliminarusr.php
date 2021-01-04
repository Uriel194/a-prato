<?php
session_start();
 
if (!isset($_SESSION['correo'])) 
{
  echo "<script>alert('¡Inicia sesion para acceder a la pagina principal!');</script>";
  echo "<script>window.location = '../index.html';</script>";
}
$consulta = $_GET['no'];
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prato - Cuenta</title>
    <link rel="shortcut icon" href="../img/casa.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
  </div>
</nav>
<table class="table table-light">
    <tbody>
        <tr>
            <td></td>
            <td>
                <center>
                    <h1>¿De verdad quieres eliminar este registro?</h1>
                    <br>
                    <img src="../img/pregunta.png" alt="">
                </center>
                <br>
                <br>
                <br>
                <center>
                <?php echo "<a href='eliminarusr_funcion.php?no=".$consulta."'>
                <button class='btn btn-success' type='button'>Si&nbsp;&nbsp;</button>
                </a>";
                   ?>
                <button class="btn btn-danger" type="button" onclick="cancelar()">No</button>
                </center>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
    
    <script>
    function cancelar(){
        window.location.replace("admin.php");
    }
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>