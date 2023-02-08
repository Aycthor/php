<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar datos de la tabla</title>
</head>
<body>
    <form action="Eliminar datos de tabla en php.php" method="POST">
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
            //validacion para ingresar
            if(isset($_POST['texto'])){
                $texto = $_POST['texto'];
                /*echo $texto;*/

                $sql = "INSERT INTO todotable(texto, completado)
                                    VALUES('$texto', false)";

                if($conexion->query($sql) === true){
                    //echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al insertar datos: " . $conexion->error);
                }
            }else if(isset($_POST['completar'])){
                $id = $_POST['completar'];

                $sql = "UPDATE todotable SET completado = 1 WHERE id = $id";

                if($conexion->query($sql) === true){
                    //echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al actualizar datos: " . $conexion->error);
                }

            }else if(isset($_POST['eliminar'])){
                $id = $_POST['eliminar'];

                $sql = "DELETE FROM todotable WHERE id = $id";

                if($conexion->query($sql) === true){
                    //echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al actualizar datos: " . $conexion->error);

            }
        }
            //Obtencion de datos de tabla.
        $sql = "SELECT * FROM todotable";
        $resultado = $conexion->query($sql);

        if($resultado->num_rows > 0){
            /*echo $resultado->num_rows;*/
            while($row = $resultado->fetch_assoc()){
               // echo '<div><form action=""><input type="checkbox">'.$row['texto'].'</form></div>';

               ?>
                <div>
                <form method="post" id="form<?php echo $row['id']; ?>" action="">
               <input name="completar" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type= "checkbox" onchange="completarPendiente(this)"><?php echo $row['texto']; ?>
               </form>

                <form method="POST" id="form_eliminar_<?php echo $row['id'];?>" action="Eliminar datos de tabla en php.php">
                    <input type="hidden" name="eliminar" value="<?php echo $row['id'];?>">
                    <input type="submit" value="eliminar">
                </form>
                </div>
            <?php
            
            }

        }

        $conexion->close(); 

         ?>
    </div>

     <script>
        function completarPendiente(e){
            var id = "form" + e.id;
            var formulario = document.getElementById(id);
            formulario.submit(); 
        }
     </script>
</body>