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
    if (isset($_POST['enviar'])) {
        $artista = $_POST['artista'];
        $album = $_POST['album'];
        include("conexion.php");
        $sql = "insert into cds(artista, album) values('".$artista."','".$album."')";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo " <script languaje='JavaScript'> alert('Los datos fueron ingresados correctamente a la BD'); location.assign('cds.php');</script>";
        } else {
            echo " <script languaje='JavaScript'> alert('ERROR Los datos no fueron ingresados a la BD'); location.assign('cds.php');</script>";
        }
        mysqli_close($conexion);
    } else {
?>
        <h1 style="text-align: center;">Agregar nuevo CD</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Artista</label>
            <input type="text" name="artista"><br><br>
            <label>Album</label>
            <input type="text" name="album"><br><br>
            <input type="submit" name="enviar" value="AGREGAR" class="btn-agregar"><br><br>
            <a href="cds.php" class="btn-regresar">REGRESAR</a><br><br>
        </form>
    </div>
</body>
</html>
<?php
    }
?>