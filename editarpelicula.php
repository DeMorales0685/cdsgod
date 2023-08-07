<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <div class="container">
        <?php
            // Comprobamos si se ha enviado el formulario al presionar el botón 'enviar'
            if (isset($_POST['enviar'])) {
                //Enviamos los datos del formulario por id, nombre y formato
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $formato = $_POST['formato'];    
                
                // Se hace una variable con la consulta SQL para actualizar los datos de la película en la base de datos
                $sql = "update peliculas set nombre='".$nombre."', formato='".$formato."' where id='".$id."'";

                // Ejecutar la conexion y consulta SQL, obtenemos el resultado
                $resultado = mysqli_query($conexion, $sql);

                //Se valida si la consulta se realizó con exito o no
                if ($resultado) {
                    echo " <script languaje='JavaScript'> alert('Los datos fueron actualizados correctamente a la BD'); location.assign('peliculas.php');</script>";
                } else {
                    echo " <script languaje='JavaScript'> alert('ERROR Los datos no se actualizaron'); location.assign('peliculas.php');</script>";
                }
            } else {

                //Obtenemos el id desde la bdd
                $id = $_GET['id'];
                // Se hace la consulta SQL para obtener los detalles de la película con el 'id' proporcionado en la linea anterior
                $sql = "select * from peliculas where id='".$id."'";

                // Ejecutar la conexion y consulta SQL, obtenemos el resultado
                $resultado = mysqli_query($conexion, $sql);

                // Obtener una fila de resultados y almacenarla en la variable '$fila'
                $fila = mysqli_fetch_assoc($resultado);

                // Extraer el nombre y el formato de la película desde la fila y almacenarlos en las variables '$nombre' y '$formato'
                $nombre = $fila["nombre"];
                $formato = $fila["formato"];
                
                //Cerramos conexión en la bdd
                mysqli_close($conexion);
        ?>
        <h1 style="text-align: center;">EDITAR PELICULA</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br><br>
            <label>Formato</label>
            <input type="text" name="formato" value="<?php echo $formato; ?>"><br><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <input type="submit" name="enviar" value="ACTUALIZAR" class="btn-actualizar"><br><br>
            <a href="peliculas.php" class="btn-regresar">REGRESAR</a><br><br>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>