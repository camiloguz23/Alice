
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
            // si el usuario es correcto creamos las variables

            // dependiendo del tipo de USuario redireccionamos
            //si es un aprendiz
            if($fila["id_tip_usu"] == 1){
                $_SESSION["id_user"] = $fila["docu"];
                $_SESSION["tipousu"] = $fila["id_tip_usu"];
                $_SESSION["nombre"] = $fila['nombres'];
                $_SESSION["apellido"] = $fila["apellidos"];
                $_SESSION['foto'] = $fila['foto'];
                header("location: ../usuarios/admin/admin.php");
                exit();
            } elseif($fila["id_tip_usu"] == 2){
                $_SESSION["id_coordinador"] = $fila["docu"];
                $_SESSION["tipousu"] = $fila["id_tip_usu"];
                $_SESSION['nombres'] = $fila['nombres'];
                $_SESSION["apellido"] = $fila["apellidos"];
                header("location: ../usuarios/coordinador/coordinador.html");
                exit();
            } elseif($fila["id_tip_usu"] == 3){
                $_SESSION["id_instructor"] = $fila["docu"];
                $_SESSION["tipousu"] = $fila["id_tip_usu"];
                $_SESSION['nombres'] = $fila['nombres'];
                $_SESSION["apellido"] = $fila["apellidos"];
                header("location: ../usuarios/instructores/instru.html");
                exit();
            }


        }else{
            echo '<script>alert ("INGRESO DATOS INCORRECTOS");</script>';
            echo '<script>window.location="../index.html"</script>';  
        }

?>


