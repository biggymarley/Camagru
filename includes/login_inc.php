<?php

session_start();
if (!empty($_POST['csrf']) && hash_equals($_SESSION['token'], $_POST['csrf']))
{
    $svname = "localhost";
    $user = "root";
    $pw = "root";
    $dbname = "Camagru_users";
    $dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
    try {
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["submit"])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            require_once('functions.php');
            $login = $_POST['username'];
            $pat = '/\%/';
            $login = preg_replace($pat, '', $login);
            $passwd = $_POST['passwd'];
            emtyinput($login, $passwd);
            if ($row = checkmatch($db, $login, $login)) {
                if (!password_verify($passwd, $row['upwd'])) {
                    header('location: ../login.php?error=notexist');
                    exit();
                } else {
                    if($row['accountstatus'] === '1')
                    {
                        $_SESSION['usersid'] = $row['usersid'];
                        $_SESSION['uid'] = $row['uid'];
                        $_SESSION['uimg'] = $row['uimg'];
                        $_SESSION['uemail'] = $row['uemail'];
                        $_SESSION['infoemail'] = $row['infoemail'];
                        header('location: ../index.php');
                        return;
                    }
                    else
                    {
                        header('location: ../login.php?error=notveri');
                        return;
                    }
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
}else{
    header('location: ../login.php');
    return;
}
