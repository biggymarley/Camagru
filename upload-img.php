<?php
session_start();
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if(isset($_SESSION['uid']))
{
$id = $_SESSION['usersid'];
$img = $_POST['imgsrc'];
$style = $_POST['styleimg'];
if (!empty($img))
{
    try{
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `postes` (`postesid`, `imgstyle`, `img`) VALUE (:pid, :ist, :img)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':pid', $id);
        $stmt->bindValue(':ist', $style);
        $stmt->bindValue(':img', $img);
        $stmt->execute();
        unset($_SESSION['editimg']);
        header('location: ../imglab.php');
        return;
    }
    catch(PDOException $e)
    {
        echo "DB ERROR: " . $e->getMessage();
    }
}
    header('location: ./imglab.php');
    return;
}
else
{
    header('location: ./index.php');
    return;
}








