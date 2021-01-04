<?php
include "conexion.php";

$nombre = $_POST['nombusr'];
$apellp = $_POST['apep'];
$apellm = $_POST['apem'];
$tipo = $_POST['tipousr'];
$correo = $_POST['correousr'];
$contrasena = $_POST['contrausr'];
$numerocasa = $_POST['nucasa'];

$sqli="SELECT * FROM usuarios WHERE correo ='$correo'";
        $result=mysqli_query($conectar,$sqli);
        $numero_filas = mysqli_num_rows($result);
          $fila=mysqli_fetch_assoc($result);  

$sql = "UPDATE usuarios SET nombre_usuario = '$nombre', 
                                apellidop = '$apellp',
                                apellidom='$apellm',
                                tipo_usuario='$tipo',
                                correo='$correo',
                                contrasena='$contrasena',
                                no_casa='$numerocasa'
                                WHERE id_usuario = '".$fila['id_usuario']."'";

$ejecutar=mysqli_query($conectar,$sql);
if(!$ejecutar){
    echo"Hubo Algun Error";
}else{
    echo "<script type=\"text/javascript\">alert(\"¡Datos actualizados correctamente!\");</script>";
?>

    <script>window.location.replace("admin.php");</script>
    
    <?php
}
?>