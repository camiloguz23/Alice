
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
	
	<link rel="stylesheet" href="css/style.css">
    
	
</head>
<body>
	
	<header>

        
	 
	 <img src="../img/ashleylogo.png" alt="" class="logo">
        <ul class="documento">
        <li >Instructores Tecnicos</li>
            <li>Instructores Transversales</li>
            <li>Informe general</li>
            <li >Por documento</li>
        </ul>
        <div class="buscador">
        <input  type="number" name="termino" id="ficha" placeholder="numero de ficha" aria-label="Search">
        </div>
        <div class="buscador">
        <input  type="text" name="termino" id="ambiente" placeholder="ambiente" aria-label="Search">
        </div>

        <div class="buscador">
        <input  type="number" name="termino" id="termino" placeholder="documento" aria-label="Search">
        </div>	
        
        <a href="../usuarios/admin/admin.php"><img src="../img/salida.png" alt="salida" class="salida"></a>
    </header>
    
        <div id="contenido" class="contenido">
            		
		</div>
        
        
    <script src="JS/buscar.js"></script>
</body>
</html>
