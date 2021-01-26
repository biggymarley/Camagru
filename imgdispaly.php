<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
$id = $_SESSION['usersid'];
    try{
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `postes` WHERE `postesid` LIKE $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while($imgs = $stmt->fetch())
        {
            $style = $imgs['imgstyle'];
            echo "<img src='{$imgs['img']}' class='imgs' style='filter: {$style}' onclick='deleteimg({$imgs['postusrid']}, `{$_SESSION['token']}`)'>";
        }
    }
    catch(PDOException $e)
    {
        echo "DB ERROR: " . $e->getMessage();
    }
