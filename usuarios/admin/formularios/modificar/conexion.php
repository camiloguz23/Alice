<?php
  $conexion = mysqli_connect("localhost", "root", "", "alice");
  if (!$conexion) {
      echo 'error al conectarse a la base de datos';
  }
  
  else {
      echo 'conectado a la base de datos';
  }
  ?>
?>
