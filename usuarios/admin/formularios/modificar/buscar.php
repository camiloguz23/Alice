<?php
    include "../php/conexion.php";
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
                        <li><a href=""> CERRAR SESION</a></li>
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
                          <li><a href=""><i class="fas fa-plus-square"></i>.Añadir</a></li>
                          <li><a href=""><i class="fas fa-minus-square"></i>.Eliminar</a></li>
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
            <form class="formula" action="buscar_usuario.php" method="POST">

                <?php
                    $buscar = $_REQUEST['buscar'];
                    if(empty($buscar))
                    {
                        header("location: lista_usuario.php");
                    }
                ?>
                  <p>MODIFICAR USUARIO</p>
  
                  <div class="contenedor">
                      <div>
                          <label for="" class="texto">Documento</label>
                          <input type="text"><a href="#"><i class="fas fa-search"></i></a>
                      </div>
                      <div class="tabla">
                          <table class="datos">
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
                                  <div class="con">
                                      <td>CODIGO DE BARRAS</td>
                                  </div>
                              </tr>
                          </table>
                      </div>
                  <input type="submit" class="enviar" name="modificar" value="MODIFICAR">
              </form>
          </div>

        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>