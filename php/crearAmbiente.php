<?php

require_once("conexion.php");

$ambiente = $_POST["ambiente"];
$naves = $_POST["nave"];

    $sqlrr= "INSERT INTO ambiente (id_amb, nom_amb, id_naves) values ( NULL , '$ambiente','$naves')";
    $inseta= mysqli_query($bdmysqli,$sqlrr);

    if($inseta){

        echo '<script>alert ("se ingresaron los datos con exito");</script>';
        echo '<script>window.location="../formularios/admin/crear/crearAmbien.php"</script>';        


    }else{

        echo '<script>alert ("Campos vacios no ingreso  todos los datos");</script>';
        echo '<script>window.location="../formularios/admin/crear/crearAmbien.php"</script>';        


    }

?>
         
                

