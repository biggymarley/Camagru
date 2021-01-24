<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
session_start();
if (!empty($_POST['csrf']) && hash_equals($_SESSION['token'], $_POST['csrf']))
{
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["submit"])) {
        $img =  $_FILES['img']['tmp_name'];
        $splited = explode(".", $_FILES['img']['name']);
        $ext = end($splited);
        require_once('functions.php');
        $login = trim($_POST['username']);
        $passwd = $_POST['passwd'];
        $email = trim($_POST['email']);
        $Rpasswd = $_POST['Rpasswd'];
        emtySingupinput($login, $passwd, $email, $Rpasswd);
        if ($rows = checkmatch($db, $login, $email)) {
            if ($rows['uid'] === $login) {
                header('location: ../signup.php?error=loginm');
                exit();
            } elseif ($rows['uemail'] === $email) {
                header('location: ../signup.php?error=emailm');
                exit();
            }
        }
        $newimgname = $login.".".$ext;
        $path = "../up/".$newimgname;
        if(file_exists($path)) unlink($path);
        move_uploaded_file($img, $path);
        $baseimg = base64_encode(file_get_contents($path));
        matchpass($passwd, $Rpasswd);
        checkemail($email);
        hardpwd($passwd);
        addtodb($db, $login, $email, $passwd, $baseimg);
    } else
        header('location: ../index.php');
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
} else
{
    header('location: ../signup.php');
    return;
}