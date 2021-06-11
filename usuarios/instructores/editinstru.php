<?php
include ('../admin/formularios/modificar/conexion.php');
$docu = $_GET["usuario"];
$usuarios = "SELECT * FROM usuario WHERE id_tip_usu = 3";
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
            <form class="formula" action="editar.php" method="post">
                  <p>MODIFICAR DATOS</p>
        <form class="container container--edit" action="editar.php" method="post">
            <div class="table__title--edit"></div> 
        <?php $resultado = mysqli_query($conexion, $usuarios);
        while($row=mysqli_fetch_assoc($resultado))  {?>
        <?php } mysqli_free_result($resultado);?>
            <input type="hidden" class="table__input" value="<?php echo $row["docu"];?>" name="documento">
            <label for="nombre">Nombre</label>
            <input type="text" class="table__input" value="<?php echo $_SESSION['nombre']?>" name="nombre">
            <label for="nombre">Apellido</label>
            <input type="text" class="table__input" value="<?php echo $_SESSION['apellido']?>" name="apellido">
            <label for="nombre">Edad</label>
            <input type="number" class="table__input" value="<?php echo $_SESSION['edad']?>" name="edad" required max=100 min="18">
            <label for="nombre">Telefono</label>
            <input type="number" id="celuko" class="table__input" min="3000000000" max="3999999999" value="<?php echo $_SESSION['celular']?>" name="celular" required>
            <span class="error" aria-live="polite"></span>
            <label for="nombre">Correo</label>
            <input type="text" class="table__input" value="<?php echo $_SESSION['correo']?>" name="direccion" required>
            <span class="error" aria-live="polite"></span>
            <input type="hidden" class="table__input" value="" name="contraseña" disabled="disabled">
            <input type="submit" value="Actualizar" class="container-submit">
        </form>

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
        <script src="validar.js"></script>

    </body