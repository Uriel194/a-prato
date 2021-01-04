<?php
    include 'conexion.php';
    $consulta = $_GET['no'];
    $sqldel = "DELETE FROM usuarios WHERE id_usuario='$consulta'";

    $ejecutar=mysqli_query($conectar,$sqldel);
    if(!$ejecutar){
        echo"Hubo Algun Error";
    }else{ 
        echo "<script type=\"text/javascript\">alert(\"¡Usuario eliminado correctamente!\");</script>";
        echo "<script>window.location = 'admin.php';</script>";
    }
?>