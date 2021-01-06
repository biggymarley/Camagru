<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if (!isset($_SESSION['usersid']) || !isset($_GET))
    header('location: ./index.php');
if (isset($_GET)) {
    if (!empty($_GET['username'])) {
        $uid = $_GET['username'];
        $db = new PDO($dsn, $user, $pw);
        $sql = "SELECT `usersid` FROM `users` WHERE `uid` LIKE '$uid'";
        $stmt1 = $db->prepare($sql);
        $stmt1->execute();
        $id = $stmt1->fetch()['usersid'];
        if(!$id)
        {
            echo "USER NOT FOUND";
            return;
        }
    }
    else{
        $id = $_SESSION['usersid'];
    }
} else
    $id = $_SESSION['usersid'];

    echo "<div class='useredit'>";
    if(!isset($uid) || $uid === $_SESSION['uid'])
    {
        echo "<h2 id='puname'>{$_SESSION['uid']}</h2>";
        echo "<button class='buteditinfo' >Edit Profile</button>";
        // echo "<input type='image' id='addbut' src='./img/add.png'>";
    }
    else
        echo "<h2 id='puname'>{$uid}</h2>";
        $db = new PDO($dsn, $user, $pw);
        $sql = "SELECT count(*) FROM `postes` WHERE `postesid` LIKE $id";
        $st = $db->prepare($sql);
        $st->execute();
        $c = $st->fetch()[0];
        echo "$c :postes";
        if(!isset($uid) || $uid === $_SESSION['uid'])
        {
            echo "<form class='addform' action='./imglab.php' method='none'>";
            echo "<input type='image' id='addbut' src='./img/add.png'>";
            echo "</form>";
        }
        echo "</div>";
        if(!isset($uid) || $uid === $_SESSION['uid'])
        {
            echo "<div class='selectimgs'>";
            echo "<a id='pb' type='button' class='selectbut' value='Postes' href='/profile.php?postes=s'>Postes</a>";
            echo "<a id='lb' type='button' class='selectbut' value='Liked' href='/profile.php?liked=s'>Liked</a>";
            echo "<a id='sb'type='button'  class='selectbut' value='Saved' href='/profile.php?saved=s'>Saved</a>";
            echo "</div>";
        }
        if (isset($_GET['liked']))
            include 'showlimgs.php';
        else if (isset($_GET['saved']))
            include 'showsimgs.php';
        else
        include 'showpimgs.php';
