<?php 
session_start();
 
if (!isset($_SESSION['correo'])) 
{
  echo "<script>alert('¡Inicia sesion para acceder a la pagina principal!');</script>";
  echo "<script>window.location = 'index.html';</script>";
}
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prato - Propuesta de Mejora</title>
    <link rel="shortcut icon" href="img/casa.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/item.min.css">
    <link rel="stylesheet" href="css/comment.min.css">
</head>
<body>
<!--Nav-->
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand"><img src="img/icono.png" id="icono-nav"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a class="nav-link disabled text-light" href="cuenta.php">Cuenta</a>
        <a class="nav-link text-light" href="proyectos.php">Proyectos</a>
        <a class="nav-link text-light" href="#">Palapa</a>
        <a class="nav-link text-dark" href="#">Propuesta de mejora</a>
        <?php
        $sqli="SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";
        $result=mysqli_query($conectar,$sqli);
        $numero_filas = mysqli_num_rows($result);
          $fila=mysqli_fetch_assoc($result);  
        if($fila['tipo_usuario']=="admin"){
          echo "<a class='nav-link text-light panel' href='php/admin.php'>Panel de Control</a>";
        }
        ?>
        <a class="nav-link text-light" href="php/cerrar_sesion.php">
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
        <h2>Propuestas de mejora</h2>  
  </div>
</center>
</td>
</tr>
<tr>
<td>
<form action="php/comentar.php" method="post">
<div class="formcomen">
  <center>
  <div class="form-group caja-c">
    <p>Este apartado fue creado con el fin de que puedan escribir sus propuestas para mejorar el servicio.</p>
    <label for="exampleFormControlTextarea1">Escribe alguna propuesta</label>
    <textarea class="form-control" name="comentario" id="exampleFormControlTextarea1" rows="3"></textarea>

  </div>
  </center>
</div>
<br>
<center>
  <button type="submit" class="btn btn-primary">Enviar</button>
</center>
<br>
<br>
</form>
</td>
</tr>
<tr>
<td>
<?php
include "php/conexion.php";
$sqli="SELECT * FROM propuesta_mejora";
$result=mysqli_query($conectar,$sqli);
$numero_filas = mysqli_num_rows($result);

for($i = 1; $i<= $numero_filas;$i++){
  $fila=mysqli_fetch_assoc($result);
?>
<center>
<?php
echo "<div class='comentario'>
<div class='ui comments'>
  <div class='comment'>
    <a class='avatar'>
      <img src='img/casa.png'>
    </a>
    <div class='content'>
      <a class='author'>".$fila['nombre_usuario']."</a>
      <div class='metadata'>
        <span class='date'>".$fila['fecha_prop']."</span>
      </div>
      <div class='text'>".$fila['propuesta']."</div>
    </div>
  </div>
</div>
</div>
<br>";
}
?>
</center>
</td>
</tr>
<tr>
<td>
    
</td>
</tr>
</table>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>