<?php

require_once("conexion.php");

$ambiente = $_POST['ambiente'];
$formaci = $_POST['tipo_amb'];
$naves = $_POST["nave"];


$sql ="SELECT * FROM ambiente where id_amb = '$ambiente'";
$con = mysqli_query($bdmysqli,$sql);
$fila= mysqli_fetch_assoc($con);


if ($fila['id_amb'] == $ambiente){

    echo '<script>alert ("EL AMBIENTE YA EXISTE ");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/admin/crear/crearAmbien.php"</script>';        

} 
else{
    $sqlrr= "INSERT INTO ambiente (id_amb, id_form, id_naves) values ( '$ambiente', '$formaci','$naves')";
    $inseta= mysqli_query($bdmysqli,$sqlrr);

    if($inseta){

        echo '<script>alert ("se ingresaron los datos con exito");</script>';
        echo '<script>window.location="../usuarios/admin/formularios/admin/crear/crearAmbien.php"</script>';        


    }
}

?>
         
                

