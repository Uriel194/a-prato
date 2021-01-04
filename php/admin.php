<!--<?php
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

if($e['tipo_usuario']!="admin"){
  echo "<script>alert('¡No tienes permisos!');</script>";
  echo "<script>window.location = '../cuenta.php';</script>";
}
include "php/conexion.php";
?>-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prato - Panel Administrador</title>
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
    <form class="form-inline my-2 my-lg-0">
        <a class="nav-link text-light" href="../cuenta.php">Cuenta</a>
        <a class="nav-link text-light" href="../proyectos.php">Proyectos</a>
        <a class="nav-link text-light" href="#">Palapa</a>
        <a class="nav-link text-light" href="../propuesta-mejora.php">Propuesta de mejora</a>
        <a class="nav-link disabled text-dark" href="#">Panel de Control</a>
        <a class="nav-link text-light" href="cerrar_sesion.php">
          <div class="nav-link text-light salir"></div>
        </a>
    </form>
  </div>
</nav>
<br>
<div class="container mt-3">
        <h2>Panel Administrador</h2>
        <p>Este panel es para administrar la información de la pagina en general.
        </p>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#cuenta">Cuenta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#proyectos">Proyectos</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#recordatorios">Recordatorios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#actos-asamblea">Minuta Asamblea</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#convocatorias">Convocatorias</a>
          </li>
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="usuarios" class="container tab-pane active">
          <br>
          <!--Contenido usuarios-->
          <div class="alert alert-warning" role="alert">
            Aqui puedes agregar un nuevo usuario, eliminar y editar la información de cada usuario.
          </div>
          <br>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar <b>+</b></button>
          <br>
          <br>
          <table class="table table-hover">
            <thead class="thead bg-warning">
              <tr>
                <th scope="col">#Casa</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido P</th>
                <th scope="col">Apellido M</th>
                <th scope="col">Tipo</th>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              include 'conexion.php';
              $sqli="SELECT * FROM usuarios";
              $result=mysqli_query($conectar,$sqli);
              $numero_filas = mysqli_num_rows($result);
            
              for($i = 1; $i<= $numero_filas;$i++){
                $fila=mysqli_fetch_assoc($result);
              echo "<tr>"
              ?>
              <th scope="row"><?php echo "".$fila['no_casa']."";?></th>
              <td><?php echo "".$fila['nombre_usuario']."";?></td>
              <td><?php echo "".$fila['apellidop']."";?></td>
              <td><?php echo "".$fila['apellidom']."";?></td>
              <td><?php echo "".$fila['tipo_usuario']."";?></td>
              <td><?php echo "".$fila['correo']."";?></td>
              <td><?php echo "".$fila['contrasena']."";?></td>
              <td>
                  <?php echo "<a href='eliminarusr.php?no=".$fila['id_usuario']."'><button class='btn btn-danger' type='button'>Eliminar</button></a>";
                   ?>
                </td>
                <td>
                  <?php  echo "<a href='editarusr.php?id=".$fila['id_usuario']."'>
                    <button type='button' class='btn btn-success'>
                      Editar
                    </button>
                    </a>" 
                  ?>
                </td>
              <?php
              echo "</tr>";
              }
              

              $c = "SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";
              $eje = mysqli_query($conectar, $c);
              $e=mysqli_fetch_assoc($eje);

              if($e['tipo_usuario']!="admin"){
                echo "<script>window.location = '../cuenta.php';</script>";
              }
              ?>
            </tbody>
          </table>
          <!--Fin contenido usuarios-->
          </div>
          <div id="cuenta" class="container tab-pane fade"><br>
          <div class="alert alert-warning" role="alert">
            Aqui puedes agregar información sobre el estado de cuenta de cada usuario.
          </div>
          </div>
          <div id="proyectos" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>......</p>
          </div>
          <div id="recordatorios" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>......</p>
          </div>
          <div id="actos-asamblea" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>......</p>
          </div>
          <div id="convocatorias" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>......</p>
          </div>
        </div>
      </div>
      <!--Modal agregar usuario-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="registrar.php">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre Usuario</label>
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Apellido Paterno</label>
                  <input type="text" class="form-control" placeholder="Apellido Paterno" name="apellp" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Apellido Materno</label>
                  <input type="text" class="form-control" placeholder="Apellido Materno" name="apellm" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tipo de usuario</label>
                  <select id="inputState" name="tipousr" class="form-control">
                    <option selected>normal</option>
                    <option>admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Correo</label>
                  <input type="email" class="form-control" placeholder="correo@correo.com" name="correo" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <input type="text" class="form-control" placeholder="Contraseña" name="contrasena" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Numero Casa</label>
                  <input type="number" class="form-control" placeholder="0" max="9" name="numerocasa" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Agregar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--Fin modal agregar usuario-->

<script src="../popper.min.js"></script>
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>