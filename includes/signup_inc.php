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
        matchpass($passwd, $Rpasswd);
        checkemail($email);
        hardpwd($passwd);
        addtodb($db, $login, $email, $passwd);
    } else
        header('location: ../signup.php');
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
