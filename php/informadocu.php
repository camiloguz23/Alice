<?php
require_once("conexion.php");
$_POST=json_decode(file_get_contents("php://input"),true);

$documento = $_POST["docu"];
$accion = $_POST["accion"];

$sql ="SELECT usuario.docu,nombres,apellidos,tipousu.nom_tip_usu,asignacion_t.ficha_trans,materias.nom_materia,detalform.no_ficha,formacion.nom_form from usuario LEFT JOIN tipousu on usuario.id_tip_usu=tipousu.id_tip_usu LEFT JOIN asignacion_t on asignacion_t.docu=usuario.docu LEFT JOIN detalform on detalform.docu=usuario.docu LEFT JOIN materias on asignacion_t.id_materia=materias.id_materia LEFT JOIN ambiente on detalform.id_amb = ambiente.id_amb LEFT JOIN formacion on ambiente.id_form=formacion.id_form where usuario.docu like '$documento%' and usuario.id_tip_usu in (3,4)";

$consulta = mysqli_query($bdmysqli,$sql);

foreach($consulta as $usuario){

    echo('
        <div class="divisor">
            <div>
                <h3>Datos del instructor</h3>
                <p class="par"><b>Documento</b> '.$usuario["docu"].'</p>
                <p class="par"><b>Nombre y apellido</b> '.$usuario["nombres"].' '.$usuario["apellidos"].'</p>
                <p class="par"><b>Cargo</b> '.$usuario["nom_tip_usu"].'</p>
            </div>
            <div>
                <h3>Asignaciones</h3>
                <p class="par"><b>Titulada</b> '.$usuario["no_ficha"].' '.$usuario["nom_form"].'</p>
                <p class="par"><b>Transversales</b> '.$usuario["ficha_trans"].' '.$usuario["nom_materia"].'</p>
            </div>
        </div>
    ');
}

?>