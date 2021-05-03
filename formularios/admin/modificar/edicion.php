<?php
include ('conexion.php');
$usuarios = "SELECT * FROM usuario"
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
        <link rel="shortcut icon" href="../../../assets/img/ashleylogo.png" type="image/x-icon">
    </head>
    <body>
        
        <header id="header">
            
            <nav class="menu">
               
                
                <div class="logo">
                    <img  height="60px" width="60px" src="../../../assets/img/logo_calendar.png" alt="">
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
                        <li><a href="../../../php/cerrar_sesion.php"> CERRAR SESION</a></li>
                    </ul>
                </div>

            </nav> 
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"> <?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" src= "../../../assets/img/logo_usuar.png" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li><a class="activ" href="#">INSTRUCTORES</a>
                      <ul class="sub">
                        <li><a href="../crear/crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../eliminar/EliminarUsu.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="modificar/ModifiUsu.html" class="active"><i class="fas fa-pen-square"></i>.Modificar</a></li>
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
            <form class="formula" action="" method="POST">
                  <p>MODIFICAR USUARIO</p>
                    <div class="contenedor">
                        <div>
                            <label for="" class="texto">Documento</label><br>
                            <input type="text"><i class="fas fa-search"></i>

        
                        </div>
                    </div>

        <div class="container container--edit">
            <div class="table__title--edit"></div>
            <table class="table">
            <thead>
             <tr>
                <th class="table__header">Documento</th>
                <th class="table__header">Nombre</th>
                <th class="table__header">Apellido</th>
                <th class="table__header">Edad</th>
                <th class="table__header">Celular</th>
                <th class="table__header">fijo</th>
                <th class="table__header">Direccion</th>
                <th class="table__header">Gmail</th>
                <th class="table__header">Contraseña</th>
                <th class="table__header">OPERACION</th>
             </tr>
            </thead>
            <tbody>
            <?php $resultado = mysqli_query($conexion, $usuarios);
            while($row=mysqli_fetch_assoc($resultado))  {?>
            <tr>
                <td class="table__item"><?php echo $row["docu"];?></td>
                <td class="table__item"><?php echo $row["nombres"];?></td>
                <td class="table__item"><?php echo $row["apellidos"];?></td>
                <td class="table__item"><?php echo $row["edad"];?></td>
                <td class="table__item"><?php echo $row["celular"];?></td>
                <td class="table__item"><?php echo $row["fijo"];?></td>
                <td class="table__item"><?php echo $row["direccion"];?></td>
                <td class="table__item"><?php echo $row["email"];?></td>
                <td class="table__item"><?php echo $row["contra_seguridad"];?></td>
            <td class="table_item">
                <a href="actualizar.php?id=<?php echo $row["docu"];?>" class="table_item">EDITAR</a>
            </td>
            </tr>
            </tbody>
         <!--<td><form action="actualizar.php" method="POST">
                    <input type="hidden" value="<?php //echo $row["docu"];?>" name="docuedit">
                    <button type="submit">EDITAR</button>-->
                                        
            <?php } mysqli_free_result($resultado) ?> 
          </div>

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>
