
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
            $_SESSION["tipousu"] = $fila["id_tip_usu"];
            $_SESSION["nombre"] = $fila['nombres'];
            $_SESSION["apellido"] = $fila["apellidos"];
            $_SESSION['foto'] = $fila['foto'];
            
            if($fila["id_tip_usu"] == 1){
               
                header("location: ../usuarios/admin/admin.php");
                exit();
            } elseif($fila["id_tip_usu"] == 2){
               
                header("location: ../usuarios/coordinador/coordinador.html");
                exit();
            } elseif($fila["id_tip_usu"] == 3){  

                header("location: ../usuarios/instructores/instru.html");
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


