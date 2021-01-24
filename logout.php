<?php
    session_start();
    unset($_SESSION['mode']);
    unset($_SESSION['token']);
    session_destroy();
    header('location: ./login.php');
?>