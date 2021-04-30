<?php
require_once ("../../../php/conexion.php");

$ambi = "select id_amb,nom_amb,nom_nave from ambiente,naves where ambiente.id_naves=naves.id_naves";
$consul = mysqli_query($bdmysqli,$ambi);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADIMINSTRADOR</title>
        <link rel="stylesheet" href="modifiAm.css">
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
                <ul class="acor">
                    <li><a  href="#">INSTRUCTORES</a>
                      <ul class="sub">
                        <li><a href="../crear/crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../eliminar/EliminarUsu.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="ModifiUsu.html"><i class="fas fa-pen-square"></i>.Modificar</a></li>
                      </ul>
                    </li>
                </ul>

                <ul class="acorh">                    
                    <li><a class="activ"  href="#">AMBIENTES</a>
                        <ul class="sub">
                          <li><a href="../crear/crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href="modificarAmbi.php" class="active"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                          <li><a href="" ><i class="fas fa-pen-square"></i>.Modificar</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="acor">
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

                <p>ELIMINAR AMBIENTES</p>

            <table class="tabla">

                <thead>
                <tr>
                    <th>N° Ambiente</th>
                    <th>Nombre del ambiente</th>
                    <th>Nave</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($consul as $ambiente){
                    ?> <tr>
                        <td><?=$ambiente["id_amb"]?></td>
                        <td><?=$ambiente["nom_amb"]?></td>
                        <td><?=$ambiente["nom_nave"]?></td>
                        <td><form action="" method="POST">
                                <input type="hidden" value="<?=$ambiente["id_amb"]?>">
                                <button type="submit">Eliminar</button>
                            </form> </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
  


        </div>
                
        <div class="form">
          <form class="formula" action="" method="POST">
                <p>ELIMINAR USUARIO</p>

                <div class="contenedor">
                    <div>
                        <label for="" class="texto">Documento</label><br>
                        <input type="text"><i class="fas fa-search"></i>

        
                    </div>
                    <div class="tabla">
                        <table class="datos"">
                            <tr class="nn">
                                <div class="contenedor">
                                    <div>
                                        <td>NOMBRES</td>
                                    </div>
                                    <div>
                                        <td>APELLIDOS</td>
                                    </div>
                                </div>
                                <div class="contened">
                                    <td>EDAD</td>
                                    <td>CELULAR</td>
                                    <td>FIJO</td>	
                                </div>
                                <div class="contend"> 
                                    <td>DIRECCION</td>	
                                </div>
                                <div>
                                    <td>TIPO DE USUARIO</td>
                                    <td>TIPO DE DOCUMENTO</td>    
                                </div>
                                <div class="conten">
                                    <td>CORREO</td>
                                </div>
                                <div class="conte">
                                    <td>CLAVE DE SEGURIDAD</td>
                                    <td>TITULO PROFECIONAL</td>
                                    <td>ESPECIALIZACION</td>
                                </div>
                                <div class="con">
                                    <td>CODIGO DE BARRAS</td>
                                </div>
                            </tr>
                        </table>
                    </div>
                <input type="submit" class="enviar" name="ELIMINAR" value="Eliminar">
            </form>
        </div>


        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>
