<?php
    $id=$_GET['id'];

    include("conexion.php");

    $sql="delete from cds where id='".$id."'";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        echo" <script languaje='JavaScript'> alert('Los datos fueron eliminador correctamente a la BD'); location.assign('cds.php');</script>";
        }else{
            echo" <script languaje='JavaScript'> alert('ERROR Los datos no se eliminaron'); location.assign('cds.php');</script>";
    }
?>