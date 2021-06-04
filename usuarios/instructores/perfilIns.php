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
        
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"><?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" style=" border-radius: 100%" src= "../foto/<?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a  href="#"><i class="fas fa-chalkboard-teacher"></i>ASIGNACIONES</a></li>
                    <li><a class="activ" href="perfilIns.php"><i class="fas fa-users-cog"></i>PERFIL</a>
                </ul>
                
            </div>   
            
        </div>      
        <div>
            <img  src= "../foto/<?=$_SESSION['foto']?>" alt="" class="foto">
            <div class="perfil_instructor">
                <b><p>Nombres</p></b>
                <b> <p>Apellidos</p></b>
                <b> <p>Edad</p></b>
                <b> <p>Formacion</p></b>
                <b> <p>Correo</p></b>
                <b><p>Telefono</p></b>
                <button class="boton"><i class="fas fa-pen-square"></i> Editar</button>
            </div>

        </div>
        
        </div>
        <img src="../../assets/img/jhon.jpeg" alt="" class="foto">
        <div class="perfil_instructor">
            <b> <p>Apellidos</p></b>
            <b> <p>Edad</p></b>
            <b> <p>Formacion</p></b>
            <b> <p>Correo</p></b>
            <b><p>Telefono</p></b>
                <button  class="boton" >Editar</button>
        </div>
        
    
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>
