<?php 

require_once "../php/conexion.php";
$tabla="";
$consulta=" SELECT ambiente.id_amb, detalform.no_ficha, formacion.nom_form,usuario.docu, usuario.nombres, usuario.apellidos, dias.Nom_dia, tipo_formacion.nom_tip_form, horario.Nom_horario, detalform.fecha_inico, detalform.fecha_final FROM detalform INNER JOIN ambiente ON detalform.id_amb=ambiente.id_amb INNER JOIN formacion ON ambiente.id_form=formacion.id_form INNER JOIN usuario ON detalform.docu=usuario.docu INNER JOIN dias ON detalform.Id_dia=dias.Id_dia INNER JOIN tipo_formacion ON detalform.id_tip_form=tipo_formacion.id_tip_form INNER JOIN horario ON detalform.Id_horario=horario.Id_horario LIMIT 0";
$termino= "";
if(isset($_POST['productos']))
{
	$termino=$bdmysqli->real_escape_string($_POST['productos']);
	$consulta="SELECT ambiente.id_amb, detalform.no_ficha, formacion.nom_form,usuario.docu, usuario.nombres, usuario.apellidos, dias.Nom_dia, tipo_formacion.nom_tip_form, horario.Nom_horario, detalform.fecha_inico, detalform.fecha_final FROM detalform INNER JOIN ambiente ON detalform.id_amb=ambiente.id_amb INNER JOIN formacion ON ambiente.id_form=formacion.id_form INNER JOIN usuario ON detalform.docu=usuario.docu INNER JOIN dias ON detalform.Id_dia=dias.Id_dia INNER JOIN tipo_formacion ON detalform.id_tip_form=tipo_formacion.id_tip_form INNER JOIN horario ON detalform.Id_horario=horario.Id_horario
	WHERE ambiente.id_amb  LIKE  '%.$termino.%' OR detalform.no_ficha  LIKE '%.$termino.%' OR formacion.nom_form  LIKE '%.$termino.%' OR usuario.docu  LIKE '%.$termino.%' OR usuario.nombres  LIKE '%.$termino.%' OR usuario.apellidos  LIKE '%.$termino.%'  OR tipo_formacion.nom_tip_form  LIKE '%.$termino.%' OR  horario.Nom_horario  LIKE '%.$termino.%' OR detalform.fecha_inico   LIKE'%2%' OR detalform.fecha_final LIKE  '%.$termino.%'";
	
}
$consultaBD=$bdmysqli->query($consulta);
if($consultaBD->num_rows>1){
	

		while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC))
		{
			echo "<div class = 'informe'>
			<p> <b>AMBIENTE :</b>".$fila['id_amb']."</p>
			
			<p> <b>NUMERO DE FICHA: </b>".$fila['no_ficha']."</p>
			
			<p> <b> NOMBRE DE DFORMACION  </b>".$fila['nom_form']."</p>
			
			<p> <b> DOCUMENTO:  </b> ".$fila['docu']."</p>
			<br>
			<p> <b>NONBRES:  </b> ".$fila['nombres']."</p>	
			
			<p><b>APELLIDOS:  </b> ".$fila['apellidos']."</p>
				
			<p><b>TIPO DE FORMACION:  </b>".$fila['nom_tip_form']."</p>
			
			<p><b>HORARIO:  </b>".$fila['Nom_horario']."</p>
			
			<p><b>FECHA DE INICIO: </b>".$fila['fecha_inico']."</p>
			
			<p><b>FECHA DE FIN:  </b>".$fila['fecha_final']."</p>
			</div>";
		}
	

}else{
	echo "<center><h4>No hemos encotrado ningun registro con la palabra "."<strong class='text-uppercase'>".$termino."</strong><h4><center>";
}
?>