
<?php
    require_once("conexion.php");

       

        $Docu = $_POST['usuario'];
        $clave = $_POST['clave'];
        //consultamos el usuario segun el usuario y la clave

        $consul= "SELECT * FROM usuario where docu = '$Docu' AND contra_seguridad = '$clave'";
        $resultado = mysqli_query($bdmysqli, $consul);
        $fila= mysqli_fetch_assoc($resultado);
    

        if($fila)
        {
            // si el usuario es correcto creamos las variables

            $_SESSION["id_user"] = $fila["docu"];
            $_SESSION["tipousu"] = $fila["id_tip_usu"];
            $_SESSION['nombres'] = $fila['nombres'];

    
            

            // dependiendo del tipo de USuario redireccionamos
            //si es un aprendiz
            if($_SESSION['tipousu'] == 1){
                header("location: ../usuarios/admin/admin.php");
                exit();
            }
    
            elseif($_SESSION['tipousu'] == 2){
                header("location: ../usuarios/coordinador/coordinador.html");
                exit();
            }
    
            elseif($_SESSION['tipousu'] == 3){
                header("location: ../usuarios/instructores/instru.html");
                exit();
            }
    
    
        }else{
            // si son incorrectos lo va a mandar a un error 
            header("location: ../index.html");
            exit();
        }  

?>


