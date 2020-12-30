<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
$id = $_SESSION['usersid'];
$uname = $_SESSION['uid'];
    try{
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `postes`";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while($imgs = $stmt->fetch())
        {
            $style = $imgs['imgstyle'];
            $pid = $imgs['postesid'];
            $sql = "SELECT `uid` FROM `users` WHERE `usersid` LIKE $pid";
            $stmt2 = $db->prepare($sql);
            $uid = $stmt2->execute();
            $username = $stmt2->fetch()['uid'];
            echo "<div id='posts'>";
            echo "<p class='piclog' >$username</p>";
            echo "<div class='indisimg'>";
            echo "<img src='{$imgs['img']}' class='imgs' style='filter: {$style}'>";
            echo "<div class='reactdiv'>";
            echo "<img id='zaban' class='likebtn' src='./img/unlike.png' onclick='like(this.src)'>";
            echo "<input type='text'  placeholder='Add comment ...'  class='disinput' required>";
            echo "<input type='button' class='disbut' value='POST' >";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    catch(PDOException $e)
    {
        echo "DB ERROR: " . $e->getMessage();
    }
