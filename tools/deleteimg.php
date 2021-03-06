<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
session_start();
if(!empty($_SESSION['usersid']) || (!empty($_GET['tok']) && hash_equals($_SESSION['token'], $_GET['tok'])))
{
    $id = $_SESSION['usersid'];
    $imgid = $_GET['id'];
    try{
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `postes` WHERE `postusrid` = $imgid";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        header('location: ../main/imglab.php');
    }
    catch(PDOException $e)
    {
        echo "DB ERROR: " . $e->getMessage();
    }
}
else
{
    header('location: ../index.php');
    return;
}
