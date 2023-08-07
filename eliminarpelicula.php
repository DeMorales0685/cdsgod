<?php
    // Obtenemos el valor del parámetro 'id' de la pagina usando $_GET
    $id=$_GET['id'];

    //Archivo de conexion
    include("conexion.php");

    //Consulta sql por valor de id
    $sql="delete from peliculas where id='".$id."'";

    //Consulta sql utilizando mysqli query en donde la instruccion fue delete from por id seleccionado
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        echo" <script languaje='JavaScript'> alert('Los datos fueron eliminador correctamente a la BD'); location.assign('peliculas.php');</script>";
        }else{
            echo" <script languaje='JavaScript'> alert('ERROR Los datos no se eliminaron'); location.assign('peliculas.php');</script>";
    }
?>