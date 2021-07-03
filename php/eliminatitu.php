<?php
require_once ("conexion.php");

$titulada = $_POST["titulada"];

$eliminartitula = "DELETE FROM detalform WHERE no_ficha = $titulada";
$consultatitu = mysqli_query($bdmysqli,$eliminartitula);

if ($consultatitu){
    header("location:../usuarios/admin/formularios/modificar/edittitu.php");
}

?>

