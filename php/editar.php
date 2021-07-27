<?php
require_once("conexion.php");

    $id = $_POST['documento']; 
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];
    $email = $_POST['correo'];
    $clave = $_POST['clave'];

    $foto = $_FILES['foto'] ['name']; # nombre de la foto: imag.jpg
    
  

    if ($foto == "" || $foto == null) {
        
        $actualizar = "UPDATE usuario SET celular=$celular,direccion='$direccion', email='$email',contra_seguridad = '$clave' WHERE docu= $id";

        $resultado = mysqli_query($bdmysqli, $actualizar);
        
        if ($resultado) {
            echo "hola2";
            header("location: ../usuarios/instructores/perfilIns.php");
        } else{
         
            echo 'no se pudo actualizar';
        }
    }else {

        

        $ruta = $_FILES['foto'] ['tmp_name']; 
        $destino = "../usuarios/foto/".$foto;
        copy($ruta,$destino);
        $actualizar = "UPDATE usuario SET foto='$foto',celular='$celular',direccion='$direccion', email='$email',contra_seguridad = '$clave' WHERE docu='$id'";

        $resultado = mysqli_query($bdmysqli, $actualizar);

        if ($resultado) {
            header("location: ../usuarios/instructores/perfilIns.php");
        } else{
            echo 'no se pudo actualizar';
        }
    }

    
?>
