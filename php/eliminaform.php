
<?php
require_once ("conexion.php");

$da = $_POST["form_eli"];

$eliminForm = "DELETE FROM formacion WHERE id_form = $da";
$forma = mysqli_query($bdmysqli,$eliminForm);

if ($forma){
    header("location: ../usuarios/admin/formularios/eliminar/EliminForma.php");
}
else{
    echo '<script>alert ("No Elimino");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/eliminar/EliminForma.php"</script>';
}

?>
