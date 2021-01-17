<?php
    session_start();
    unset($_SESSION['mode']);
    session_destroy();
    header('location: ./login.php');
?>