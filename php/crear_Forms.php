<?php
require_once('conexion.php');

$numficha = $_POST['ficha'];
$idambi = $_POST['id_amb'];
$tipoform = $_POST['id_tip_form'];


$consul = "SELECT * FROM detalform WHERE no_ficha = '$numficha'";
$sqli = mysqli_query($bdmysqli,$consul);
$fila = mysqli_fetch_assoc($sqli);

if($fila['no_ficha'] === $numficha){
echo"<script>alert('el numero de ficha ya existe')</script>";
echo "<script>window.location='../usuarios/admin/formularios/admin/crear/crearAmbien.php'</script>";
}
else
{

    $consul2 = "INSERT INTO detalform (no_ficha,id_amb,id_tip_form)VALUES($numficha,$idambi,$tipoform)";
    $sqli2 = mysqli_query($bdmysqli,$consul2);
   
}
    if($sqli2)
    {
        echo "<script>alert('los datos fueron guardados exitosamente')</script>";
        echo "<script>window.location='../usuarios/admin/formularios/admin/crear/crearAmbien.php'</script>";


    }

?>