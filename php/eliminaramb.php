
<?php
require_once ("conexion.php");

$dato = $_POST["datoeli"];

$eliminarAmb = "DELETE FROM ambiente WHERE id_amb = $dato";
$consultaAmb = mysqli_query($bdmysqli,$eliminarAmb);

if ($consultaAmb){
    header("location:../usuarios/admin/formularios/eliminar/eliminarAmbi.php");
}

?>

