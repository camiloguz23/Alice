<?php
require_once("conexion.php");

$documento = $_POST['docu'];
$ficha = $_POST['ficha'];
$materia = $_POST['materia'];
$dias = $_POST['dias'];
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

    $insertar = "INSERT INTO asignacion_t (docu,no_ficha,id_materia,id_dia,horario_inicio,horario_fin,fecha_inico,fecha_final) values ('$documento','$ficha','$materia','$dias','$hora_inicio','$hora_fin','$fecha_inicio','$fecha_fin')";
    $sql = mysqli_query($bdmysqli,$insertar);

    if($sql){
        echo 1;
    }else {
        echo 2;
    }
}
?>
