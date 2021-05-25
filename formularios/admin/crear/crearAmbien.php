<?php
session_start();
$validar = $_SESSION["id_user"];

if ($validar == "" || $validar == null){
    header("location: ../../index.html");
}
?>

<?php
require_once ("../../../php/conexion.php");

$sqli = "SELECT * from naves";
$ambien = mysqli_query($bdmysqli,$sqli);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADIMINSTRADOR</title>

        <link rel="stylesheet" href="crearAm.css">

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
                <p class= "admin">ASHLEY AGUDELO</p>
                <img  height="70px" widih="70px" src= "../../../assets/img/logo_usuar.png" alt="">
            </div>
            <div class="listaa">
                <ul class="acor">
                    <li><a href="#">INSTRUCTORES</a>
                      <ul class="sub">
                        <li><a href="crearUsu.php"><i class="fas fa-plus-square"></i>.Crear Nuevo</a></li>
                        <li><a href="../eliminar/EliminarUsu.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href="../modificar/ModifiUsu.php"><i class="fas fa-pen-square"></i>.Modificar</a></li>

                      </ul>
                    </li>
                </ul>
                <ul class="acorh">
                    <li ><a class="activ" href="#">AMBIENTES</a>
                      <ul class="sub">
                        <li><a href="crearAmbien.php"  class="active"><i class="fas fa-plus-square"></i>.Añadir</a></li>
                        <li><a href="../modificar/modificarAmbi.php"><i class="fas fa-minus-square"></i>.Eliminar</a></li>
                        <li><a href=""><i class="fas fa-pen-square"></i>.Modificar</a></li>
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
          <form class="formula" action="../../../php/crearAmbiente.php" method="POST">
            <p>NUEVO AMBIENTE DE FORMACION</p>

           

            <div class="contenedor">
                <div>
                    <label for="" class="texto"> Ambiente de formacion</label><br>
                    <input name="ambiente" type="text">
    
                </div>  

                <div class=" tipo">
                    <label for="" class="texto"> Nave</label><br>
                    <select name="nave">   
                        <option >Seleccione </option> 
                        <?php
                        foreach ($ambien as $naves){
                            ?> <option value="<?=$naves['id_naves']?>"><?=$naves['nom_nave']?></option>
                        <?php
                        }
                        ?>
                    </select>    
                </div>                        

            </div>
              
            <input type="submit" class="enviar" name="enviar" value="Enviar">
            
        </form>
  </div>
        
    
        <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>

    </body>
</html>

