<?php

session_start();
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$id = $_SESSION['usersid'];
$cmt = trim($_POST['cmt']);
$pid = $_POST['pid'];
if(!empty($cmt))
{
    try {
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `comment` (cuid , pid, cmt) VALUES (:cuid, :pid, :cmt)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':cuid', $id);
        $stmt->bindValue(':pid', $pid);
        $stmt->bindValue(':cmt', $cmt);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "DB ERROR: " . $e->getMessage();
    }
    
}