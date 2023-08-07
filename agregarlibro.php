<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR LIBRO</title>
    <link rel="stylesheet" href="agregar.css">
</head>
<body>
    <div class="container">
        <?php
            if (isset($_POST['enviar'])) {
                $titulo = $_POST['titulo'];
                $editorial = $_POST['editorial'];
                include("conexion.php");
                $sql = "insert into libros(titulo, editorial) values('".$titulo."','".$editorial."')";
                $resultado = mysqli_query($conexion, $sql);

                if ($resultado) {
                    echo " <script languaje='JavaScript'> alert('Los datos fueron ingresados correctamente a la BD'); location.assign('libros.php');</script>";
                } else {
                    echo " <script languaje='JavaScript'> alert('ERROR Los datos no fueron ingresados a la BD'); location.assign('libros.php');</script>";
                }
                mysqli_close($conexion);
            } else {
        ?>
        <h1 style="text-align: center;">Agregar nuevo libro</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Titulo</label>
            <input type="text" name="titulo"><br><br>
            <label>Editorial</label>
            <input type="text" name="editorial"><br><br>
            <input type="submit" name="enviar" value="AGREGAR" class="btn-agregar"><br><br>
            <a href="libros.php" class="btn-regresar">REGRESAR</a><br><br>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>