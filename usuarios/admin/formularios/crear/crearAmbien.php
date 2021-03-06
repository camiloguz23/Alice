

<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../../../index.html");
}
?>

<?php
require_once ("../../../../php/conexion.php");

$sqli = "SELECT * from naves";
$ambien = mysqli_query($bdmysqli,$sqli);
?>
<?php
require_once ("../../../../php/conexion.php");

$consul = "SELECT * from formacion";
$formacion = mysqli_query($bdmysqli,$consul);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADMINSTRADOR</title>

        <link rel="stylesheet" href="crearAm.css">

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

                    <li><a href="#"><i class="fas fa-users-cog"></i>USUARIOS</a>
                      <ul class="sub">
                        <li><a href="crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../modificar/edicion.php"><i class="fas fa-pen-square"></i>.Editar</a></li>

                      </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li ><a class="activ" href="#"><i class="fas fa-building"></i>AMBIENTES</a>
                      <ul class="sub">
                        <li><a href="crearAmbien.php"  class="active"><i class="fas fa-plus-square"></i>.A??adir</a></li>
                        <li><a href="../eliminar/eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="crearmateria.php" ><i class="fas fa-plus-square"></i>.A??adir Materia</a></li>
                        <li><a href="../eliminar/eliminaMateria.php"><i class="fas fa-minus-square"></i>.Eliminar Materia</a></li>

                    </ul>
                    </li>
                </ul>
                <ul class="acor">
                    <li><a href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                      <ul class="sub">
                        <li><a href="crearFormacion.php"><i class="fas fa-plus-square"></i>.A??adir formacion</a></li>
                        <li><a href="../eliminar/eliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="CrearFicha.php"><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                        <li><a href="../modificar/edittitu.php"><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                        <li><a href="../crear/trasversal.php"><i class="fas fa-plus-square"></i>.Asignacion trasversal</a></li>
                        <li><a href="../modificar/editrans.php"><i class="fas fa-plus-square"></i>.Editor transversal</a></li>
                        <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>

                      </ul>
                    </li>
                </ul>
                  

            </div>   
            
        </div>
        <div class="form">
            <form class="formula" action="../../../../php/crearAmbiente.php" method="POST">
                <p>NUEVO AMBIENTE DE FORMACION</p>

                <div class="contenedor">
                    <div>
                        <label for="" class="texto"> N?? Ambiente de formacion</label><br>
                        <input name="ambiente" type="text" minlength="4" maxlength="4" required autocomplete="off" >
                    </div> 
                </div>

                <div class="conten">

                    <div class="tipo_ambiente">
                            <label for="" class="texto">Tipo Ambiente</label><br>
                            <select name="tipo_amb" required>   
                                <option value="">Seleccione </option> 
                                <?php
                                foreach ($formacion as $formaci){
                                    ?> <option value="<?=$formaci['id_form']?>"><?=$formaci['nom_form']?></option>
                                <?php
                                }
                                ?>
                            </select>   
                        </div>

                        <div class=" tipo">
                            <label for="" class="texto"> Nave</label><br>
                            <select name="nave" required>   
                                <option value="">Seleccione </option> 
                                <?php
                                foreach ($ambien as $naves){
                                    ?> <option value="<?=$naves['id_naves']?>"><?=$naves['nom_nave']?></option>
                                <?php
                                }
                                ?>
                            </select>    
                        </div>  
                    
                    </div>
                    <input type="submit" class="enviar" name="enviar" value="Enviar">

                </div>  
                
            </form>
        </div>
        
    
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>