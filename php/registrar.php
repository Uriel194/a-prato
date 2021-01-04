<?php
include 'conexion.php';
$nombre = $_POST['nombre'];
$apellidop = $_POST['apellp'];
$apellidom = $_POST['apellm'];
$tipo_usuario = $_POST['tipousr'];
$correo_usr = $_POST['correo'];
$pass = $_POST['contrasena'];
$numero_casa = $_POST['numerocasa'];

$sql="INSERT INTO usuarios VALUES(DEFAULT,'$nombre',
								   '$apellidop',
								   '$apellidom',
                                   '$tipo_usuario',
                                   '$correo_usr',
                                   '$pass',
                                   '$numero_casa')";

$ejecutar=mysqli_query($conectar,$sql);

if(!$ejecutar){
    echo"Hubo Algun Error";
}else{
    echo "<script type=\"text/javascript\">alert(\"¡Usuario Agregado correctamente!\");</script>";
?>

    <script>window.location.replace("admin.php");</script>
    
    <?php
}
?>