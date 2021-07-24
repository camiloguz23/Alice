<?php
include ('conexion.php');

?>
<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../../../index.html");
}

$titul = "SELECT no_ficha,usuario.nombres,usuario.apellidos,id_amb,tipo_formacion.nom_tip_form,horario.Nom_horario,dias.Nom_dia,fecha_inico,fecha_final FROM detalform,usuario, tipo_formacion,horario,dias WHERE detalform.docu=usuario.docu and detalform.id_tip_form=tipo_formacion.id_tip_form and detalform.Id_horario=horario.Id_horario and detalform.Id_dia=dias.Id_dia and fecha_final >= CURDATE()";
$titulado = mysqli_query($conexion,$titul);
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
                        <li><a href="crearUsu.php" ><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
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
                          <li><a href="edittitu.php" class="active"><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                          <li><a href="formularios/crear/trasversal.php"><i class="fas fa-plus-square"></i>.Asignacion trasversal</a></li>
                          <li><a href="editrans.php"><i class="fas fa-plus-square"></i>.Editor transversal</a></li>
                          <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>

                      </ul>
                    </li>
                </ul>
                    

                  

            </div>   
            
        </div>

        <div class="form">
            <form class="formula" action="" method="POST">
                <p>MODIFICAR TITULADA</p>
    
                <div class="table">
                    <table class="tabla">
                    <thead>
                    <tr>
                        <th>Numero ficha</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Ambiente</th>
                        <th>Formacion</th>
                        <th>Horario</th>
                        <th>Dias</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de terminacion</th>

                        <th>OPERACION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($titulado as $titulada) {
                        ?>
                            <tr>
                                <td><?php echo $titulada['no_ficha']?></td>
                                <td><?php echo $titulada['nombres']?></td>
                                <td><?php echo $titulada['apellidos']?></td>
                                <td><?php echo $titulada['id_amb']?></td>
                                <td><?php echo $titulada['nom_tip_form']?></td>
                                <td><?php echo $titulada['Nom_horario']?></td>
                                <td><?php echo $titulada['Nom_dia']?></td>
                                <td><?php echo $titulada['fecha_inico']?></td>
                                <td><?php echo $titulada['fecha_final']?></td>

                            
                                <td>
                                    <div class="table-item">
                                        <a href="tituedi.php?id=<?php echo $titulada['no_ficha']?>"><i class="fas fa-edit"></i></a>
                                        <a href="../../../php/eliminatitu.php?idd=<?php echo $titulada['no_ficha']?>"><i class="fas fa-trash"></i></a>
                                    </div>  
                                </td>
                            </tr>
                            </tbody>
                            <?php } mysqli_free_result($titulado) ?>  
                </div>

            </form>
        </div>

           

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>

</html>