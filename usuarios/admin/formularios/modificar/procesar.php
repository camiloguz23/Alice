<?php
include ("conexion.php");

    $id = $_POST['documento']; 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];

    $actualizar = "UPDATE usuario SET edad='$edad', celular='$celular', fijo='$fijo', 
    direccion='$direccion', email='$email' WHERE docu='$id'";

    $resultado = mysqli_query($conexion, $actualizar);

    if ($resultado) {
        header("location: edicion.php");
    } else{
        echo 'no se pudo actualizar';
    }

?>