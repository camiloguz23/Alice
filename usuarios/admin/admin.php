<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../index.html");
}
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
                <img  height="70px" widih="70px" src= "../foto/<?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a href="#">INSTRUCTORES</a>
                      <ul class="sub">
                        <li><a href="formularios/admin/crear/crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="formularios/admin/eliminar/EliminarUsu.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="formularios/admin/modificar/edicion.php"><i class="fas fa-pen-square"></i>.Modificar</a></li>

                      </ul>
                    </li>
                    <li><a href="#">AMBIENTES</a>
                      <ul class="sub">
                        <li><a href="formularios/admin/crear/crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                        <li><a href="formularios/admin/eliminar/eliminarAdmin.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href=""><i class="fas fa-pen-square"></i>.Modificar</a></li>
                      </ul>
                    </li>
                    <li><a href="#">CLASES</a>
                      <ul class="sub">
                        <li><a href="./formularios/admin/crear/crearFormacion.php"><i class="fas fa-plus-square"></i>.Asignar clases</a></li>
                        <li><a href=""><i class="fas fa-pen-square"></i>.Modificar </a></li>
                      </ul>
                    </li>
                  </ul>
                  

            </div>   
            
        </div>
    
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>

