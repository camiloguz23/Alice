
<?php
    require_once("conexion.php");

    session_start();
       

        $Docu = $_POST['usuario'];
        $clave = $_POST['clave'];
        //consultamos el usuario segun el usuario y la clave

        $consul= "SELECT * FROM usuario where docu = '$Docu' AND contra_seguridad = '$clave'";
        $resultado = mysqli_query($bdmysqli, $consul);
        $fila= mysqli_fetch_assoc($resultado);
        



        if($resultado)
        {
            $_SESSION["id_user"] = $fila["docu"];
            $_SESSION["nombre"] = $fila['nombres'];
            $_SESSION["apellido"] = $fila["apellidos"];
            $_SESSION['foto'] = $fila['foto'];
            $_SESSION['edad'] = $fila['edad'];
            $_SESSION['correo'] = $fila['email'];
            $_SESSION['celular'] = $fila['celular'];
            $_SESSION['direccion'] = $fila['direccion'];
            $_SESSION['contra'] = $fila['contra_seguridad'];
            
            if($fila["id_tip_usu"] == 1){
               
                header("location: ../usuarios/admin/admin.php");
                exit();
            } elseif($fila["id_tip_usu"] == 2){
               
                header("location: ../usuarios/coordinador/coordinador.html");
                exit();
            } elseif($fila["id_tip_usu"] == 3){  

                header("location: ../usuarios/instructores/instructor.php");
                exit();

            }else{
                echo'<script type="text/javascript">
                alert("Documento y/o contraseña incorrecta, por favor revise los datos ingresados");
                window.location.href="../index.html";
                </script>';
            }


        }else{
           
        }

?>


