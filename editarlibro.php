<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR LIBRO</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <div class="container">
        <?php
            if (isset($_POST['enviar'])) {
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $editorial = $_POST['editorial'];
                include("conexion.php");
                $sql = "update libros set titulo='".$titulo."', editorial='".$editorial."' where id='".$id."'";
                $resultado = mysqli_query($conexion, $sql);

                if ($resultado) {
                    echo " <script languaje='JavaScript'> alert('Los datos fueron actualizados correctamente a la BD'); location.assign('libros.php');</script>";
                } else {
                    echo " <script languaje='JavaScript'> alert('ERROR Los datos no se actualizaron'); location.assign('libros.php');</script>";
                }

            } else {
                $id = $_GET['id'];
                $sql = "select * from libros where id='".$id."'";
                $resultado = mysqli_query($conexion, $sql);

                $fila = mysqli_fetch_assoc($resultado);
                $titulo = $fila["titulo"];
                $editorial = $fila["editorial"];

                mysqli_close($conexion);
        ?>

        <h1 style="text-align: center;">EDITAR LIBROS</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Titulo</label>
            <input type="text" name="titulo" value="<?php echo $titulo; ?>"><br><br>
            <label>Editorial</label>
            <input type="text" name="editorial" value="<?php echo $editorial; ?>"><br><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" name="enviar" value="ACTUALIZAR" class="btn-agregar"><br><br>
            <a href="libros.php" class="btn-regresar">REGRESAR</a><br><br>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>