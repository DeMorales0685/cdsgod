<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR CD</title>
    <link rel="stylesheet" href="agregar.css">
</head>
<body>
    <div class="container">
    <?php
    // Comprobamos si se ha enviado el formulario al presionar el botón 'enviar'
    if (isset($_POST['enviar'])) {

        //Se obtienen los datos del formulario
        $nombre = $_POST['nombre'];
        $formato = $_POST['formato'];

        // Incluir el archivo 'conexion.php' que contiene la conexión a la base de datos
        include("conexion.php");

        // Se hace una variable con la consulta SQL para actualizar los datos de la película en la base de datos
        $sql = "insert into peliculas(nombre, formato) values('".$nombre."','".$formato."')";

        // Ejecutar la conexion y consulta SQL, obtenemos el resultado
        $resultado = mysqli_query($conexion, $sql);

        //echo funcion php para mostrar mensajes o datos en la página
        //script languaje='JavaScript señala que es codigo javascript
        //alert es para mostrar una ventana emergente
        //location assign es una función javascript para redirigir el formulario
        if ($resultado) {
            echo " <script languaje='JavaScript'> alert('Los datos fueron ingresados correctamente a la BD'); location.assign('peliculas.php');</script>";
        } else {
            echo " <script languaje='JavaScript'> alert('ERROR Los datos no fueron ingresados a la BD'); location.assign('peliculas.php');</script>";
        }

        //Se cierra conexion de bdd
        mysqli_close($conexion);
    }
?>
        <h1 style="text-align: center;">Agregar nueva Pelicula</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Nombre</label>
            <input type="text" name="nombre"><br><br>
            <label>Formato</label>
            <input type="text" name="formato"><br><br>
            <input type="submit" name="enviar" value="AGREGAR" class="btn-agregar"><br><br>
            <a href="peliculas.php" class="btn-regresar">REGRESAR</a><br><br>
        </form>
    </div>
</body>
</html>
