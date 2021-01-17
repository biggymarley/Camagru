<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if(isset($_SESSION))
{
    if(!isset($_SESSION['usersid']) || !isset($_SESSION['uid']))
    {
        header('location: ./login.php');
        return;
    }
        $id = $_SESSION['usersid'];
        $uname = $_SESSION['uid'];
        try {
            $db = new PDO($dsn, $user, $pw);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `postes`";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $i = 1000;
            while ($imgs = $stmt->fetch()) {
                $style = $imgs['imgstyle'];
                $pid = $imgs['postusrid'] + 500;
                $lid = $imgs['postesid'];
                $sql = "SELECT * FROM `users` WHERE `usersid` LIKE $lid";
                $stmt2 = $db->prepare($sql);
                $uid = $stmt2->execute();
                $fetch = $stmt2->fetchAll();
                $username = $fetch[0]['uid'];
                $uimg = $fetch[0]['uimg'];
                echo "<div class='posts'>";
                echo "<div class='divpiclog'>";
                echo "<a href='./profile.php?username=$username'>";
                if(empty($uimg))
                echo "<img class='postpimg' src='./img/user.png' />";
            else
                echo "<img class='postpimg' src='data:image/png;base64, $uimg' />";
                echo "</a>";
                echo "<a class='piclog'  href='./profile.php?username=$username'>$username</a>";
                echo "</div>";
                echo "<div   class='indisimg'>";
                echo "<img src='{$imgs['img']}' data-id='{$imgs['postusrid']}' data-likeid='$pid' class='imgsp' style='filter: {$style}'>";
                echo "<img id='{$pid}'  src='./img/like.png' class='apprlike'>";
                $slikes = "SELECT count(*) FROM `like` WHERE `pid` = {$imgs['postusrid']}";
                $stl = $db->prepare($slikes);
                $stl->execute();
                $likes = $stl->fetch()[0];
                echo "<div class='countlikes'>";
                echo "<span name='$pid' >$likes likes </span>";
                echo "<form class='likeform' method='POST' onsubmit='return savedjs({$imgs['postusrid']}, $i)'>";
                $sql2 = "SELECT 1 FROM `saved` WHERE `pid` = {$imgs['postusrid']} AND `savedid` = $id";
                $stmt3 = $db->prepare($sql2);
                $stmt3->execute();
                if (!empty($stmt3->fetch())) {
                    echo "<input id='$i' type='image' alt='Submit' class='likebtn' src='./img/saved.png' value='{$imgs['postusrid']}'>";
                } else {
                    echo "<input id='$i' type='image' alt='Submit' class='likebtn' src='./img/unsaved.png' value='{$imgs['postusrid']}' >";
                }
                echo "</form>";
                echo "</div>";
                include "displaycmt.php";
                echo "<div class='reactdiv'>";
                echo "<form class='likeform' method='POST' onsubmit='return likejs({$imgs['postusrid']}, $pid)'>";
                $sql2 = "SELECT 1 FROM `like` WHERE `pid` = {$imgs['postusrid']} AND `likeid` = $id";
                $stmt3 = $db->prepare($sql2);
                $stmt3->execute();
                if (!empty($stmt3->fetch())) {
                    echo "<input id='{$imgs['postusrid']}' type='image' alt='Submit' class='likebtn' src='./img/like.png' value='{$imgs['postusrid']}'>";
                } else {
                    echo "<input id='{$imgs['postusrid']}' type='image' alt='Submit' class='likebtn' src='./img/unlike.png' value='{$imgs['postusrid']}' >";
                }
                echo "</form>";
                echo "<form autocomplete='off'  class='cmtform' method='POST' onsubmit='return cmtjs({$imgs['postusrid']}, $i)'>";
                // echo "<input id='' type='hidden' name='pid' value='{$imgs['postusrid']}'  >";
                echo "<input autocomplete='off' name='$i' type='text'  placeholder='Add comment ...'  class='disinput' required >";
                echo "<input type='submit' class='disbut' value='POST' >";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $i++;
            }
        } catch (PDOException $e) {
            echo "DB ERROR: " . $e->getMessage();
        }
}
else
    header('location: ./login.php');

