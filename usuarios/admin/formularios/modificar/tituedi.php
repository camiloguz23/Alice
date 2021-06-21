<?php
include ('conexion.php');
$docu = $_GET["id"];
$usuarios = "SELECT * FROM detalform WHERE no_ficha = '$docu'";
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
        <title>ADIMINSTRADOR</title>
        <link rel="stylesheet" href="modificar.css">
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
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"> <?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" style=" border-radius: 100%" src= "../../../foto/<?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a  href="../../admin.php"><i class="fas fa-chalkboard-teacher"></i>ASIGNACIONES</a></li>

                    <li><a class="activ" href="#"><i class="fas fa-users-cog"></i>USUARIOS</a>
                      <ul class="sub">
                        <li><a href="../crear/crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="edicion.php" class="active"><i class="fas fa-pen-square"></i>.Editar</a></li>
                      </ul>
                    </li>
                </ul>

                <ul class="acor">                    
                    <li><a href="#"><i class="fas fa-building"></i>AMBIENTES</a>
                        <ul class="sub">
                          <li><a href="../crear/crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href="../eliminar/eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                        <ul class="sub">
                          <li><a href="../crear/crearFormacion.php"><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                          <li><a href=""><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                          <li><a href="../crear/CrearFicha.php"><i class="fas fa-plus-square"></i>.Agregar Grupo Formativo</a></li>
                          <li><a href="eliminaFicha.php"><i class="fas fa-minus-square"></i>.Eliminar Grupo </a></li>
                        </ul>
                    </li>
                </ul>
                    

                  

            </div>   
            
        </div>
        <div class="form">
            <form class="formula" action="procesar3.php" method="post">
                  <p>MODIFICAR TITULADA</p>
        <form class="container container--edit" action="procesar2.php" method="post">
            <div class="table__title--edit"></div>      
        <?php $resultado = mysqli_query($conexion, $usuarios);
        while($row=mysqli_fetch_assoc($resultado))  {?>
            <input type="hidden" class="table__input" value="<?php echo $row["no_ficha"];?>" name="no_ficha">
            <label for="nombre">Documento</label>
            <input type="text" class="table__input" value="<?php echo $row["docu"];?>" name="documento">
            <label for="nombre">Ambiente</label>
            <input type="text" class="table__input" value="<?php echo $row["id_amb"];?>" name="ambiente">
            <label for="nombre">Tipo de formacion</label>
            <input type="number" class="table__input" value="<?php echo $row["id_tip_form"];?>" name="formacion" required>
            <label for="nombre">Horario</label>
            <input type="number" id="celuko" class="table__input" value="<?php echo $row["Id_horario"];?>" name="horario" required>
            <span class="error" aria-live="polite"></span>
            <label for="nombre">Dia</label>
            <input type="number" class="table__input" value="<?php echo $row["Id_dia"];?>" name="dia" required>
            <span class="error" aria-live="polite"></span>
            <label for="nombre">Fecha Inicio</label>
            <input type="date" class="table__input" value="<?php echo $row["fecha_inico"];?>" name="fecha-ini" required>
            <label for="nombre">fecha final</label>
            <input type="date" id="email" class="table__input" value="<?php echo $row["fecha_final"];?>" name="fecha-final" required>
            <span class="error" aria-live="polite"></span>
            <?php } mysqli_free_result($resultado);?>
            <input type="submit" value="Actualizar" class="container-submit">
        </form>

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
        <script src="validar.js"></script>

    </body