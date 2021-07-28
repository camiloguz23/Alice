<?php
include ('conexion.php');
$docu = $_GET["id"];
$usuarios = "SELECT * FROM usuario WHERE docu = '$docu'";
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
                          <li><a href="../crear/crearmateria.php" ><i class="fas fa-plus-square"></i>.Añadir Materia</a></li>
                          <li><a href="../eliminar/eliminarMateria.php"><i class="fas fa-minus-square"></i>.Eliminar Materia</a></li>

                        </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-address-book"></i>FORMACION</a>
                        <ul class="sub">
                        <li><a href="../crear/crearFormacion.php"><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                          <li><a href="../eliminar/EliminForma.php"><i class="fas fa-minus-square"></i>.Eliminar </a></li>
                          <li><a href="../crear/CrearFicha.php"><i class="fas fa-plus-square"></i>.Formacion Titulada</a></li>
                          <li><a href="edittitu.php"><i class="fas fa-plus-square"></i>.Editor titulada</a></li>
                          <li><a href="formularios/crear/trasversal.php"><i class="fas fa-plus-square"></i>.Asignacion trasversal</a></li>
                          <li><a href="editrans.php"><i class="fas fa-plus-square"></i>.Editor transversal</a></li>
                          <li><a href="../eliminar/eliminaFicha.php"><i class="fas fa-users"></i>.Grupos Formativos</a></li>
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
            <input type="text" class="table__input" value="<?php echo $row["edad"];?>" name="edad" required onkeypress="return soloNumeros(event)" onpaste="return false"  minlength="2" maxlength="3">
            <label for="nombre">Celular</label>
            <input type="text" id="celuko" class="table__input" onkeypress="return soloNumeros(event)" onpaste="return false"  minlength="10" maxlength="11" value="<?php echo $row["celular"];?>" name="celular" required>
            <span class="error" aria-live="polite"></span>
            <label for="nombre">Fijo</label>
            <input type="text" class="table__input" onkeypress="return soloNumeros(event)" onpaste="return false"  minlength="7" maxlength="7" value="<?php echo $row["fijo"];?>" name="fijo" required>
            <script>
                        function soloNumeros(e){
                key=e.keyCode || e.which;
    
                teclado=String.fromCharCode(key);
    
                numeros="123456789101112";
    
                especiales="8-37-38-46";
    
                teclado_especial=false;
    
                for(var i in especiales){
                    if(key==especiales[i]){
                        teclado_especial=true;
                    }
                }
                if(numeros.indexOf(teclado)==-1 && !teclado_especial){
                        return false;
                }
            }
            </script>
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