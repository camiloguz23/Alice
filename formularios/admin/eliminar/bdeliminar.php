<?php
require_once ("../../../php/conexion.php");
$dato = $_POST["docueli"];

$eliminar = "DELETE FROM usuario WHERE docu = $dato";
$consulta = mysqli_query($bdmysqli,$eliminar);

if ($consulta){
    header("location: EliminarUsu.php");
}
?>