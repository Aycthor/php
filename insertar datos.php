<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insertar datos</title>
</head>
<body>
    <form action="insertar datos.php" method="POST">
        <input type="text" name="texto" id="texto">
        <input type="submit" value="añadir pendiente">
    </form>
    <div id="todolist">
         <?php
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = '';
            $db = "todolistdb";
         
            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);
         
            if($conexion-> connect_error){
                 die("conexion fallida:" . $conexion->connect_error);
            }

            if(isset($_POST['texto'])){
                $texto = $_POST['texto'];
                /*echo $texto;*/

                $sql = "INSERT INTO todotable(texto, completado)
                                    VALUES('$texto', false)";

                if($conexion->query($sql) === true){
                    echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al insertar datos: " . $conexion->error);
                }
            }

         ?>
    </div>
</body>
</html>