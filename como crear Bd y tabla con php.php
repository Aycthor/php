<?php

//1-conexion a la base de datos.

$servidor = "localhost";
$nombreusuario = "root";
$password = '';
$db = "todolistdb";

$conexion = new mysqli($servidor, $nombreusuario, $password, $db);

if($conexion->connect_error){
    die("Conexion fallida: " . $conexion->connect_error);
}

//2-craeciò de base de datos.
/*$sql = "CREATE DATABASE todolistdb";
if($conexion->query($sql) === true){
    echo "Base de datos creada correctamente...";
}else{
    die("Error al crear base de datos: " . $conexion->error);
}
*/

//3-creación de s
$sql = "CREATE TABLE todotable(
    id int(11) auto_increment primary key,
    texto varchar(100) not null,
    completado boolean not null,
    timestamp timestamp
    )";
if($conexion->query($sql) === true){
    echo "La tabla se creo correctamente... ";
}else{
    die("error al crear tabla: " . $conexion->error);
}
?>