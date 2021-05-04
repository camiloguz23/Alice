<?php

require_once("conexion.php");

$ambiente = $_POST["ambiente"];
$naves = $_POST["nave"];

$sql ="SELECT * FROM ambiente";
$con = mysqli_query($bdmysqli,$sql);
$fila= mysqli_fetch_assoc($con);

$_SESSION["ambien"] = $fila["nom_amb"];

if ($ambiente == $_SESSION["ambien"]){

    echo '<script>alert ("EL AMBIENTE YA EXISTE ");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/admin/crear/crearAmbien.php"</script>';        

} 
else{
    $sqlrr= "INSERT INTO ambiente (id_amb, nom_amb, id_naves) values ( NULL , '$ambiente','$naves')";
    $inseta= mysqli_query($bdmysqli,$sqlrr);

    if($inseta){

        echo '<script>alert ("se ingresaron los datos con exito");</script>';
        echo '<script>window.location="../usuarios/admin/formularios/admin/crear/crearAmbien.php"</script>';        


    }
}

?>
         
                

