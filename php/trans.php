<?php
require_once("conexion.php");


$fichatrans= $_POST['trans'];
$documento = $_POST['docu'];
$materia = $_POST['materia'];
$dias = $_POST['dias'];
$ambiente= $_POST['ambi'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$validar = "SELECT * from asignacion_t where no_ficha = $ficha and id_materia = $materia";
$consultavalid = mysqli_query($bdmysqli,$validar);
$info = mysqli_fetch_assoc($consultavalid);

if ($ficha == $info['no_ficha'] & $materia == $info['id_materia']) {
    
    echo "La asignacion ya existe en la formacion";
}else{

    $insertar = "INSERT INTO asignacion_t (ficha_trans,docu,no_ficha,id_materia,id_amb,id_dia,horario_inicio,horario_fin,fecha_inico,fecha_final) values ('$fichatrans',$documento','$ficha','$materia','$ambiente','$dias','$hora_inicio','$hora_fin','$fecha_inicio','$fecha_fin')";
    $sql = mysqli_query($bdmysqli,$insertar);

    if ($sql) {
        echo "Se asigno existosamente";
    }else {
        echo "No fue existoso";
    }

    
}
?>
