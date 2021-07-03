<?php
require_once ("conexion.php");

$trans = $_POST["transversal"];

$eliminartrans = "DELETE FROM asignacion_t WHERE ficha_trans = $trans";
$consultatrans = mysqli_query($bdmysqli,$eliminartrans);

if ($consultatrans){
    header("location:../usuarios/admin/formularios/modificar/editrans.php");
}

?>

