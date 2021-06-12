<?php
require_once("conexion.php");

    $id = $_POST['documento']; 
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];
    $email = $_POST['correo'];
    $clave = $_POST['clave'];

    $foto = $_FILES['foto'] ['name'];
    
   echo $foto;

    if ($foto == "" || $foto == null) {
        echo "hola1";
        $actualizar = "UPDATE usuario SET celular=$celular,direccion='$direccion', email='$email',contra_seguridad = '$clave' WHERE docu= $id";

        $resultado = mysqli_query($bdmysqli, $actualizar);
        echo "sds";

        if ($resultado) {
            echo "hola2";
            header("location: ../usuarios/instructores/perfilIns.php");
        } else{
            echo "hola3";
            echo 'no se pudo actualizar';
        }
    }else {

        echo "hola4";

        $ruta = $_FILES['foto'] ['tmp_name'];
        $destino = "../usuarios/foto/".$foto;
        copy($ruta,$destino);
        $actualizar = "UPDATE usuario SET foto='$foto',celular='$celular',direccion='$direccion', email='$email',contra_seguridad = '$clave' WHERE docu='$id'";

        $resultado = mysqli_query($conexion, $actualizar);

        if ($resultado) {
            header("location: ../usuarios/instructores/perfilIns.php");
        } else{
            echo 'no se pudo actualizar';
        }
    }

    
?>