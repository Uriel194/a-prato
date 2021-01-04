<?php 

include 'conexion.php';

session_start();
 
if (!isset($_SESSION['correo'])) 
{
    header("location:../index.html"); 
}

$propuesta = $_POST['comentario'];
$sqlnombre="SELECT * FROM usuarios WHERE correo ='".$_SESSION['correo']."'";

$nombre =mysqli_query($conectar,$sqlnombre);
$fila=mysqli_fetch_assoc($nombre);

$sql="INSERT INTO propuesta_mejora VALUES(DEFAULT,'".$fila['nombre_usuario']."',
'$propuesta',CURDATE())";

$ejecutar=mysqli_query($conectar,$sql);

if(!$ejecutar){
	echo "<script type=\"text/javascript\">alert(\"¡Error al comentar! intente de nuevo\");</script>";
    echo "<script>window.location = '../propuesta-mejora.php';</script>";
}
else{
    echo "<script type=\"text/javascript\">alert(\"¡Propuesta enviada!\");</script>";
    echo "<script>window.location = '../propuesta-mejora.php';</script>";
}
?>