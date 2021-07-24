<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../index.html");
}
?>

<?php
require_once ("../../../../php/conexion.php");

$transversal = $_POST['materia'];

//$usuario ="SELECT * from usuario where id_tip_usu = 3";
$usuario = "SELECT usuario.nombres,detalle_materia.documento,materias.nom_materia FROM detalle_materia,materias,usuario WHERE detalle_materia.documento=usuario.docu AND detalle_materia.id_materia=materias.id_materia ";
$consultausu = mysqli_query($bdmysqli,$usuario);

$formacion = "SELECT no_ficha,nom_form from detalform, formacion,ambiente where detalform.id_amb=ambiente.id_amb and ambiente.id_form=formacion.id_form";
$consultaform = mysqli_query($bdmysqli,$formacion);

$material = "SELECT * from materias ";
$consultamateria = mysqli_query($bdmysqli,$material);

$dias = "SELECT * from dias";
$consultadia = mysqli_query($bdmysqli,$dias);

$cons="SELECT * from asignacion_t";
$asigna= mysqli_query($bdmysqli,$cons);

$ambiente="SELECT * from ambiente";
$amb= mysqli_query($bdmysqli,$ambiente);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADMINSTRADOR</title>
        <link rel="stylesheet" href="CrearFicha.css">
        <link rel="shortcut icon" href="../../../../assets/img/ashleylogo.png" type="image/x-icon">
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    </head>
    <body>
        
        <header id="header">
            
            <nav class="menu">
               
                
                <div class="logo">
                    <img  height="60px" width="60px" src="../../../../assets/img/logo_calendar.png" alt="">
                </div>
                <a class="nombre">ADMINISTRADOR</a>

                

                <div class="list-container">

                    <ul class="lists">
                        <i class="fas fa-search"></i>
                        <li><a href="../../../../informe/informe.php">Informe</a></li><br>
                    </ul>

                </div>

                <div class="salir">
                    <ul>
                        <li><a href="../../../../php/cerrar_sesion.php"> CERRAR SESION</a></li>
                    </ul>
                </div>

            </nav> 

            <a href="./php/conexion.php"></a>
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"><?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" style=" border-radius: 100%" src= "../../../foto/<?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acor">
                <li><a  href="../../admin.php"><i class="fas fa-chalkboard-teacher"></i>ASIGNACIONES</a></li>

                    <li ><a href="#"><i class="fas fa-users-cog"></i>USUARIOS</a>
                      <ul class="sub">
                        <li><a href="crearUsu.php" ><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../modificar/edicion.php"><i class="fas fa-pen-square"></i>.Editar</a></li>

                      </ul>
                    </li>
                </ul>
                  
                <ul class="acor">                    
                    <li><a href="#"><i class="fas fa-building"></i>AMBIENTES</a>
                        <ul class="sub">
                          <li><a href="crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href="../eliminar/eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                          <li><a href="crearmateria.php" ><i class="fas fa-plus-square"></i>.Añadir Materia</a></li>
                            <li><a href="../eliminar/eliminaMateria.php"><i class="fas fa-minus-square"></i>.Eliminar Materia</a></li>

                        </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li><a class="activ"  href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                      <ul class="sub">
                        <li><a href="crearFormacion.php" ><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                        <li><a href="../eliminar/EliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="CrearFicha.php" ><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                        <li><a href="../modificar/edittitu.php"><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                        <li><a href="trasversal.php" class="active"><i class="fas fa-plus-square"></i>.Asignacion transversal </a></li>
                        <li><a href="../modificar/editrans.php"><i class="fas fa-plus-square"></i>.Editor transversal</a></li>
                        <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>

                      </ul>
                    </li>
                </ul>


            </div>   
            
        </div>
        <div class="trans">
            <form method="POST" action="" autocomplete="off" id="transversal">
            <p>FORMACION TRANSVERSAL</p>

            <div class="conten">
                <div>
                    <label>Ficha Transversal</label><br>
                    <input type="text" name="trans" id="trans" onkeypress="return soloNumeros(event)" onpaste="return false"  minlength="05" maxlength="06" required  autocomplete="off">
                
                <script>
                    function soloNumeros(e){
            key=e.keyCode || e.which;

            teclado=String.fromCharCode(key);

            numeros="12345678910";

            especiales="8-37-38-46";

            teclado_especial=false;

            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;
                }
            }
            if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                    return false;
            }
        }
        </script>
                </div>
                <div>
                    <label>Transversal</label><br>
                    <select name="materia" id="materia">
                    <option value="">Seleccione una opcion</option>
                    <?php
                    foreach ($consultamateria as $mat ) {
                        ?> <option value="<?=$mat['id_materia']?>"><?=$mat['nom_materia']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
     
            </div>
            <div class="conte" id="select2lista">
                <div>
                    <label>Instructor</label><br>
                    <select name="docu" id="docu">
                    <option value="">Seleccione una opcion</option>
                    <?php
                    foreach ($consultausu as $usu){
                        ?> <option value="<?=$usu['documento']?>"><?=$usu['nombres']?> - <?=$usu['nom_materia']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <div>
                    <label>Formacion</label><br>
                    <select name="ficha" id="ficha">
                    <option value="">Seleccione una opcion</option>
                    <?php
                    foreach ($consultaform as $ficha){
                        ?> <option value="<?=$ficha['no_ficha']?>"><?=$ficha['no_ficha']?> <?=$ficha['nom_form']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
            
            </div>

            <div class="cont">
                <div>
                    <label>Ambiente</label><br>
                    <select name="ambi" id="ambi">
                    <option value="">Seleccione una opcion</option>
                    <?php
                    foreach ($amb as $ambie) {
                        ?> <option value="<?=$ambie['id_amb']?>"><?=$ambie['id_amb']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
            
                <div>
                    <label>Dia</label><br>
                    <select name="dias" id="dias">
                    <option value="">Seleccione una opcion</option>
                    <?php
                    foreach ($consultadia as $day) {
                        ?> <option value="<?=$day['Id_dia']?>"><?=$day['Nom_dia']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
            </div>
            
        
                <div class="hora_fecha">
                    <div>
                        <label>Hora de inicio</label><br>
                        <input type="time" name="hora_inicio" id="horai">
                    </div>
                    <div>
                        <label>Hora de terminacion</label><br>
                        <input type="time" name="hora_fin" id="horaf">

                    </div>
                    
                </div>
                <div class="hora_fecha">
                    <div>
                        <label>Fecha de inicio</label><br>
                        <input type="date" name="fecha_inicio" id="fechai">
                    </div>
                    <div> 
                        <label>Fecha de terminacion</label><br>
                        <input type="date" name="fecha_fin" id="fechaf">
                    </div>
                </div>
                <div class="boton">
                    <button type="bottom" id="btn_trans">Enviar</button>
                </div>

                
            </form>
            
        </div>

       
        
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
        <script src="../../../../javascript/transversal.js"></script>
    </body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#materia').val(1);
		recargarLista();

		$('#materia').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"materia=" + $('#materia').val(),
			success:function(r){
				$('#docu').html(r);
			}
		});
	}
</script>