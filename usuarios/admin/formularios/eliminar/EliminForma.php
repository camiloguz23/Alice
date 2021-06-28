<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../../../index.html");
}
?>

<?php
require_once ("../../../../php/conexion.php");

$consul = "select * from formacion";
$dele = mysqli_query($bdmysqli,$consul);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADIMINSTRADOR</title>
        <link rel="stylesheet" href="eliminaFicha.css">
        <link rel="shortcut icon" href="../../../../assects/img/ashleylogo.png" type="image/x-icon">
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

                    <li><a href="#"><i class="fas fa-users-cog"></i>USUARIOS</a>
                      <ul class="sub">
                        <li><a href="../crear/crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../modificar/edicion.php"><i class="fas fa-pen-square"></i>.Editar</a></li>

                      </ul>
                    </li>
                </ul>
                <ul class="acor">
                    <li ><a href="#"><i class="fas fa-building"></i>AMBIENTES</a>
                      <ul class="sub">
                        <li><a href="../crear/crearAmbien.php" ><i class="fas fa-plus-square"></i>.Añadir</a></li>
                        <li><a href="eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                      </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li><a class="activ"  href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                      <ul class="sub">
                        <li><a href="../crear/crearFormacion.php"><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                        <li><a href="eliminForma.php" class="active"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="../crear/CrearFicha.php"><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                        <li><a href="../modificar/edittitu.php"><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                        <li><a href="../crear/trasversal.php" ><i class="fas fa-plus-square"></i>.Asignacion transversal </a></li>
                        <li><a href="eliminaFicha.php" ><i class="fas fa-users"></i>.Grupos Formativos </a></li>

                      </ul>
                    </li>
                </ul>
                  

            </div>   
  
        </div>

        <div class="form">
           <p>ELIMINAR FORMACION</p>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>Nombre de la formacion</th>
                        <th>Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dele as $eli){
                    ?> <tr>
                    <td><?=$eli["nom_form"]?></td>
                    <td>
                        <form action="../../../../php/eliminaform.php" method="post">
                            <input type="hidden" name="form_eli" value="<?=$eli['id_form']?>">
                            <button type="submit" ><i class="fas fa-trash"></i></button>
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

