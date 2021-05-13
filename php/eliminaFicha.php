<?php
require_once ("conexion.php");

$ficha = $_POST["ficha"];

$eliminFo = "DELETE FROM detalform WHERE no_ficha = $ficha";
$form = mysqli_query($bdmysqli,$eliminF);

if ($form){
    header("location: ../usuarios/admin/formularios/eliminar/eliminaFicha.php");
}
else{
    echo '<script>alert ("No Elimino");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/eliminar/eliminaFicha.php"</script>';
}

?>