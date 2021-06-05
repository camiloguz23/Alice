<?php
    // cierra las sessiones
    session_start();
    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time()-3600, "/");
    }

    unset($_SESSION['id_user']);
    unset($_SESSION['tipousu']);
    $_SESSION = array();
    session_destroy();
    session_write_close();
    header("Location: ../index.html")
?>