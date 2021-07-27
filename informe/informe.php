<?php
include ('../php/conexion.php');

?>
<?php
$titul = "SELECT no_ficha,detalform.docu,nombres,apellidos,edad,celular,fijo,direccion from detalform,usuario where detalform.docu=usuario.docu AND id_tip_usu=3";
$titulado = mysqli_query($bdmysqli,$titul);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INFORME</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="https://kit.fontawesome.com/18e932af55.js"></script>
	<link rel="stylesheet" href="CSS/style.css">
	<script src="JS/jquery-3.4.1.min.js"></script>
	<script src="JS/buscar.js"></script>
</head>
<body>
	
	 <header>

        
	 
	 <img src="../img/ashleylogo.png" alt="" class="logo">
        <ul>
        <li type="button" onclick="mostrarTecnicos();">Instructores Tecnicos</li>
            <li>Instructores Transversales</li>
            <li>Informe general</li>
            <li class="documento">Por documento</li>
        </ul>

        <script type="text/javascript">
		function mostrarTecnicos() {
			document.getElementById('tecnicos').style.display = 'block';
            document.getElementById('transversal').style.display = 'none';
		}

	    </script>
        <div class="buscador">
        <input  type="text" name="termino" id="termino" placeholder="BUSCAR" aria-label="Search">
        </div>
        <a href="../usuarios/admin/admin.php"><img src="../img/salida.png" alt="salida" class="salida"></a>
    </header>
    <body>
        <div id="contenido">
            <div id="tecnicos">
                    <?php $resultado = mysqli_query($bdmysqli,$titul);
                    while($row=mysqli_fetch_assoc($resultado)) {?>
                        <div class="main-container"> 
                            <p class="table__item"> <b>FICHA:</b><?php echo $row["no_ficha"];?></p>
                            <p class="table__item"> <b>DOCUMENTO:</b><?php echo $row["docu"];?></p>
                            <p class="table__item"> <b>NOMBRE:</b><?php echo $row["nombres"];?></p>
                            <p class="table__item"> <b>APELLIDO:</b><?php echo $row["apellidos"];?></p>
                            <p class="table__item"> <b>EDAD:</b><?php echo $row["edad"];?></p>
                            <p class="table__item"> <b>CELULAR:</b><?php echo $row["celular"];?></p>
                            <p class="table__item"> <b>FIJO:</b><?php echo $row["fijo"];?></p>
                            <p class="table__item"> <b>DIRECCION:</b><?php echo $row["direccion"];?></p>
                        </div>
                            <?php } mysqli_free_result($resultado); ?>
            </div>
        </div>
</body>
</html>
