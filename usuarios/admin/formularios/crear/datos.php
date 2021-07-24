<?php 
$conexion=mysqli_connect('localhost','root','','alice');
$materia=$_POST['materia'];

	$sql="SELECT usuario.nombres,detalle_materia.documento,materias.nom_materia 
    FROM detalle_materia,materias,usuario 
    WHERE detalle_materia.documento=usuario.docu 
    AND detalle_materia.id_materia=materias.id_materia and detalle_materia.id_materia = '$materia' ";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>Instructor</label><br> 
			<select id='docu' name='docu'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[1].'>'.utf8_encode($ver[0]).'</option>';
	}

	echo  $cadena."</select>";
	

?>