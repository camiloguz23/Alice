<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../index.html");
}
?>

<?php
require_once ("../../php/conexion.php");

$num_ficha = $_POST['ficha'];
$traversal = "SELECT asignacion_t.docu,nombres,apellidos,asignacion_t.no_ficha,detalform.id_amb,nom_materia,Nom_dia,horario_inicio,horario_fin,asignacion_t.fecha_inico,asignacion_t.fecha_final,nom_form FROM `asignacion_t` LEFT JOIN materias ON asignacion_t.id_materia=materias.id_materia LEFT JOIN dias ON asignacion_t.Id_dia=dias.Id_dia LEFT JOIN usuario ON asignacion_t.docu=usuario.docu LEFT JOIN detalform ON asignacion_t.no_ficha=detalform.no_ficha LEFT JOIN ambiente ON detalform.id_amb=ambiente.id_amb LEFT JOIN formacion ON ambiente.id_form=formacion.id_form where detalform.no_ficha = $num_ficha order by detalform.no_ficha";
$consultrave = mysqli_query($bdmysqli,$traversal);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>INSTRUCTOR</title>
       
        <link rel="shortcut icon" href="../../img/" type="image/x-icon">
        <link rel="stylesheet" href="../admin/admin.css">
    </head>
    <body>
        
        <header id="header">
            
            <nav class="menu">
               
                <div class="logo">
                    <img  height="60px" width="60px" src="../../assets/img/logo_calendar.png" alt="">
                </div>
                <a class="nombre">INSTRUCTOR</a>

                

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
                <img  height="70px" widih="70px" style=" border-radius: 100%" src= "../foto/?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a class="activ" href="#"><i class="fas fa-chalkboard-teacher"></i>ASIGNACIONES</a></li>

                    <li><a href="#"><i class="fas fa-users-cog"></i>PERFIL</a>
                      <ul class="sub">
        </div>

        

        <div class="traversal">
           <p class="ins">Asignaciones Trasversales de la formacion <?=$num_ficha?></p>
            <table >
                <thead>
                    <tr>
                        <th>Numero de ficha</th>
                        <th>Documento instructor</th>                        
                        <th>Nombre y apellido instructor</th>
                        <th>Ambiente</th>
                        <th>Formacion</th>
                        <th>Traversal</th>
                        <th>Dia</th>
                        <th>Hora de inicio</th>
                        <th>Hora de finalizacion</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de finalizacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($consultrave as $traver){
                        ?><tr>
                            <td><?=$traver["no_ficha"]?></td>
                            <td><?=$traver["docu"]?></td>
                            <td><?=$traver["nombres"]?> <?=$traver["apellidos"]?></td>
                            <td><?=$traver["id_amb"]?></td>
                            <td><?=$traver["nom_form"]?></td>
                            <td><?=$traver["nom_materia"]?></td>
                            <td><?=$traver["Nom_dia"]?></td>
                            <td><?=$traver["horario_inicio"]?></td>
                            <td><?=$traver["horario_fin"]?></td>
                            <th><?=$traver["fecha_inico"]?></th>
                            <td><?=$traver["fecha_final"]?></td>
                           
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

