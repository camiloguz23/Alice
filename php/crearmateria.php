<?php
require_once('conexion.php');

$materia = $_POST['materia'];
$mater = strtoupper($materia);

$sql = "select * from materias where nom_materia= '$mater'";
$consult = mysqli_query($bdmysqli,$sql);
$dat = mysqli_fetch_assoc($consult);



if ($dat != null || $dat != ""){
    if ($dat['nom_materia'] == $mater){
        echo "Esta materia ya existe";
 
    }

}else{

    $inserta = "insert into materias (nom_materia) values ('$mater')";
    $valida = mysqli_query($bdmysqli,$inserta);

    if ($valida){
        echo "Materia Creada";
    }

}
