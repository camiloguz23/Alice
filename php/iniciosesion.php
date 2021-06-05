
<?php
   
    if(!isset($_SESSION['id_user']) || !isset($_SESSION['tipousu']))
    {

        header("location: ../index.html");
        exit;
    }
?>