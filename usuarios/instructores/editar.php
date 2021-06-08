<?php
include ("../admin/formularios/modificar/conexion.php");

    $id = $_POST['documento']; 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];

    $actualizar = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', edad='$edad', celular='$celular', 
    direccion='$direccion' WHERE docu='$id'";

    $resultado = mysqli_query($conexion, $actualizar);

    if ($resultado) {
        header("location: editinstru.php");
    } else{
        echo 'no se pudo actualizar';
    }

?>