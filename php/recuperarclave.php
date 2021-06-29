<?php
require_once("conexion.php");
?>
<!--recuperar clave-->
<?php
 session_start();
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1"))
{
    $clave = $_POST['clave'];

    if($_POST['clave'] == "" || $_POST['clave2'] == "" )
    {
        echo '<script>alert ("Campos vacios no ingreso ningun dato");</script>';
        echo '<script>window.location="recuperarclave.php"</script>';
    }     
    else
    {

        $doc = $_SESSION['docu'];
        $emai = $_SESSION['email'];
        $insertSQL =  "UPDATE usuario SET contra_seguridad = '$clave' WHERE docu = '$doc' and email = '$emai'";
        mysqli_query($bdmysqli, $insertSQL);

        echo '<script>alert ("El cambio de clave se realizo exitosamente");</script>';
        echo '<script>window.location="../index.html"</script>';
    }


}
?>

<!--verificar usuario-->
<?php

 if($_POST["iniciar"])
 {
    $docu = $_POST["docu"];
    $email = $_POST["email"];

    $recuperarclave= "SELECT * from usuario where docu = '$docu' and email = '$email'";
    $consul = mysqli_query($bdmysqli,$recuperarclave);
    $fil=mysqli_fetch_assoc($consul);

    if($fil){
        $_SESSION['docu'] = $fil['docu'];
        $_SESSION['email'] = $fil['email'];
?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>INGRESO</title>
            <link rel="stylesheet" href="../css/estilo.css">
        </head>
        <body>

            <header id="header">
                <nav class="menu">
                    <div class="logo">
                        <img width="60" height="60" src="../assets/img/logo.png" alt="Logo Sena" class="logosena">
                        <img width="150" height="55" src="../assets/img/ashleylogo2.png" alt="Logo Proyecto" class="logoproyecto">
                    </div>

                    <div class="list-container">

                        <ul class="lists">
                            <li><a href="../index.html" >INICIO</a></li><br>    
                            <li><a href="about.html">ACERCA DE</a></li> <br>
                            <li><a href="contact.html">CONTACTENOS</a></li> <br>
                        </ul>

                        <ul>
                            <li class="botones">
                                <p   class="fecha" href="#">
                                    <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                                    var f=new Date();
                                    document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                    </script>
                                </p>
                                <p style="text-align: right;" class="version"> VERSION 1.0</p>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="login-box">
                    <div class="inicioSesion" id="inicioSesion">
                        <h1>RECUPERAR CLAVE</h1>
            
                        <form  method="POST" name="form1" id="form1" autocomplete="off">
                            <!--USERNAME INPUT-->
                            <label for="username">NUEVA CLAVE</label>

                            <input type="password" name="clave" id="clave" placeholder="Nueva Clave" required>
                            <!--PASSWORD INPUT-->
                            <label for="password">CONFIRMAR CLAVE</label>
                            <input type="password" name="clave2" id="clave2" placeholder="Confirmar Clave" required>

                            <input type="submit" name="inicio" id="inicio" value="Cambiar">
                            <input type="hidden" name="MM_update" value="form1"/>

                        </form>
                    </div>             
                </div>


                <div class="logo">
                    <img src="../assets/img/ashleylogo.png" alt="">
                    <p>CALENDARIO SISTEMATICO PARA ASIGNACION DE INSTRUCTORES A LOS AMBIENTES DE FORMACION</p>
                </div>
            </header> 
   

            <script src="https://kit.fontawesome.com/7b875e4198.js" crossorigin="anonymous"></script>
        </body>

    </html>
<?php
}
else
{
    echo '<script>alert ("Los datos ingresados no se encuentran en la base de datos");</script>';
    echo '<script>window.location="../html/clave.html"</script>';
}}
?>

