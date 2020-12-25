<?php

function emtyinput($login, $passwd)
{
    if (empty($login) && empty($passwd))
        header('location: ../login.php?error=loginpwd');
    elseif (empty($login))
        header('location: ../login.php?error=login');
    elseif (empty($passwd))
        header('location: ../login.php?error=pwd');
    else
        return;
    exit();
}

function emtySingupinput($login, $passwd, $email, $Rpasswd)
{
    if (empty($login))
        header('location: ../signup.php?error=login');
    elseif (empty($passwd))
        header('location: ../signup.php?error=pwd');
    elseif (empty($Rpasswd))
        header('location: ../signup.php?error=Rpwd');
    elseif (empty($email))
        header('location: ../signup.php?error=email');
    else
        return;
    exit();
}

function matchpass($passwd, $Rpasswd)
{
    if ($passwd !== $Rpasswd) {
        header('location: ../signup.php?error=pwdnomatch');
        exit();
    }
    return;
}


function checkmatch($conn, $login, $email)
{
    $sql = "SELECT * FROM users WHERE `uid` LIKE :uid OR `uemail` LIKE :uemail;";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':uid', $login);
    $stmt->bindValue(':uemail', $email);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row)
        return $row;
    else
        return false;
}

function addtodb($conn, $login, $email, $passwd)
{
        $sql = "INSERT INTO users (uid, uemail, upwd) VALUES (:uid, :uemail, :upwd);";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':uid', $login);
        $stmt->bindValue(':uemail', $email);
        $hashpwd = password_hash($passwd, PASSWORD_DEFAULT);
        $stmt->bindValue(':upwd', $hashpwd);
        $stmt->execute();
        header('location: ../login.php');
}

function checkemail($email)
{
    $pat = '/.+[@].+[.].+/';
    if (!preg_match($pat, $email)) {
        header('location: ../signup.php?error=fixemail');
        exit();
    } else
        return;
}

function hardpwd($passwd)
{
    $pat1 = '/(?=.*[a-z])/';
    $pat3 = '/(?=.*[A-Z])/';
    $pat4 = '/(?=.{8,})/';
    if (!preg_match($pat4, $passwd)) {
        header('location: ../signup.php?error=fixpwd');
        exit();
    } else if (!preg_match($pat3, $passwd)) {
        header('location: ../signup.php?error=fixpwd');
        exit();
    } else if (!preg_match($pat1, $passwd)) {
        header('location: ../signup.php?error=fixpwd');
        exit();
    } else
        return;
}
