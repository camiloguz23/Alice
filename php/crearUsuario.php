
<?php
require_once("conexion.php");

$documento = $_POST["documento"];



$nombre = $_POST["nombre"];

$apelido = $_POST["apellido"];

$edad = $_POST["edad"];

$celular = $_POST["celular"];

$fijo = $_POST["fijo"];

$direccion = $_POST["direccion"];

$tipoUsuario = $_POST["tipousu"];

$tipoDocu = $_POST["tipodocu"];

$correo = $_POST["correo"];

$clave = $_POST["clave"];

$fotousu = $_FILES['foto'] ['name'];
$ruta = $_FILES['foto'] ['tmp_name'];
$destino = "../usuarios/foto/".$fotousu;
copy($ruta,$destino);



$titulo = $_POST["tituloacade"];
$especializacion  = $_POST["especializacion"];





$crear = "INSERT INTO usuario (docu,id_tip_usu,id_tip_docu,nombres,apellidos,edad,celular,fijo,direccion,email,contra_seguridad,codigo_barras,foto) values (''$titulada',$documento','$tipoUsuario','$tipoDocu','$nombre','$apelido','$edad','$celular','$fijo','$direccion','$correo','$clave','','$fotousu')";
$insertar= mysqli_query($bdmysqli,$crear);

if ($insertar){
    echo "aqui estoy";
    $titulos = "insert into detalle_p_e (docu,id_titu,id_esp) values ('$documento','$titulo','$especializacion')";
    $consulta = mysqli_query($bdmysqli,$titulos);

    if ($consulta){

        echo '<script>alert ("se ingresaron los datos con exito");</script>';
        echo '<script>window.location="../usuarios/admin/formularios/crear/crearUsu.php"</script>';        

    }
}else {
    echo "error".$ruta;
}






?>

