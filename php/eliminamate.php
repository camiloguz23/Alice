
<?php
require_once ("conexion.php");

$mate = $_POST["eli_mater"];

$eliminMate = "DELETE FROM materias WHERE id_materia = $mate";
$mate = mysqli_query($bdmysqli,$eliminMate);

if ($mate){
    header("location: ../usuarios/admin/formularios/eliminar/eliminaMateria.php");
}
else{
    echo '<script>alert ("No Elimino");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/eliminar/eliminaMateria.php"</script>';
}

?>
