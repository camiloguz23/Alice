<?php
require_once ("conexion.php");
$dato = $_POST["docueli"];

$eliminar = "DELETE FROM usuario WHERE docu = $dato";
$consulta = mysqli_query($bdmysqli,$eliminar);

if ($consulta){
    $titulos = "DELETE from detalle_p_e where docu = $dato";
    $consulta2 = mysqli_query($bdmysqli,$titulos);

    if ($consulta2){
        header("location: ../usuarios/admin/formularios/modificar/edicion.php");
    }
}


?>
