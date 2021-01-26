<?php
    session_start();
    if (!empty($_GET['tok']) && hash_equals($_SESSION['token'], $_GET['tok']))
    {
        unset($_SESSION['mode']);
        unset($_SESSION['token']);
        session_destroy();    
        header('location: ./login.php');
    }
    else    
        header('location: ./index.php');
?>