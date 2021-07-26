<?php

require_once("conexion.php");

$fichatrans= $_POST['trans'];
$documento = $_POST['docu'];
$ficha = $_POST['ficha'];
$materia = $_POST['materia'];
$dias = $_POST['dias'];
$ambiente= $_POST['ambi'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];


//$order = "SELECT * FROM asignacion_t WHERE fecha_final >= '$fecha_inicio' and horario_fin >= '$hora_inicio' And id_amb = '$ambiente'";
$order = "SELECT * FROM asignacion_t WHERE fecha_final >= '$fecha_inicio' and horario_fin >= '$hora_inicio' AND id_amb = '$ambiente'";
$consula = mysqli_query($bdmysqli,$order);
$fila= mysqli_fetch_assoc($consula);


if($fila['fecha_final'] >= $fecha_inicio AND $fila['horario_fin'] >= $hora_inicio AND $fila['id_amb'] = $ambiente){

    echo '<script>alert ("EL HORARIO YA ESTA ASIGNADO ");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/crear/trasversal.php"</script>';

}else{

    $formacion ="SELECT * FROM asignacion_t where ficha_trans = '$fichatrans'";
    $consul = mysqli_query($bdmysqli,$formacion);
    $ila= mysqli_fetch_assoc($consul);

    if ($ila['ficha_trans'] == $fichatrans){

        echo '<script>alert ("LA TRANSVERSAL YA EXISTE ");</script>';
        echo '<script>window.location="../usuarios/admin/formularios/crear/trasversal.php"</script>';  
    
    }else{
        $sqlrr= "INSERT INTO asignacion_t (ficha_trans, docu, no_ficha, id_materia, Id_dia, id_amb, horario_inicio, horario_fin, fecha_inico, fecha_final) values ('$fichatrans' ,'$documento', '$ficha', '$materia', '$dias', '$ambiente', '$hora_inicio', '$hora_fin','$fecha_inicio', '$fecha_fin')";
        $inseta= mysqli_query($bdmysqli,$sqlrr);

        if($inseta){

        
            #header("location : ../usuarios/admin/formularios/crear/CrearFicha.php");
            echo "<script>alert('LA TRANSVERSAL FUE ASIGNADA EXITOSAMENTE')</script>";
            echo "<script>window.location='../usuarios/admin/formularios/crear/trasversal.php'</script>";

        }
        else {
            echo '<script>alert ("No se ingresaron datos");</script>';
            echo '<script>window.location="../usuarios/admin/formularios/crear/trasversal.php"</script>';        

        }
    }
}
?>