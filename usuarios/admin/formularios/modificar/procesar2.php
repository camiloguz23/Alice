<?php
include ("conexion.php");
 
    $id = $_POST['id_asig'];
    $docu = $_POST['documento'];
    $ficha = $_POST['ficha'];
    $materia = $_POST['materia'];
    $dia = $_POST['dia'];
    $horaini = $_POST['hora-inicio'];
    $horafin = $_POST['hora-fin'];
    $fechaini = $_POST['fecha-ini'];
    $fechafin = $_POST['fecha-fin'];

    $actualizar = "UPDATE asignacion_t SET docu='$docu', no_ficha='$ficha', id_materia='$materia', 
    Id_dia='$dia', horario_inicio='$horaini', horario_fin='$horafin', fecha_inico='$fechaini', fecha_final='$fechafin' WHERE id_asig='$id'";

    $resultado = mysqli_query($conexion, $actualizar);

    if ($resultado) {
        header("location: editrans.php");
    } else{
        echo 'no se pudo actualizar';
    }

?>