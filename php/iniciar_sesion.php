<?php
include "conexion.php";

$correo=$_POST['correo'];
$contra=$_POST['pass'];
$_SESSION['email'] = $_POST['correo'];


if(!$conectar){
	echo "Error";
}
else{
	 $consulta=mysqli_query($conectar,"select * from usuarios where correo='$correo' and contrasena='$contra'")or die("Error en consulta");
     $consulta1=mysqli_query($conectar,"select id_usuario from usuarios where correo='$correo' and contrasena='$contra'")or die("Error en consulta");
     $ele=mysqli_fetch_assoc($consulta1);
     $i=mysqli_num_rows($consulta);
     
     if($i==1){
      session_start();
      $_SESSION['correo']="$correo";

		header('Location:../cuenta.php');
	 }
     else{
        echo "<script type=\"text/javascript\">alert(\"¡Datos incorrectos! intente de nuevo\");</script>";
        echo "<script>window.location = '../index.html';</script>";
	 }		 
}

?>