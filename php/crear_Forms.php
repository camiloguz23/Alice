<?php
require_once('conexion.php');

$formacion = $_POST['formacion'];
$form = strtoupper($formacion);

$sql = "select * from formacion where nom_form = '$form'";
$consulta = mysqli_query($bdmysqli,$sql);
$dato = mysqli_fetch_assoc($consulta);



if ($dato != null || $dato != ""){
    if ($dato['nom_form'] == $form){
        echo "Formacion ya creada";
    }

}else{

    $insertar = "insert into formacion (nom_form) values ('$form')";
    $validar = mysqli_query($bdmysqli,$insertar);

    if ($validar){
        echo "Formacion Creada";
    }

}




?>