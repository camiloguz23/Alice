<?php
include ('../admin/formularios/modificar/conexion.php');

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
        <link rel="stylesheet" href="../admin/formularios/modificar/modificar.css">
        <link rel="shortcut icon" href="../../../../assets/img/ashleylogo.png" type="image/x-icon">
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
                <img  height="70px" widih="70px" style=" border-radius: 50%;width:30%;" src= "../foto/<?=$_SESSION['foto']?>" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a  href="instructor.php"><i class="fas fa-chalkboard-teacher"></i>ASIGNACIONES</a></li>
                    <li><a class="activ" href="perfilIns.php"><i class="fas fa-users-cog"></i>PERFIL</a>
                </ul>
                
            </div>   
            
        </div>   
            
        </div>
        <div class="form">
        <form class="formula" action="../../php/editar.php" method="POST" enctype="multipart/form-data">
            <p>MODIFICAR DATOS</p>
            <div class="conte_foto">
                <img src="../foto/<?=$_SESSION['foto']?>" alt="foto" class="foto_edicion">
                <div>
                    <label for="">Cambiar foto</label>
                    <input type="file" name="foto" id=""><br>
                </div>
                
            </div>
            
            <label for="">Celular</label><br>
            <input type="number" name="celular" id="" value="<?=$_SESSION['celular']?>"><br>
            <label for="">Correo</label><br>
            <input type="email" name="correo" id="" value="<?=$_SESSION['correo']?>"><br>
            <label for="">Direccion</label><br>
            <input type="text" name="direccion" id="" value="<?=$_SESSION['direccion']?>"><br>
            <label for="">contraseña</label><br>
            <input type="password" name="clave" id="" value="<?= $_SESSION['contra']?>"><br>
            <input type="hidden" name="documento" value="<?=$_SESSION['id_user']?>">
            <input type="submit" value="Enviar">

            
        </form>
       
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
        <script src="validar.js"></script>
        
    </body>