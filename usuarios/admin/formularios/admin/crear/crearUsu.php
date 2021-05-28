<?php
require_once ("../../../../../php/conexion.php");

$sql = "SELECT * from tipousu";
$usuario = mysqli_query($bdmysqli,$sql);
?>

<?php
$sql2 = "SELECT * from tipodocu";
$documen = mysqli_query($bdmysqli,$sql2);
?>

<?php
$sql3 = "SELECT * from titul_academ";
$titulo = mysqli_query($bdmysqli,$sql3);
?>

<?php
$sql4 = "SELECT * from especializacion";
$especial = mysqli_query($bdmysqli,$sql4);
?>
<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../../../../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADIMINSTRADOR</title>
        <link rel="stylesheet" href="crear.css">
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

            <a href="../../../../../php/conexion.php"></a>
        
        </header> 
        <hr>
        <div class="menu2"> 
            <div class="uno">
                <p class= "admin"><?=$_SESSION["nombre"]?> <?=$_SESSION["apellido"]?></p>
                <img  height="70px" widih="70px" src= "../../../../../assets/img/logo_usuar.png" alt="">
            </div>
            <div class="listaa">
                <ul class="acorh">
                    <li ><a class="activ" href="#">USUARIOS</a>
                      <ul class="sub">
                        <li><a href="crearUsu.php" class="active"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../eliminar/EliminarUsu.php" ><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="../modificar/edicion.php"><i class="fas fa-pen-square"></i>.Modificar</a></li>

                      </ul>
                    </li>
                </ul>
                  
                <ul class="acor">                    
                    <li><a href="#">AMBIENTES</a>
                        <ul class="sub">
                          <li><a href="crearAmbien.php"><i class="fas fa-plus-square"></i>.Añadir</a></li>
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
          <form class="formula" action="../../../../../php/crearUsuario.php" method="POST">
            <p>NUEVO USUARIO</p>
            <div class="conten">

                <div class=" tipo">
                    <label for="" class="texto">Tipo Usuario</label><br>
                    <select  name="tipousu" required >
                        <option value="">Seleccione </option>
                        <?php
                        foreach ($usuario as $tipoUsu){
                            ?> <option value="<?=$tipoUsu['id_tip_usu']?>"><?=$tipoUsu['nom_tip_usu']?></option>
                        <?php
                        }
                        ?>
                    </select>                            


                </div>

                <div>
                    <label  class="texto">Tipo Documento</label><br>
                    <select name="tipodocu" required >
                        <option value="">Seleccione </option>
                        <?php
                        foreach ($documen as $tipDocu){
                            ?> <option value="<?=$tipDocu['id_tip_docu']?>"><?=$tipDocu['nom_tip_docu']?></option>
                        <?php
                        }
                        ?>
                    </select>                            


                </div>

            </div>


            <div class="contenedor">
                <div>
                    <label for="" class="texto">Documento</label><br>
                    <input type="number" name="documento" required  autocomplete="off">
    
                </div>
                <div>
                    <label for="" class="texto">Nombre</label><br>
                    <input type="text" name="nombre" required  autocomplete="off">
    
                </div>
    
                <div>
                    <label for="" class="texto">Apellido</label><br>
                    <input type="text" name="apellido" required  autocomplete="off">
    
                </div>
    
                <div>
                    <label for="" class="texto">Edad</label><br>
                    <input type="number" name="edad" min="17" max="100" required  autocomplete="off">
    
                </div>
    
                <div>
                    <label for="" class="texto">Celular</label><br>
                    <input type="text" name="celular" minlength="10" maxlength="10" required  autocomplete="off">
    
                </div>
    
                <div>
                    <label for="" class="texto">Fijo</label><br>
                    <input type="text" name="fijo" minlength="8" maxlength="10" required  autocomplete="off">
    
                </div> 

            </div>

            <div class="contened">
                <div class="direccion">
                    <label for="" class="texto">Direccion</label><br>
                    <input type="text" name="direccion" required  autocomplete="off">
    
                </div>


            </div>


            <div class="conte">
                <div>
                    <label for="" class="texto">Correo</label><br>
                    <input id="email" type="email" name="correo" required  autocomplete="off">
                    <span class="error" aria-live="polite"></span>
    
                </div>
    
                <div>
                    <label  class="texto">Clave de seguridad</label><br>
                    <input type="password" name="clave" required  autocomplete="off">
    
                </div>
            </div>

            <div class="cont">
                <div>
                    <label  class="texto">titulo academico</label><br>
                    <select required name="tituloacade" >
                        <option value="">Seleccione </option>
                        <?php
                        foreach ($titulo as $titulacad){
                            ?> <option value="<?=$titulacad['id_titu']?>"><?=$titulacad['nom_titu']?></option>
                        <?php
                        }
                        ?>
                    </select>                            

    
                </div>
                <div>
                    <label  class="texto">Especializacion</label><br>
                    <select name="especializacion" required>
                        <option value="" >Seleccione </option>
                        <?php
                        foreach ($especial as $especializacion){
                            ?> <option value="<?=$especializacion['id_esp']?>"><?=$especializacion['nom_esp']?></option>
                        <?php
                        }
                        ?>
                    </select>                            

    
                </div> 

            </div>
              
            <input type="submit" class="enviar" name="enviar" value="Enviar">
        </form>
  </div>
        
        <script src="../modificar/validar.js"></script>
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>