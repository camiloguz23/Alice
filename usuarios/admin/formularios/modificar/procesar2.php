<?php
include ("conexion.php");
 
    $id = $_POST['transficha'];
    $docu = $_POST['documento'];
    $ficha = $_POST['titulada'];
    $transficha = $_POST['transverficha'];
    $materia = $_POST['materia'];
    $dia = $_POST['dia'];
    $horaini = $_POST['hora-inicio'];
    $horafin = $_POST['hora-fin'];
    $fechaini = $_POST['fecha-ini'];
    $fechafin = $_POST['fecha-fin'];

    $actualizar = "UPDATE asignacion_t SET ficha_trans='$transficha', docu='$docu', no_ficha='$ficha', id_materia='$materia', 
    Id_dia='$dia', horario_inicio='$horaini', horario_fin='$horafin', fecha_inico='$fechaini', fecha_final='$fechafin' WHERE ficha_trans='$id'";

    $resultado = mysqli_query($conexion, $actualizar);

    if ($resultado) {
        header("location: editrans.php");
    } else{
        echo 'no se pudo actualizar';
    }

?>