<?php
include ('conexion.php');
$titulada = $_GET["idd"];

$eliminartitula = "DELETE FROM detalform WHERE no_ficha = '$titulada'";
$consultatitu = mysqli_query($conexion,$eliminartitula);

if ($consultatitu){
    header("location:../usuarios/admin/formularios/modificar/edittitu.php");
}else{
    echo '<script>alert ("no funciona");</script>';

}
?>

