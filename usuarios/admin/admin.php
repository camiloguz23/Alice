<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../index.html");
}
?>

<?php
require_once ("../../php/conexion.php");

$asigna = "SELECT no_ficha,detalform.docu,nombres,apellidos,id_amb,nom_tip_form,Nom_horario,Nom_dia,fecha_inico,fecha_final from detalform LEFT JOIN usuario on detalform.docu=usuario.docu LEFT JOIN tipo_formacion on detalform.id_tip_form=tipo_formacion.id_tip_form LEFT JOIN horario on detalform.Id_horario=horario.Id_horario LEFT JOIN dias on detalform.Id_dia=dias.Id_dia order by no_ficha";
$asignacion = mysqli_query($bdmysqli,$asigna);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADIMINSTRADOR</title>
        <link rel="stylesheet" href="admin.css">
        <link rel="shortcut icon" href="../../img/ashleylogo.png" type="image/x-icon">
    </head>
    <body>
        
        <header id="header">
            
            <nav class="menu">
               
                <div class="logo">
                    <img  height="60px" width="60px" src="../../assets/img/logo_calendar.png" alt="">
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
                        <li><a href="../../php/cerrar_sesion.php"> CERRAR SESION</a></li>
                    </ul>
                </div>

            </nav> 
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"><?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" style=" border-radius: 100%" src= "../foto/<?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a class="activ" href="admin.php"><i class="fas fa-chalkboard-teacher"></i>ASIGNACIONES</a></li>

                    <li><a href="#"><i class="fas fa-users-cog"></i>USUARIOS</a>
                      <ul class="sub">
                        <li><a href="formularios/crear/crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="formularios/modificar/edicion.php"><i class="fas fa-pen-square"></i>.Edicion</a></li>

                      </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-building"></i>AMBIENTES</a>
                      <ul class="sub">
                        <li><a href="formularios/crear/crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                        <li><a href="formularios/eliminar/eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-address-book"></i>FORMACIONES</a>
                      <ul class="sub">
                        <li><a href="formularios/crear/crearFormacion.php"><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                        <li><a href="formularios/eliminar/EliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="formularios/crear/CrearFicha.php"><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                        <li><a href="formularios/crear/trasversal.php"><i class="fas fa-plus-square"></i>.Asignacion trasversal</a></li>
                        <li><a href="formularios/eliminar/eliminaFicha.php"><i class="fas fa-minus-square"></i>.Eliminar Formacion Titulada </a></li>

                    </ul>
                    </li>
                </ul>
                
            </div>   
            
        </div>

        <div id="main-container">
            <p class="ins">Asignaciones formaciones tituladas</p>
            <table >
                <thead>
                    <tr>
                        <th>Numero de ficha</th>
                        <th>Documento instructor</th>                        
                        <th>Nombre y apellido instructor</th>
                        <th>Ambiente</th>
                        <th>Tipo de formacion</th>
                        <th>Horario</th>
                        <th>Dia</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha final </th>
                        <th>Transversal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($asignacion as $asig){
                        ?><tr>
                            <td><?=$asig["no_ficha"]?></td>
                            <td><?=$asig["docu"]?></td>
                            <td><?=$asig["nombres"]?> <?=$asig["apellidos"]?></td>
                            <td><?=$asig["id_amb"]?></td>
                            <td><?=$asig["nom_tip_form"]?></td>
                            <td><?=$asig["Nom_horario"]?></td>
                            <td><?=$asig["Nom_dia"]?></td>
                            <td><?=$asig["fecha_inico"]?></td>
                            <td><?=$asig["fecha_final"]?></td>
                            <td>
                            <form method="post" action="transversal.php">
                                <input type="hidden" name="ficha" value="<?=$asig['no_ficha']?>">
                                <button type="submit">Ver transversales</button>
                            </form>
                            </td>
                           
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>

