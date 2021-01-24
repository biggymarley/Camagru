<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if (!isset($_SESSION)) {
    session_start();
}
//     header('location: ./login.php');
//     return;
// }

if (isset($_SESSION) && isset($_SESSION['usersid']) &&  isset($_SESSION['uid'])) {
$id = $_SESSION['usersid'];
$uname = $_SESSION['uid'];
// $sql = "SELECT * FROM `postes` order by postusrid DESC LIMIT $from, $to ";
}
// else
// $sql = "SELECT * FROM `postes`";
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ((isset($_POST['from']) && isset($_POST['to']))) {
        $from = $_POST['from'];
        $to = $_POST['to'];
        if(isset($_POST['save']))
            $i = $_POST['save'];
    } else {
        $from = 0;
        $to = 4;
        $i = 1000;
    }

    $sql = "SELECT * FROM `postes` order by postusrid DESC LIMIT $from, $to ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $index = 0;
    $imgs = $stmt->fetchAll();
    if(!empty($imgs))
        include("display5posts.php");
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
