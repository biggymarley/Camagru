<?php
session_start();
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
$id = $_SESSION['usersid'];
$likeid = $_POST['pid'];

    try{
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT 1 FROM `like` WHERE `pid` = $likeid AND `likeid` = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        if(!empty($stmt->fetch()))
        {
            $sql = "DELETE FROM `like` WHERE `pid` = $likeid AND `likeid` = $id";
            $db->exec($sql);
            echo "unlike";
        }
        else
        {
                $sql = "INSERT INTO `like` (`likeid` , `pid`) VALUES (:likeid , :pid)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':likeid' , $id);
                $stmt->bindValue(':pid' , $likeid);
                $stmt->execute();
                echo "like";
            }
    }
    catch(PDOException $e)
    {
        echo "DB ERROR: " . $e->getMessage();
    }