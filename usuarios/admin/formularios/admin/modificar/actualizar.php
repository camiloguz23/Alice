<?php
include ('conexion.php');
$docu = $_GET["id"];
$usuarios = "SELECT * FROM usuario WHERE docu = '$docu'";
?>
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
        <link rel="stylesheet" href="modificar.css">
        <link rel="shortcut icon" href="../../../../../assets/img/ashleylogo.png" type="image/x-icon">
    </head>
    <body>
        
        <header id="header">
            
            <nav class="menu">
               
                
                <div class="logo">
                    <img  height="60px" width="60px" src="../../../../../assets/img/logo_calendar.png" alt="">
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
                        <li><a href="../../../../../php/cerrar_sesion.php"> CERRAR SESION</a></li>
                    </ul>
                </div>

            </nav> 
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"> <?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" src= "../../../../../assets/img/logo_usuar.png" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a class="activ" href="#">USUARIOS</a>
                      <ul class="sub">
                        <li><a href="../crear/crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../eliminar/EliminarUsu.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="edicion.php" class="active"><i class="fas fa-pen-square"></i>.Modificar</a></li>
                      </ul>
                    </li>
                </ul>

                <ul class="acor">                    
                    <li><a href="#">AMBIENTES</a>
                        <ul class="sub">
                          <li><a href="../crear/crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href="../eliminar/eliminarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                          <li><a href=""><i class="fas fa-pen-square"></i>.Modificar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">CLASES</a>
                        <ul class="sub">
                          <li><a href=""><i class="fas fa-plus-square"></i>.Asignar clases</a></li>
                          <li><a href=""><i class="fas fa-pen-square"></i>.Modificar </a></li>
                        </ul>
                    </li>
                </ul>
                    

                  

            </div>   
            
        </div>
        <div class="form">
            <form class="formula" action="procesar.php" method="post">
                  <p>MODIFICAR USUARIO</p>
        <form class="container container--edit" action="procesar.php" method="post">
            <div class="table__title--edit"></div>      
        <?php $resultado = mysqli_query($conexion, $usuarios);
        while($row=mysqli_fetch_assoc($resultado))  {?>
            <input type="hidden" class="table__input" value="<?php echo $row["docu"];?>" name="documento">
            <label for="nombre">Nombre</label>
            <input type="text" class="table__input" value="<?php echo $row["nombres"];?>" name="nombre" disabled="disabled">
            <label for="nombre">Apellido</label>
            <input type="text" class="table__input" value="<?php echo $row["apellidos"];?>" name="apellido" disabled="disabled">
            <label for="nombre">Edad</label>
            <input type="number" class="table__input" value="<?php echo $row["edad"];?>" name="edad" required max=100 min="18">
            <label for="nombre">Celular</label>
            <input type="number" id="celuko" class="table__input" min="3000000000" max="3999999999" value="<?php echo $row["celular"];?>" name="celular" required>
            <span class="error" aria-live="polite"></span>
            <label for="nombre">Fijo</label>
            <input type="number" class="table__input" min="2000000" max="6999999" value="<?php echo $row["fijo"];?>" name="fijo" required>
            <span class="error" aria-live="polite"></span>
            <label for="nombre">Dirección</label>
            <input type="text" class="table__input" value="<?php echo $row["direccion"];?>" name="direccion" required>
            <label for="nombre">e-mail</label>
            <input type="email" id="email" class="table__input" value="<?php echo $row["email"];?>" name="email" required>
            <span class="error" aria-live="polite"></span>
            <input type="hidden" class="table__input" value="<?php echo $row["contra_seguridad"];?>" name="contraseña" disabled="disabled">
            <?php } mysqli_free_result($resultado);?>
            <input type="submit" value="Actualizar" class="container-submit">
        </form>

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
        <script src="validar.js"></script>

    </body