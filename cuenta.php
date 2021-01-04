<?php
session_start();
 
if (!isset($_SESSION['correo'])) 
{
  echo "<script>alert('¡Inicia sesion para acceder a la pagina principal!');</script>";
  echo "<script>window.location = 'index.html';</script>";
}
include "php/conexion.php";

$c = "SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";
$eje = mysqli_query($conectar, $c);
$e=mysqli_fetch_assoc($eje);

include "php/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prato - Cuenta</title>
    <link rel="shortcut icon" href="img/casa.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <a class="nav-link disabled text-dark" href="#">Cuenta</a>
        <a class="nav-link text-light" href="proyectos.php">Proyectos</a>
        <a class="nav-link text-light" href="#">Palapa</a>
        <a class="nav-link text-light" href="propuesta-mejora.php">Propuesta de mejora</a>
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
<!--
<table class="tbc-noti-cuen" align="center">
  <tr>
    <td>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Recordatorio</strong> .............
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Recordatorio</strong> .............
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Recordatorio</strong> .............
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </td>
  </tr>
</table>
-->
<table class="tbc" align="center">
<tr>
<td id="est-cuenta">
  <br>
<center>
  <div class="alert alert-warning" role="alert">
  <h3>Estado de Cuenta</h3>
  <br>
  <h4>
    <?php 
    $sqli="SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";
    $result=mysqli_query($conectar,$sqli);
    $numero_filas = mysqli_num_rows($result);
    
    for($i = 1; $i<= $numero_filas;$i++){
      $fila=mysqli_fetch_assoc($result);
      echo "".$fila['nombre_usuario']." ".$fila['apellidop']." ".$fila['apellidom']."";
    }
    ?>
  </h4>
  <br>    
  </div>
</center>
<!--Tabla Cuenta-->
<div class="separador">
    <table class="table table-hover">
      <thead class="thead bg-warning">
        <tr>
          <th scope="col"># Casa</th>
          <th scope="col">Mes</th>
          <th scope="col">Año</th>
          <th scope="col">Monto</th>
          <th scope="col">Notas</th>
        </tr>
      </thead>
      <tbody>
          <?php 
            $sqli="SELECT * FROM est_cuenta WHERE id_usuario ='".$fila['id_usuario']."'";
            $result=mysqli_query($conectar,$sqli);
            $numero_filas = mysqli_num_rows($result);
            for($i = 1; $i<= $numero_filas;$i++){
              $fila=mysqli_fetch_assoc($result);
            echo "<tr>"
          ?>
          <th scope="row"><?php echo "".$fila['no_casa']."";?></th>
          <td><?php echo "".$fila['mes']."";?></td>
          <td><?php echo "".$fila['anio']."";?></td>
          <td><?php echo "$".$fila['monto']."";?></td>
          <td><?php echo "".$fila['notas']."";?></td>
          <?php
            echo "</tr>";
            }
          ?>
        </tr>
      </tbody>
    </table>
    </div>
    </td>
</tr>
<tr>
<td>
  <br>
<!--Actos de Asamblea-->
<center>
<div class="alert alert-warning" role="alert">
    <h4>Actos de Asamblea</h4>
</div>
</center>
<br>
<div class="alert-asa separador">
    <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist">
        <?php
          $sqli="SELECT * FROM actos_asamblea";
          $result=mysqli_query($conectar,$sqli);
          $numero_filas = mysqli_num_rows($result);
        ?>
        </a>
        <?php 
        for($i = 1; $i<= $numero_filas;$i++){
            $fila=mysqli_fetch_assoc($result);
            echo "<a class='list-group-item list-group-item-action' id='list-".$fila['id_asamblea']."-list' data-toggle='list' href='#list-".$fila['id_asamblea']."' role='tab' aria-controls='".$fila['id_asamblea']."'>".$fila['tit_asamblea']."</a>";
          }
        ?>
      </div>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <?php
        $sqli="SELECT * FROM actos_asamblea";
        $result=mysqli_query($conectar,$sqli);
        $numero_filas = mysqli_num_rows($result);

        for($i = 1; $i<= $numero_filas;$i++){
          $fila=mysqli_fetch_assoc($result);
          echo "<div class='tab-pane fade' id='list-".$fila['id_asamblea']."' role='tabpanel' aria-labelledby='list-".$fila['id_asamblea']."-list'>".$fila['cont_asamblea']."<br><div class='extra'>".$fila['fecha_asamblea']."</div></div>";
        }
        ?>
      </div>
    </div>
  </div>
  <br>
  </div>
</td>
</tr>
<tr>
<td>
<div class="separador">
<br>
<center>
<div class="alert alert-warning" role="alert">
    <h4>Convocatorias</h4>
</div>
</center>
<br>
<?php
  $sqli="SELECT * FROM convocatorias";
  $result=mysqli_query($conectar,$sqli);
  $numero_filas = mysqli_num_rows($result);
        
  for($i = 1; $i<= $numero_filas;$i++){
  $fila=mysqli_fetch_assoc($result);
  
  echo "<div class='card text-center'>
  <div class='card-header'>".$fila['tit_convocatoria']."</div>
  <div class='card-body'>
    <p class='card-text'>".$fila['cont_convocatoria']."</p>
  </div>
  <div class='card-footer text-muted'>".$fila['fecha_convocatoria']."</div>
  </div>";
  echo "<br>";
?>
<?php
}
?>
</div>
</td>
</tr>
</table>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>