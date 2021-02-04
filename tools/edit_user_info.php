<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../main/login.php');
    return;
} else {
    $svname = "localhost";
    $user = "root";
    $pw = "root";
    $dbname = "Camagru_users";
    $dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
    try {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        require_once('../includes/functions.php');
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $login = trim($_POST['uid']);
        $passwd = $_POST['opw'];
        $email = trim($_POST['uemail']);
        $pat = '/\%/';
        $login = preg_replace($pat, '', $login);
        $email = preg_replace($pat, '', $email);
        $npw = $_POST['npw'];
        $vnpw = $_POST['vnpw'];
        if(isset($_POST['infoemail']))
            $infoemail = '1';
        else
            $infoemail = '0';
        if (empty($login) || empty($email) || empty($passwd)) {
            header('location: ../main/profile.php');
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
                header('location: ../main/profile.php?error=oldpwinco');
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
                        header('location: ../main/profile.php?error=pwdnomatch');
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
                $mess = '<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LETTER</title>
<style>
.buteditinfo
{
font-family: "Yanone Kaffeesatz", sans-serif;
font-size: 17px;
text-decoration: none;
border: 2px dotted gray;
color: #000000;
background-color: rgba(0, 162, 255, 0.678);
border-radius: 5px;
outline: none;
}   
</style>
</head>
<body>
<center>
<div style="width: 70%;height: 500px;border: 5px solid;">
</br></br></br></br>
<img style="width: 90px;height: 90px;" src="https://www.flaticon.com/svg/vstatic/svg/893/893292.svg?token=exp=1611684383~hmac=2e7f51ac033df662e93f4d9650850da8" />
</br></br></br></br>
<span>
Dear '.$_SESSION["uid"].'
</span>
</br>
<span>
We are Happy to inform you That You changed your profile infos
</span>
</br></br></br></br>
<a class="buteditinfo" href="http://192.168.99.104/">Go To Web Site</a>
</br></br></br></br>
</div>
</center>
</body>
</html>';
$subject = "Camagru : Profile Info has Been Updated";
                include('../tools/mail.php');
                header('location: ../main/profile.php?sucs=true');
                return;
            }
        } else{
            header('location: ../main/profile.php?error=loginm');
            return;
        }
    } catch (PDOException $e) {
        echo "DB ERROR: " . $e->getMessage();
    }
}
