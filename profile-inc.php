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
        $sql = "SELECT * FROM `users` WHERE `uid` LIKE '$uid'";
        $stmt1 = $db->prepare($sql);
        $stmt1->execute();
        $all = $stmt1->fetchAll();
        $id = $all[0]['usersid'];
        $uimg = $all[0]['uimg'];
        if(!$id)
        {
            echo "USER NOT FOUND";
            return;
        }
    }
    else{
        $id = $_SESSION['usersid'];
        $uimg = $_SESSION['uimg'];
    }
} else
{
    $id = $_SESSION['usersid'];
    $uimg = $_SESSION['uimg'];
}

    echo "<div class='useredit'>";
    echo "<div class='uimgdiv'>";
    if(empty($uimg))
        echo "<img class='prfimg' src='./img/user.png' />";
    else
        echo "<img class='prfimg' src='data:image/png;base64, $uimg' />";
        if(!isset($uid) || $uid === $_SESSION['uid'])
        {
            echo "<form autocomplete='off' action='upload_to_pdp.php' method='post' enctype='multipart/form-data'>";
            echo "</br><input id='chose' class='buteditinfo' type='file' name='img' required hidden></br></br>";
            echo "<label for='chose' class='editlabel'>Click to Choose New PDP</label></br></br>";
            echo "<input class='buteditinfo' type='submit' name='submit' value='Edit ur PDP'/></br>";
            echo "</form>";
        } 
    echo "</div>";
    if(!isset($uid) || $uid === $_SESSION['uid'])
    {
        echo "<span id='puname'>{$_SESSION['uid']}</span>";
        echo "<button id='showeditdiv' class='buteditinfo' >Edit Profile</button>";
    }
    else
        echo "<span id='puname'>{$uid}</span>";
        $db = new PDO($dsn, $user, $pw);
        $sql = "SELECT count(*) FROM `postes` WHERE `postesid` LIKE $id";
        $st = $db->prepare($sql);
        $st->execute();
        $c = $st->fetch()[0];
        echo "<span>$c :postes</span>";
        if(!isset($uid) || $uid === $_SESSION['uid'])
        {
            echo "<form class='addform' action='./imglab.php' method='none'>";
            echo "<input type='image' id='addbut' src='./img/add.png'>";
            echo "</form>";
        }
        echo "</div>";
        if(!isset($uid) || $uid === $_SESSION['uid'])
        {
            echo "<div id='editdiv' class='divedit'>";
            echo "<div class='inlab2'>";
            echo "<span class='edlab'>Username :</span>";
            echo "<input class='editinput' type='text' required>";
            echo "</div>";
            echo "<div class='inlab2'>";
            echo "<span class='edlab'>Email :</span>";
            echo "<input class='editinput' type='text' required>";
            echo "</div>";  echo "<div class='inlab2'>";
            echo "<span class='edlab'>Old Password :</span>";
            echo "<input class='editinput' type='text' required>";
            echo "</div>";
            echo "<div class='inlab2'>";
            echo "<span class='edlab'>New Password :</span>";
            echo "<input class='editinput' type='text' required>";
            echo "</div>";
            echo "<button  class='buteditinfo' >Apply new Settings</button>";
            echo "</div>";
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
