<?php
session_start();
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if (!empty($_POST['csrf']) && hash_equals($_SESSION['token'], $_POST['csrf'])) {
    include_once("./includes/functions.php");
    try {
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["submit"])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $npw = $_POST['npw'];
            $cnpw = $_POST['cnpw'];
            $email = $_POST['email'];
            $key = $_POST['key'];
            if(!empty($npw) && !empty($cnpw))
            {
                matchpass($npw, $cnpw, "./tools/forget_pw.php?key=".$key."&email=".$email);
                hardpwd($npw, "./tools/forget_pw.php?key=".$key."&email=".$email);
                $hashpwd = password_hash($npw, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET upwd = '$hashpwd' WHERE uemail='$email'";
                $db->exec($sql);
                $sql = "UPDATE users SET uvcode = 'null' WHERE uemail='$email'";
                $db->exec($sql);
                header('location: .././main/login.php?sucs=true');
                return;
            }
            header('location: .././main/login.php?error=fixpassword');
        }
        header('location: .././main/login.php');
        return;
    }
 catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
}
header('location: .././main/login.php');
return;