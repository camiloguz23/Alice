
<?php
require_once ("conexion.php");

$da = $_POST["ficha"];

$eliminForm = "DELETE FROM detalform WHERE no_ficha = $da";
$forma = mysqli_query($bdmysqli,$eliminForm);

if ($forma){
    echo '<script>window.location="../usuarios/admin/formularios/eliminar/EliminForma.php"</script>'; 
}
else{
    echo '<script>alert ("yuca no insertan");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/eliminar/EliminForma.php"</script>'; 
}

?>
