<?php
require_once ("../../../../php/conexion.php");
?>

<?php
require_once ("../../../../php/conexion.php");
$sql2 = "SELECT * from tipo_formacion ";
$tipoform  = mysqli_query($bdmysqli,$sql2);
?>

<?php
require_once ("../../../../php/conexion.php");
$sq = "SELECT * from ambiente where id_estado = 1";
$detaform = mysqli_query($bdmysqli,$sq);
?>

<?php
require_once ("../../../../php/conexion.php");
$sq = "SELECT * FROM horario";
$hora = mysqli_query($bdmysqli,$sq);
?>

<?php
require_once ("../../../../php/conexion.php");
$sq = "SELECT * FROM dias";
$dia = mysqli_query($bdmysqli,$sq);
?>

<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../../../index.html");
}
?>

<?php
$instructor = "SELECT *  from usuario where id_tip_usu = 3";
$instru = mysqli_query($bdmysqli,$instructor);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADMINSTRADOR</title>
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
                          <li><a href="crearAmbien.php"><i class="fas fa-plus-square"></i>.A??adir</a></li>
                          <li><a href="../eliminar/eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                          <li><a href="crearmateria.php" ><i class="fas fa-plus-square"></i>.A??adir Materia</a></li>
                          <li><a href="../eliminar/eliminaMateria.php"><i class="fas fa-minus-square"></i>.Eliminar Materia</a></li>

                        </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li><a class="activ"  href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                      <ul class="sub">
                        <li><a href="crearFormacion.php" ><i class="fas fa-plus-square"></i>.A??adir formacion</a></li>
                        <li><a href="../eliminar/EliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="formularios/crear/" class="active"><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                        <li><a href="../modificar/edittitu.php"><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                        <li><a href="trasversal.php"><i class="fas fa-plus-square"></i>.Asignacion transversal </a></li>                        
                        <li><a href="../modificar/editrans.php"><i class="fas fa-plus-square"></i>.Editor transversal</a></li>
                        <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>

                      </ul>
                    </li>
                </ul>


            </div>   
            
        </div>
        <div class="form">
            <form class="formula" action="../../../../php/CrearFicha.php" method="POST">
                <p>FORMACION TITULADA</p>

                <div class="contenedor">
                    <div>
                        <label for="" class="texto"> N?? Ficha</label><br>
                        <input class="miku" name="ficha" onkeypress="return soloNumeros(event)" onpaste="return false" type="text" minlength="5" maxlength="7" required autocomplete="off" >
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
                </div>

                <div class="conten">

                    <div>
                        <label>Instructor</label>
                        <select name="instru">
                        <option>Seleccione una opci??n</option>
                        <?php
                        foreach ($instru as $ins) {
                            ?> <option value="<?=$ins['docu']?>"><?=$ins['nombres']?> <?=$ins['apellidos']?></option>
                        <?php
                        }
                        ?>

                        </select>
                    </div>

                    <div >
                        <label for="" class="texto">Ambiente de formacion</label><br>
                        <select name="amb" required>   
                            <option >Seleccione una opci??n </option> 
                            <?php
                            foreach ($detaform as $amb){
                                ?> <option value="<?=$amb['id_amb']?>"><?=$amb['id_amb']?></option>
                            <?php
                            }
                            ?>
                        </select>   
                    </div>

                    <div >
                        <label for="" class="texto"> Programa de formacion </label><br>
                        <select name="forma" required>   
                            <option value="">Seleccione </option> 
                            <?php
                            foreach ($tipoform as $programa){
                                ?> <option value="<?=$programa['id_tip_form']?>"><?=$programa['nom_tip_form']?></option>
                            <?php
                            }
                            ?>
                        </select>    
                    </div> 

                    <div >
                        <label for="" class="texto"> Horario </label><br>
                        <select name="hora" required>   
                            <option value="">Seleccione </option> 
                            <?php
                            foreach ($hora as $programa){
                                ?> <option value="<?=$programa['Id_horario']?>"><?=$programa['Nom_horario']?></option>
                            <?php
                            }
                            ?>
                        </select>    
                    </div> 

                    <div >
                        <label for="" class="texto"> dia </label><br>
                        <select name="dia" required>   
                            <option value="">Seleccione </option> 
                            <?php
                            foreach ($dia as $programa){
                                ?> <option value="<?=$programa['Id_dia']?>"><?=$programa['Nom_dia']?></option>
                            <?php
                            }
                            ?>
                        </select>    
                    </div>

                    <div>
                        <label for="" class="fecha"> Fecha inicial</label><br>
                        <input name="fecha" type="date" required autocomplete="off" >
                    </div> 

                    <div>
                        <label for="" class="fecha"> Fecha Final</label><br>
                        <input name="fechaF" type="date" required autocomplete="off" >
                    </div> 
                    
                    </div>
                    <input type="submit" class="enviar" name="enviar" value="Enviar">

                </div>  
                
            </form>
        </div>

       
        
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
    </body>
</html>
