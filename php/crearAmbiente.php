<?php

require_once("conexion.php");

$ambiente = $_POST['ambiente'];
$naves = $_POST["nave"];


$sql ="SELECT * FROM ambiente where nom_amb = '$ambiente'";
$con = mysqli_query($bdmysqli,$sql);
$fila= mysqli_fetch_assoc($con);

//$_SESSION["ambien"] = $fila["nom_amb"]; # por q? sobra no es necesario

if ($fila['nom_amb'] == $ambiente){
    echo "ajajjaaj";

    echo '<script>alert ("EL AMBIENTE YA EXISTE ");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/admin/crear/crearAmbien.php"</script>';        

} 
else{
    echo "2 else";
    $sqlrr= "INSERT INTO ambiente (id_amb, nom_amb, id_naves) values ( '95985', '$ambiente','$naves')";
    $inseta= mysqli_query($bdmysqli,$sqlrr);

    if($inseta){
        echo "2 if";

        echo '<script>alert ("se ingresaron los datos con exito");</script>';
        echo '<script>window.location="../usuarios/admin/formularios/admin/crear/crearAmbien.php"</script>';        


    }
}

?>
         
                

