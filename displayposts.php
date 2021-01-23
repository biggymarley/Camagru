<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usersid']) || !isset($_SESSION['uid'])) {
    header('location: ./login.php');
    return;
}
$id = $_SESSION['usersid'];
$uname = $_SESSION['uid'];
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ((isset($_POST['from']) && isset($_POST['to'])) && isset($_POST['save'])) {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $i = $_POST['save'];
        // echo "$from , $to";
        // sleep(9999999);
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
    include("display5posts.php");
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
