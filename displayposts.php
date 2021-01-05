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
            echo "<a class='piclog'  href='./profile.php?username=$username'>$username</a>";
            echo "<div class='indisimg'>";
            echo "<img src='{$imgs['img']}' class='imgs' style='filter: {$style}'>";
            $slikes = "SELECT count(*) FROM `like` WHERE `pid` = {$imgs['postusrid']}";
            $stl = $db->prepare($slikes);
            $stl->execute();
            $likes = $stl->fetch()[0];
            echo "<div class='countlikes'>";
            echo "<span >$likes likes </span>";
            echo "<input  type='image'  class='likebtn' src='./img/unsaved.png'>";
            echo "</div>";
            echo "<div class='reactdiv'>";
            // echo "<form target='votar' id='likeform' method='POST' action='like.php'>";
            echo "<form class='likeform' method='POST' onsubmit='return likejs({$imgs['postusrid']})'>";
            $sql2 = "SELECT 1 FROM `like` WHERE `pid` = {$imgs['postusrid']} AND `likeid` = $id";
            $stmt3 = $db->prepare($sql2);
            $stmt3->execute();
            if(!empty($stmt3->fetch()))
            {
                echo "<input id='{$imgs['postusrid']}' type='image' alt='Submit' class='likebtn' src='./img/like.png' value='{$imgs['postusrid']}'>";
            }
            else{
                echo "<input id='{$imgs['postusrid']}' type='image' alt='Submit' class='likebtn' src='./img/unlike.png' value='{$imgs['postusrid']}' >";
            }
            // echo "<input id='{$imgs['postusrid']}' type='hidden' name='pid' value='{$imgs['postusrid']}'>";
            echo "</form>";
            echo "<form autocomplete='off'  class='cmtform' method='POST' action='cmt.php'>";
            echo "<input autocomplete='off' name='cmt' type='text'  placeholder='Add comment ...'  class='disinput' required>";
            echo "<input type='submit' class='disbut' value='POST' >";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    catch(PDOException $e)
    {
        echo "DB ERROR: " . $e->getMessage();
    }
