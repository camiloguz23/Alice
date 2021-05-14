<?php
include ('conexion.php');
$usuarios = "SELECT * FROM usuario"
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
                          <li><a href=""><i class="fas fa-plus-square"></i>.Añadir formacion</a></li>
                          <li><a href=""><i class="fas fa-minus-square"></i>.Eliminar </a></li>
                          <li><a href="../crear/CrearFicha.php"><i class="fas fa-plus-square"></i>.Agregar Grupo Formativo</a></li>
                          <li><a href="eliminaFicha.php"><i class="fas fa-minus-square"></i>.Eliminar Grupo </a></li>
                        </ul>
                    </li>
                </ul>
                    

                  

            </div>   
            
        </div>

        <div class="form">
            <form class="formula" action="" method="POST">
                <p>MODIFICAR USUARIO</p>
    

                <table class="tabla">
                <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Celular</th>
                    <th>fijo</th>
                    <th>Direccion</th>
                    <th>Correo Misena</th>

                    <th>OPERACION</th>
                </tr>
                </thead>
                <tbody>
                <?php $resultado = mysqli_query($conexion, $usuarios);
                while($row=mysqli_fetch_assoc($resultado))  {?>
                <tr>
                    <td><?php echo $row["docu"];?></td>
                    <td><?php echo $row["nombres"];?></td>
                    <td><?php echo $row["apellidos"];?></td>
                    <td><?php echo $row["edad"];?></td>
                    <td><?php echo $row["celular"];?></td>
                    <td><?php echo $row["fijo"];?></td>
                    <td><?php echo $row["direccion"];?></td>
                    <td><?php echo $row["email"];?></td>


                <td class="table_item">
                    <a href="actualizar.php?id=<?php echo $row["docu"];?>" class="table_item">EDITAR</a>
                    <form class="table_item" action="../../../../php/bdeliminar.php" method="POST">
                        <input type="hidden" value="<?=$row["docu"]?>" name="docueli">
                        <button type="submit">ELIMINAR</button>
                    </form> 
                    
                </td>
                </tr>
                </tbody>
                    <!--<td><form action="actualizar.php" method="POST">
                        <input type="hidden" value="<?php //echo $row["docu"];?>" name="docuedit">
                        <button type="submit">EDITAR</button>-->
                                            
                <?php } mysqli_free_result($resultado) ?> 

            </form>
        </div>

           

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>

</html>