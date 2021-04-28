<?php
    require_once ("conexion.php");

    $Docu = $_POST['usuario'];
    $clave = $_POST['clave'];

    $consul= "SELECT * FROM usuario where docu = '$Docu' AND contra_seguridad = '$clave'";
    $resultado = mysqli_query($bdmysql, $consul);
    $fila= mysqli_fetch_assoc($resultado);

if($fila){

    $_SESSION["id_user"] = $fila["docu"];
    $_SESSION["tipo"] = $fila["id_tip_usu"];

    if($_SESSION['tipo'] == 1){
        header("location: ../usuarios/admin/admin.html");
        exit();
    }

    elseif($_SESSION['tipo'] == 2){
        header("location: ../usuarios/coordinador/coordinador.html");
        exit();
    }

    elseif($_SESSION['tipo'] == 3){
        header("location: ../usuarios/instructores/instru.html");
        exit();
    }

}
else{
//    header("Location: /Alice/index.html");
    echo "jajjaja";
    exit();
}
?>