<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../index.html");
}
?>

<?php
require_once ("../../../../php/conexion.php");

$usuario ="SELECT * from usuario where id_tip_usu = 3";
$consultausu = mysqli_query($bdmysqli,$usuario);

$formacion = "SELECT no_ficha,nom_form from detalform, formacion,ambiente where detalform.id_amb=ambiente.id_amb and ambiente.id_form=formacion.id_form";
$consultaform = mysqli_query($bdmysqli,$formacion);

$material = "SELECT * from materias ";
$consultamateria = mysqli_query($bdmysqli,$material);

$dias = "SELECT * from dias";
$consultadia = mysqli_query($bdmysqli,$dias);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADIMINSTRADOR</title>
        <link rel="stylesheet" href="CrearFicha.css">
        <link rel="shortcut icon" href="../../../../assets/img/ashleylogo.png" type="image/x-icon">
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
                        <li><a href="" >DIA</a></li><br>    
                        <li><a href="#">SEMANA</a></li> <br>
                        <li><a href="#">MES</a></li> <br>
                        <li><a href="#">AÑO</a></li><br>
                        <li><a href="#">AGENDA</a></li><br>
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
                        </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li><a class="activ"  href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                      <ul class="sub">
                        <li><a href="crearFormacion.php" ><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                        <li><a href="../eliminar/EliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="CrearFicha.php" ><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                        <li><a href="trasversal.php" class="active"><i class="fas fa-plus-square"></i>.Asignacion transversal </a></li>
                        <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>

                      </ul>
                    </li>
                </ul>


            </div>   
            
        </div>
        <div class="trans">
            <form method="POST" action="" autocomplete="off" id="transversal">
            <p>FORMACION TRANSVERSAL</p>

                <label>Instructor</label><br>
                <select name="docu" id="docu">
                <option value="">Seleccione una opcion</option>
                <?php
                foreach ($consultausu as $usu){
                    ?> <option value="<?=$usu['docu']?>"><?=$usu['nombres']?> <?=$usu['apellidos']?></option>
                <?php
                }
                ?>
                </select><br>
                <label>Formacion</label><br>
                <select name="ficha" id="ficha">
                <option value="">Seleccione una opcion</option>
                <?php
                foreach ($consultaform as $ficha){
                    ?> <option value="<?=$ficha['no_ficha']?>"><?=$ficha['no_ficha']?> <?=$ficha['nom_form']?></option>
                <?php
                }
                ?>
                </select><br>
                <label>Transversal</label><br>
                <select name="materia" id="materia">
                <option value="">Seleccione una opcion</option>
                <?php
                foreach ($consultamateria as $mat ) {
                    ?> <option value="<?=$mat['id_materia']?>"><?=$mat['nom_materia']?></option>
                <?php
                }
                ?>
                </select><br>
                <label>Dia</label><br>
                <select name="dias" id="dias">
                <option value="">Seleccione una opcion</option>
                <?php
                foreach ($consultadia as $day) {
                    ?> <option value="<?=$day['Id_dia']?>"><?=$day['Nom_dia']?></option>
                <?php
                }
                ?>
                </select><br>
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

