<?php
        session_start();
        $_SESSION['logat'] = 'I';
        session_unset();
        session_destroy();
        header("Location:Home.php");
?>