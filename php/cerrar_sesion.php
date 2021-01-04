<?php 
session_start();
 
if (!isset($_SESSION[correo])) 
{
    header("location:../index.html"); 
}

session_unset($_SESSION[correo]);

session_destroy();

header("location:../index.html"); 
?>