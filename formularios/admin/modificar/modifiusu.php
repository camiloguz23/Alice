<?php
include ('conexion.php');
$usuarios = "SELECT * FROM usuario"
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
                        <li><a href=""> CERRAR SESION</a></li>
                    </ul>
                </div>

            </nav> 
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"> DIANA LUCIA</p>
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
                          <li><a href=""><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href=""><i class="fas fa-minus-square"></i>.Eliminar</a></li>
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
        <div class="container">
        <div class="table__header">Documento</div>
        <div class="table__header">Tipo usuario</div>
        <div class="table__header">Tipo documento</div>
        <div class="table__header">Nombre</div>
        <div class="table__header">Apellido</div>
        <div class="table__header">Edad</div>
        <div class="table__header">Celular</div>
        <div class="table__header">fijo</div>
        <div class="table__header">Direccion</div>
        <div class="table__header">Gmail</div>
        <div class="table__header">Contraseña</div>
        <?php $resultado = mysqli_query($conexion, $usuarios);
        while($row=mysqli_fetch_assoc($resultado))  {?>
            <div class="table__item"><?php echo $row["docu"];?></div>
            <div class="table__item"><?php echo $row["id_tip_usu"];?></div>
            <div class="table__item"><?php echo $row["id_tip_docu"];?></div>
            <div class="table__item"><?php echo $row["nombres"];?></div>
            <div class="table__item"><?php echo $row["apellidos"];?></div>
            <div class="table__item"><?php echo $row["edad"];?></div>
            <div class="table__item"><?php echo $row["celular"];?></div>
            <div class="table__item"><?php echo $row["fijo"];?></div>
            <div class="table__item"><?php echo $row["direccion"];?></div>
            <div class="table__item"><?php echo $row["email"];?></div>
            <div class="table__item"><?php echo $row["contra_seguridad"];?></div>
            <?php } mysqli_free_result($resultado) ?>
          </div>

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>