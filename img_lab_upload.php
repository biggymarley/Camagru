<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
session_start();
if(isset($_SESSION) && isset($_SESSION['uid']) && isset($_SESSION['usersid']))
{
    $id = $_SESSION['usersid'];
    $login = $_SESSION['uid'];
}
else
    {
        header('location: ../profile.php');
        return;
    }
try {
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["submit"])) {
        $img =  $_FILES['img']['tmp_name'];
        $splited = explode(".", $_FILES['img']['name']);
        $ext = end($splited);
        $newimgname = $login.".".$ext;
        $path = "./up/".$newimgname;
        if(file_exists($path)) unlink($path);
        move_uploaded_file($img, $path);
        $baseimg = base64_encode(file_get_contents($path));
        $_SESSION['editimg'] = $baseimg;
        header('location: ../imglab.php');
    }

} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
