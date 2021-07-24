<?php
include ('conexion.php');
$docu = $_GET["id"];
$usuarios = "SELECT * FROM asignacion_t WHERE ficha_trans = '$docu'";

$sql = "SELECT * from dias";
$dia = mysqli_query($conexion,$sql);

$sql = "SELECT * from materias";
$mater = mysqli_query($conexion,$sql);

$sql = "SELECT * from detalform";
$titula = mysqli_query($conexion,$sql);
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
                        </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li><a class="activ"  href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                      <ul class="sub">
                        <li><a href="../crear/crearFormacion.php" ><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                        <li><a href="../eliminar/EliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="../crear/CrearFicha.php" ><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                        <li><a href="../modificar/edittitu.php" ><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                        <li><a href="../crear/trasversal.php"><i class="fas fa-plus-square"></i>.Asignacion transversal </a></li>
                        <li><a href="../modificar/editrans.php" class="active"><i class="fas fa-plus-square"></i>.Editor transversal </a></li>
                        <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>

                      </ul>
                    </li>
                </ul>
                    

                  

            </div>   
            
        </div>
        <div class="form">
            <form class="formula" action="procesar2.php" method="post">
                  <p>MODIFICAR TRANSVERSAL</p>
        <form  action="procesar2.php" method="post">
            <div></div>      
        <?php $resultado = mysqli_query($conexion, $usuarios);
        while($row=mysqli_fetch_assoc($resultado))  {?>
            <input type="hidden" class="table__input" value="<?php echo $row["ficha_trans"];?>" name="transficha">
            <input type="hidden" class="table__input" value="<?php echo $row["docu"];?>" name="documento">

        <div class="contened">
            <div>
                <label for="nombre">Numero Ficha transversal</label>
                <input type="text" class="table__inpu" value="<?php echo $row["ficha_trans"];?>" name="transverficha">
                <label for="nombre">Ficha Titulada</label>
                <select class="titu" name="titulada">
                    <option value="<?php echo $row["no_ficha"];?>">Seleccione</option>
                    <?php
                    foreach ($titula as $titulada){
                        ?> <option value="<?=$titulada['no_ficha']?>"><?=$titulada['no_ficha']?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>

        </div>
        <div class="conten">
            

            <div>
                <label for="nombre">Materias</label>
                <select  name="materia">
                    <option value="<?php echo $row["id_materia"];?>">Seleccione </option>
                    <?php
                    foreach ($mater as $Materia){
                        ?> <option value="<?=$Materia['id_materia']?>"><?=$Materia['nom_materia']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="nombre">Dias</label><br>
                <select  name="dia" >
                            <option value="<?php echo $row["Id_dia"];?>">Seleccione </option>
                            <?php
                            foreach ($dia as $dias){
                                ?> <option value="<?=$dias['Id_dia']?>"><?=$dias['Nom_dia']?></option>
                            <?php
                            }
                            ?>
                </select>    
                <span class="error" aria-live="polite"></span>


            </div>

        </div>

        <div class="conte">

            <div>
            <label for="nombre">Horario inicio</label>
            <input type="time" class="table__input" value="<?php echo $row["horario_inicio"];?>" name="hora-inicio" required>
            <span class="error" aria-live="polite"></span>

            </div>

            <div>
                <label for="nombre">Horario fin</label>
                <input type="time" class="table__input" value="<?php echo $row["horario_fin"];?>" name="hora-fin" required>
            </div>

        </div>

        <div class="cont">

            <div>
                <label for="nombre">fecha inicio</label>
                <input type="date" id="email" class="table__input" value="<?php echo $row["fecha_inico"];?>" name="fecha-ini" required>
                <span class="error" aria-live="polite"></span>
            </div>
            <div>
                <label for="nombre">fecha fin</label>
                <input type="date" class="table__input" value="<?php echo $row["fecha_final"];?>" name="fecha-fin" required>
            </div>

        </div>
        <br>

            <?php } mysqli_free_result($resultado);?>
            <input type="submit" value="Actualizar" class="container-submit">
            <br>
        </form>

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
        <script src="validar.js"></script>

    </body