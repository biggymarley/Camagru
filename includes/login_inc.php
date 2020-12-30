<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["submit"])) {
        require_once('functions.php');
        $login = $_POST['username'];
        $passwd = $_POST['passwd'];
        emtyinput($login, $passwd);
        if ($row = checkmatch($db, $login, $login)) {
            if (!password_verify($passwd, $row['upwd'])) {
                header('location: ../login.php?error=notexist');
                exit();
            } else {
                session_start();
                $_SESSION['usersid'] = $row['usersid'];
                $_SESSION['uid'] = $row['uid'];
                header('location: ../index.php');
                return;
            }
        } else {
            header('location: ../login.php?error=notexist');
            exit();
        }
    } else
        header('location: ../login.php');
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
