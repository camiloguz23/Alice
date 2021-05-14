<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../index.html");
}
?>

<?php
require_once ("../../php/conexion.php");

$asigna = "SELECT asignacion_t.id_asig, usuario.docu, usuario.nombres,usuario.apellidos,detalform.no_ficha,ambiente.id_amb,formacion.nom_form,asignacion_t.hora_entrada,asignacion_t.fecha_entrada,asignacion_t.hora_salida,asignacion_t.fecha_salida,materias.nom_materia FROM asignacion_t LEFT JOIN usuario ON asignacion_t.docu=usuario.docu LEFT JOIN detalform ON  asignacion_t.no_ficha=detalform.no_ficha LEFT JOIN ambiente ON detalform.id_amb=ambiente.id_amb LEFT JOIN formacion ON ambiente.id_form=formacion.id_form LEFT JOIN materias ON asignacion_t.id_materia=materias.id_materia";
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
                        <li><a href="formularios/crear/CrearFicha.php"><i class="fas fa-plus-square"></i>.Agregar grupo de formacion</a></li>
                        <li><a href="formularios/eliminar/eliminaFicha.php"><i class="fas fa-minus-square"></i>.Eliminar Grupo </a></li>

                    </ul>
                    </li>
                </ul>
                
            </div>   
            
        </div>

        <div id="main-container">
           <p class="ins">INSTRUCTORES ASIGNADOS</p>
            <table >
                <thead>
                    <tr>
                        <th>Asignacion</th>
                        <th>Documento instructor</th>                        
                        <th>Nombre instructor</th>
                        <th>N° ficha</th>
                        <th>Aula</th>
                        <th>Ambiente</th>
                        <th>hora de inicio</th>
                        <th>fecha de inicio</th>
                        <th>hora final</th>
                        <th>fecha final </th>
                        <th>materia a dictar</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($asignacion as $asig){
                        ?><tr>
                            <td><?=$asig["id_asig"]?></td>
                            <td><?=$asig["docu"]?></td>
                            <td><?=$asig["nombres"]?><?=$asig["apellidos"]?></td>
                            <td><?=$asig["no_ficha"]?></td>
                            <td><?=$asig["id_amb"]?></td>
                            <td><?=$asig["nom_form"]?></td>
                            <td><?=$asig["hora_entrada"]?></td>
                            <td><?=$asig["fecha_entrada"]?></td>
                            <td><?=$asig["hora_salida"]?></td>
                            <td><?=$asig["fecha_salida"]?></td>
                            <td><?=$asig["nom_materia"]?></td>
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

