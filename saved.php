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
        $sql = "SELECT 1 FROM `saved` WHERE `pid` = $likeid AND `savedid` = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        if(!empty($stmt->fetch()))
        {
            $sql = "DELETE FROM `saved` WHERE `pid` = $likeid AND `savedid` = $id";
            $db->exec($sql);
            echo "unsaved";
        }
        else
        {
                $sql = "INSERT INTO `saved` (`savedid` , `pid`) VALUES (:savedid , :pid)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':savedid' , $id);
                $stmt->bindValue(':pid' , $likeid);
                $stmt->execute();
                echo "saved";
            }
    }
    catch(PDOException $e)
    {
        echo "DB ERROR: " . $e->getMessage();
    }