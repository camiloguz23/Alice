<?php

require_once("conexion.php");

$ficha = $_POST['ficha'];
$forma = $_POST['forma'];
$ambi = $_POST["amb"];


$formacion ="SELECT * FROM detalform where no_ficha = '$ficha'";
$consul = mysqli_query($bdmysqli,$formacion);
$ila= mysqli_fetch_assoc($consul);


if ($ila['no_ficha'] == $ficha){

    echo '<script>alert ("EL GRUPO FORMATIVO YA EXISTE ");</script>';
    echo '<script>window.location="../usuarios/admin/formularios/crear/CrearFicha.php"</script>';  
  
}else{
    $sqlrr= "INSERT INTO detalform (no_ficha, id_amb, id_tip_form) values ( '$ficha', '$ambi','$forma')";
    $inseta= mysqli_query($bdmysqli,$sqlrr);

    if($inseta){

        $estado= "UPDATE ambiente SET id_estado = 2 WHERE id_amb = '$ambi'";
        $actualiza= mysqli_query($bdmysqli,$estado);
    
        if ($actualiza) {
            echo '<script>alert ("se ingresaron los datos con exito");</script>';
            echo '<script>window.location="../usuarios/admin/formularios/crear/CrearFicha.php"</script>';            
        }
        else{
            echo '<script>alert ("yuca datos");</script>';
            echo '<script>window.location="../usuarios/admin/formularios/crear/CrearFicha.php"</script>';        
    
        }

    }
    else {
        echo '<script>alert ("No se ingresaron datos");</script>';
        echo '<script>window.location="../usuarios/admin/formularios/crear/CrearFicha.php"</script>';        

    }
}
?>
         
                
