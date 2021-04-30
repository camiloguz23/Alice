<?php
  $hostname="localhost";
  $userName="root";
  $password= "";
  $database="alice";
  $bdmysqli = new mysqli($hostname,$userName,$password,$database);

  if($bdmysqli ->connect_errno)
  {
    die("fallo la conexion con la base de datos $database" . mysqli_connect_errno());
  }
  session_start();

?>

