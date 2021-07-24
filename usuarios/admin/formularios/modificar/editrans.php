<?php
include ('conexion.php');
$transconsul = "SELECT ficha_trans,usuario.nombres,usuario.apellidos,asignacion_t.no_ficha, detalform.id_amb,materias.nom_materia, dias.Nom_dia,horario_inicio,horario_fin,asignacion_t.fecha_inico,asignacion_t.fecha_final FROM asignacion_t, usuario, materias, dias, detalform WHERE asignacion_t.docu=usuario.docu and asignacion_t.id_materia=materias.id_materia and asignacion_t.Id_dia=dias.Id_dia and asignacion_t.no_ficha=detalform.no_ficha and asignacion_t.fecha_final >= CURDATE()";
$resu = mysqli_query($conexion, $transconsul)
?>
<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../../../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADMINSTRADOR</title>
        <link rel="stylesheet" href="modificar.css">
        <link rel="shortcut icon" href="../../../../img/ashleylogo.png" type="image/x-icon">
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
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"> <?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" style=" border-radius: 100%" src= "../../../foto/<?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acor">
                <li><a  href="../../admin.php"><i class="fas fa-chalkboard-teacher"></i>ASIGNACIONES</a></li>

                    <li ><a href="#"><i class="fas fa-users-cog"></i>USUARIOS</a>
                      <ul class="sub">
                        <li><a href="../crear/crearUsu.php" ><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../modificar/edicion.php"><i class="fas fa-pen-square"></i>.Editar</a></li>

                      </ul>
                    </li>
                </ul>
                  
                <ul class="acor">                    
                    <li><a href="#"><i class="fas fa-building"></i>AMBIENTES</a>
                        <ul class="sub">
                          <li><a href="../crear/crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href="../eliminar/eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                          <li><a href="../crear/crearmateria.php" ><i class="fas fa-plus-square"></i>.Añadir Materia</a></li>
                          <li><a href="../eliminar/eliminarMateria.php"><i class="fas fa-minus-square"></i>.Eliminar Materia</a></li>

                        </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li><a class="activ"  href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                      <ul class="sub">
                            <li><a href="../crear/crearFormacion.php"><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                          <li><a href="../eliminar/EliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar </a></li>
                          <li><a href="../crear/CrearFicha.php"><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                          <li><a href="edittitu.php"><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                          <li><a href="../crear/trasversal.php"><i class="fas fa-plus-square"></i>.Asignacion trasversal</a></li>
                          <li><a href="editrans.php"><i class="fas fa-plus-square"></i>.Editor transversal</a></li>
                          <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>

                      </ul>
                    </li>
                </ul>
                    

                  

            </div>   
            
        </div>

        <div class="form">

            <form class="formula" action="" method="POST">
                <p>MODIFICAR TRANSVERSAL</p>
                <div class="table">
                    <table class="tabla">
                    <thead>
                    <tr>
                        <th>Ficha transversal</th>
                        <th>Nombre</th>
                        <th>N de ficha</th>
                        <th>Ambiente</th>
                        <th>Transversal</th>
                        <th>Dia</th>
                        <th>Hora de inicio</th>
                        <th>Hora de terminacion</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de terminacion</th>

                        <th>OPERACION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($resu as $form_trasn) {?>
                    <tr>
                        <td><?=$form_trasn['ficha_trans']?></td>
                        <td><?=$form_trasn['nombres']?> <?=$form_trasn['apellidos']?></td>
                        <td><?=$form_trasn['no_ficha']?></td>
                        <td><?=$form_trasn['id_amb']?></td>
                        <td><?=$form_trasn['nom_materia']?></td>
                        <td><?=$form_trasn['Nom_dia']?></td>
                        <td><?=$form_trasn['horario_inicio']?></td>
                        <td><?=$form_trasn['horario_fin']?></td>
                        <td><?=$form_trasn['fecha_inico']?></td>
                        <td><?=$form_trasn['fecha_final']?></td>

                    
                        <td>
                            <div class="table-item">
                                <a href="transedi.php?id=<?=$form_trasn['ficha_trans']?>"><i class="fas fa-edit"></i></a>
                                <a href="../../../../php/eliminatrans.php?ide=<?=$form_trasn['ficha_trans']?>"><i class="fas fa-trash"></i></a>

                            </div>  
                        </td>
                    </tr>
                    </tbody>
                    <?php } mysqli_free_result($resu) ?> 

                </div>
  

            </form>
        </div>

           

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>

</html>