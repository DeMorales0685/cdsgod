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
            if (isset($_POST['enviar'])) {
                $id = $_POST['id'];
                $artista = $_POST['artista'];
                $album = $_POST['album'];    
                
                $sql = "update cds set artista='".$artista."', album='".$album."' where id='".$id."'";

                $resultado = mysqli_query($conexion, $sql);

                if ($resultado) {
                    echo " <script languaje='JavaScript'> alert('Los datos fueron actualizados correctamente a la BD'); location.assign('cds.php');</script>";
                } else {
                    echo " <script languaje='JavaScript'> alert('ERROR Los datos no se actualizaron'); location.assign('cds.php');</script>";
                }
            } else {
                $id = $_GET['id'];
                $sql = "select * from cds where id='".$id."'";
                $resultado = mysqli_query($conexion, $sql);

                $fila = mysqli_fetch_assoc($resultado);
                $artista = $fila["artista"];
                $album = $fila["album"];

                mysqli_close($conexion);
        ?>
        <h1 style="text-align: center;">EDITAR CD</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id']; ?>" method="post">
            <label>Artista</label>
            <input type="text" name="artista" value="<?php echo $artista; ?>"><br><br>
            <label>Album</label>
            <input type="text" name="album" value="<?php echo $album; ?>"><br><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" name="enviar" value="ACTUALIZAR"><br><br>
            <a href="cds.php" class="btn-regresar">REGRESAR</a><br><br>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>