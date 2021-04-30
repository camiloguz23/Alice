<?php
require_once ("../../../php/conexion.php");

$consulta = "SELECT usuario.docu,usuario.nombres,usuario.apellidos,usuario.direccion,tipousu.nom_tip_usu,titul_academ.nom_titu,especializacion.nom_esp from usuario,tipousu,titul_academ,especializacion,detalle_p_e WHERE usuario.id_tip_usu=tipousu.id_tip_usu and usuario.docu = detalle_p_e.docu and detalle_p_e.id_titu=titul_academ.id_titu and detalle_p_e.id_esp= especializacion.id_esp";
$delete = mysqli_query($bdmysqli,$consulta);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADIMINSTRADOR</title>
        <link rel="stylesheet" href="eliminar.css">
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
                        <li><a href="EliminarUsu.php" class="active"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="ModifiUsu.html"><i class="fas fa-pen-square"></i>.Modificar</a></li>
                      </ul>
                    </li>
                </ul>

                <ul class="acor">                    
                    <li><a href="#">AMBIENTES</a>
                        <ul class="sub">
                          <li><a href="../crear/crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href="../modificar/modificarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                          <li><a href="../modificar/modificarAmbi.php"><i class="fas fa-pen-square"></i>.Modificar</a></li>
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

                <p>ELIMINAR USUARIO</p>

        
                    </div>

                        <table class="tabla">
                            <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre  y apellido</th>
                                <th>Direccion</th>
                                <th>Tipo de usuario</th>
                                <th>Titulo Academico</th>
                                <th>Especializacion</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($delete as $elim){
                                ?> <tr>
                                    <td><?=$elim["docu"]?></td>
                                    <td><?=$elim["nombres"]?> <?=$elim["apellidos"]?></td>
                                    <td><?=$elim["direccion"]?></td>
                                    <td><?=$elim["nom_tip_usu"]?></td>
                                    <td><?=$elim["nom_titu"]?></td>
                                    <td><?=$elim["nom_esp"]?></td>
                                    <td><form action="" method="POST">
                                            <input type="hidden" value="<?=$elim["docu"]?>">
                                            <button type="submit">Eliminar</button>
                                        </form> </td>
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
