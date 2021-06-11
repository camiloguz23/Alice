<?php
include ("../admin/formularios/modificar/conexion.php");

    $id = $_POST['documento']; 
    $edad = $_POST['edad'];
    $celular = $_POST['celular'];
    $fijo = $_POST['fijo'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];

    $actualizar = "UPDATE usuario SET edad='$edad', celular='$celular', fijo='$fijo', 
    direccion='$direccion', email='$email' WHERE docu='$id'";

    $resultado = mysqli_query($conexion, $actualizar);

    if ($resultado) {
        header("location: perfilIns.php");
    } else{
        echo 'no se pudo actualizar';
    }

?>