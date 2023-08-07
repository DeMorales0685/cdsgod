<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Consulta de Libros</h1>
        <a href="agregarlibro.php" class="btn-nuevo">NUEVO</a>
        <a href="htmlseleccion.html" class="btn-regresar">REGRESAR</a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Titulo</th>
                    <th>Editorial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM libros";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['titulo'] ?></td>
                    <td><?php echo $filas['editorial'] ?></td>
                    <td>
                        <a href='editarlibro.php?id=<?php echo $filas['id']; ?>' >EDITAR</a>
                        <a href='eliminarlibro.php?id=<?php echo $filas['id']; ?>' >ELIMINAR</a>
                    </td>
                </tr>
                <?php
                    }
                    mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>