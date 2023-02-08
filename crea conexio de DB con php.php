<?php

$servidor = "localhost";
$nombreusuario = "root";
$password = '';

$conexion = new mysqli($servidor, $nombreusuario, $password);

if($conexion-> connect_error){
    die("conexion fallida:" . $conexion->connect_error);
}

echo "conexion exitosa...";
?>