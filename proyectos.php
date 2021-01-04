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
    <title>Prato - Proyectos</title>
    <link rel="shortcut icon" href="img/casa.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/item.min.css">
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
        <a class="nav-link text-dark" href="#">Proyectos</a>
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
        <a class="nav-link text-light">
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
        <h2>Proyectos</h2>  
  </div>
</center>
</td>
</tr>
<tr>
<td>
<div class="alert-asa separador">
    <div class="row">
    <div class="col-4">
      <div class="list-group" id="list-tab" role="tablist" style="position:sticky;">
        <a class="list-group-item list-group-item-action active" id="list-1-list" data-toggle="list" href="#list-1" role="tab" aria-controls="1">Corto Plazo</a>
        <a class="list-group-item list-group-item-action" id="list-2-list" data-toggle="list" href="#list-2" role="tab" aria-controls="2">Mediano Plazo</a>
        <a class="list-group-item list-group-item-action" id="list-3-list" data-toggle="list" href="#list-3" role="tab" aria-controls="3">Largo Plazo</a>
      </div>
    </div>
    <div class="col-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-list">
        <!--Contenido corto plazo-->
        <div class="ui divided items">
            <?php 
            include 'php/conexion.php';
            $sqli="SELECT * FROM proyectos WHERE tipo_proyecto ='corto'";
            $result=mysqli_query($conectar,$sqli);
            $numero_filas = mysqli_num_rows($result);
        
            for($i = 1; $i<= $numero_filas;$i++){
            $fila=mysqli_fetch_assoc($result);
              echo "<div class='item'>
              <div class='image'>
                <img src='data:image/jpg;base64,".base64_encode($fila['img_proyecto'])."'>
              </div>
              <div class='content'>
                <a class='header'><h3>".$fila['tit_proyecto']."</h3></a>
                <div class='meta'>
                  <span></span>
                </div>
                <div class='description'>
                  <p>".$fila['desc_proyecto']."</p>
                </div>
                <div class='extra'>".$fila['fecha_proyecto']."</div>
              </div>
            </div>
            <hr />
            ";  
            }
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-list">
        <!--Contenido a mediano plazo-->
        <div class="ui divided items">
            <?php 
            include 'conexion.php';
            $sqli="SELECT * FROM proyectos WHERE tipo_proyecto ='mediano'";
            $result=mysqli_query($conectar,$sqli);
            $numero_filas = mysqli_num_rows($result);
        
            for($i = 1; $i<= $numero_filas;$i++){
            $fila=mysqli_fetch_assoc($result);
              echo "<div class='item'>
              <div class='image'>
                <img src='data:image/jpg;base64,".base64_encode($fila['img_proyecto'])."'>
              </div>
              <div class='content'>
                <a class='header'>".$fila['tit_proyecto']."</a>
                <div class='meta'>
                  <span></span>
                </div>
                <div class='description'>
                  <p>".$fila['desc_proyecto']."</p>
                </div>
                <div class='extra'>".$fila['fecha_proyecto']."</div>
              </div>
            </div> 
            <hr/>";  
            }
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-list">
        <!--Contenido a largo plazo-->
        <div class="ui divided items">
        <?php 
            include 'conexion.php';
            $sqli="SELECT * FROM proyectos WHERE tipo_proyecto ='largo'";
            $result=mysqli_query($conectar,$sqli);
            $numero_filas = mysqli_num_rows($result);
        
            for($i = 1; $i<= $numero_filas;$i++){
            $fila=mysqli_fetch_assoc($result);
              echo "<div class='item'>
              <div class='image'>
                <img src='data:image/jpg;base64,".base64_encode($fila['img_proyecto'])."'>
              </div>
              <div class='content'>
                <a class='header'><h3>".$fila['tit_proyecto']."</h3></a>
                <div class='meta'>
                  <span></span>
                </div>
                <div class='description'>
                  <p>".$fila['desc_proyecto']."</p>
                </div>
                <div class='extra'>".$fila['fecha_proyecto']."</div>
              </div>
            </div>
            <hr/>
            ";  
            }
            ?>        
        </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  </div>
</td>
</tr>
</table>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>