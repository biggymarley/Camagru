<?php

session_start();
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
$id = $_SESSION['usersid'];
$cmt = $_POST['cmt'];
$pid = $_POST['pid'];


try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `comment` (cuid , pid, cmt) VALUES (:cuid, :pid, :cmt)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cuid', $id);
    $stmt->bindValue(':pid', $pid);
    $stmt->bindValue(':cmt', $cmt);
    $stmt->execute();
    header('location: ./index.php');
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
