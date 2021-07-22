<?php

require_once("conexion.php");

$ficha = $_POST['ficha'];
$instru = $_POST['instru'];
$forma = $_POST['forma'];
$ambi = $_POST["amb"];
$hora = $_POST["hora"];
$dia = $_POST["dia"];
$fecha = $_POST["fecha"];
$fechaF = $_POST["fechaF"];


$order = "SELECT * FROM detalform WHERE fecha_final >= '$fechaF' And Id_horario = '$hora' And id_amb = '$ambi'";
$consula = mysqli_query($bdmysqli,$order);
$fila= mysqli_fetch_assoc($consula);

if($fila['fecha_final'] >= $fechaF AND $fila['Id_horario'] = $hora AND $fila['id_amb'] = $ambi){

    echo '<script>alert ("EL HORARIO YA ESTA ASIGNADO ");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/crear/CrearFicha.php"</script>';

}else{

    $formacion ="SELECT * FROM detalform where no_ficha = '$ficha'";
    $consul = mysqli_query($bdmysqli,$formacion);
    $ila= mysqli_fetch_assoc($consul);

    if ($ila['no_ficha'] == $ficha){

        echo '<script>alert ("EL GRUPO FORMATIVO YA EXISTE ");</script>';
        echo '<script>window.location="../usuarios/admin/formularios/crear/CrearFicha.php"</script>';  
    
    }else{
        $sqlrr= "INSERT INTO detalform (no_ficha, docu, id_amb, id_tip_form, Id_horario, Id_dia,fecha_inico,fecha_final) values ( '$ficha','$instru', '$ambi','$forma','$hora','$dia','$fecha','$fechaF')";
        $inseta= mysqli_query($bdmysqli,$sqlrr);

        if($inseta){

            

            $estado= "UPDATE ambiente SET id_estado = 1 WHERE id_amb = '$ambi'";
            $actualiza= mysqli_query($bdmysqli,$estado);
        
            if ($actualiza) {
                #header("location : ../usuarios/admin/formularios/crear/CrearFicha.php");
                echo "<script>alert('Formacion asignada al instructor')</script>";
                echo "<script>window.location='../usuarios/admin/formularios/crear/CrearFicha.php'</script>";


                        
            }
            

        }
        else {
            echo '<script>alert ("No se ingresaron datos");</script>';
            echo '<script>window.location="../usuarios/admin/formularios/crear/CrearFicha.php"</script>';        

        }
    }
}
?>
         
                
