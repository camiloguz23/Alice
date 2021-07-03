<?php
include ("conexion.php");
 
    $id = $_POST['no_ficha'];
    $docu = $_POST['documento'];
    $ambiente = $_POST['ambiente'];
    $formacion = $_POST['formacion'];
    $horario = $_POST['horario'];
    $dia = $_POST['dia'];
    $fechaini = $_POST['fecha-ini'];
    $fechafin = $_POST['fecha-final'];

    $actualizar = "UPDATE detalform SET docu='$docu', id_amb='$ambiente', id_tip_form='$formacion', 
    Id_horario='$horario', Id_dia='$dia', fecha_inico='$fechaini', fecha_final='$fechafin' WHERE no_ficha='$id'";

    $resultado = mysqli_query($conexion, $actualizar);

    if ($resultado) {
        header("location: edittitu.php");
    } else{
        echo 'no se pudo actualizar';
    }

?>