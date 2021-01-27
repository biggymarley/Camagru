<?php
session_start();
if (!isset($_SESSION)) {
    header('location: ./login.php');
    return;
} else {
    $svname = "localhost";
    $user = "root";
    $pw = "root";
    $dbname = "Camagru_users";
    $dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
    try {
        require_once('./includes/functions.php');
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $login = trim($_POST['uid']);
        $passwd = $_POST['opw'];
        $email = trim($_POST['uemail']);
        $npw = $_POST['npw'];
        $vnpw = $_POST['vnpw'];
        if(isset($_POST['infoemail']))
            $infoemail = '1';
        else
            $infoemail = '0';
        if (empty($login) || empty($email) || empty($passwd)) {
            header('location: ./profile.php');
            return;
        }
        if ($_SESSION['uemail'] === $email && $_SESSION['uid'] === $login) {
            $row = [];
        } else {
            if ($_SESSION['uemail'] === $email) {
                $row = checkmatch($db, $login, $login);
            } else if ($_SESSION['uid'] === $login) {
                $row = checkmatch($db, $email, $email);
            } else
                $row = checkmatch($db, $login, $email);
        }
        if (empty($row)) {
            $sql = "SELECT upwd FROM users WHERE `usersid` LIKE {$_SESSION['usersid']}";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            if (!password_verify($passwd, $stmt->fetch()['upwd'])) {
                header('location: ./profile.php?error=oldpwinco');
                return;
            } else {
                $sql = "UPDATE users SET `uid`=:uid , uemail=:uemail ,infoemail=:infoemail WHERE `usersid` LIKE {$_SESSION['usersid']}";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':uid', $login);
                $stmt->bindValue(':uemail', $email);
                $stmt->bindValue(':infoemail', $infoemail);
                $stmt->execute();
                if (!empty($npw) && !empty($vnpw))
                {
                    if($npw !== $vnpw)
                    {
                        header('location: ./profile.php?error=pwdnomatch');
                        return;
                    }
                    $sql = "UPDATE users SET upwd=:upwd WHERE `usersid` LIKE {$_SESSION['usersid']}";
                    $stmt = $db->prepare($sql);
                    $hashpwd = password_hash($npw, PASSWORD_DEFAULT);
                    $stmt->bindValue(':upwd', $hashpwd);
                    $stmt->execute();
                }
                $_SESSION['uid'] = $login;
                $_SESSION['uemail'] = $email;
                $_SESSION['infoemail'] = $infoemail;
                include('./mail.php');
                header('location: ./profile.php?sucs=true');
                return;
            }
        } else{
            header('location: ./profile.php?error=loginm');
            return;
        }
    } catch (PDOException $e) {
        echo "DB ERROR: " . $e->getMessage();
    }
}
