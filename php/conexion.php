<?php
    $usuario = 'u107864204_uriel';
	$contrasena = 'c1241122';
	$servidor = 'localhost';
	$basededatos = 'u107864204_cmpp';
	$conectar=mysqli_connect($servidor,$usuario,$contrasena) or die ("No se ha podido conectar al servidor");
	
	if(!$conectar){
		echo"No Se Pudo Conectar Con El Servidor";
	}else{

		$base=mysqli_select_db($conectar, $basededatos);
		if(!$base){
            echo"No Se Encontro La Base De Datos";
            			
		}
    }
?>