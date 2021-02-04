<?php
if (!empty($_GET)) {

    if (!empty($_GET['key']))
        $key = $_GET['key'];
    if (!empty($_GET['email']))
        $email = $_GET['email'];
        $svname = "localhost";
        $user = "root";
        $pw = "root";
        $dbname = "Camagru_users";
        $dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
        try {
            $db = new PDO($dsn, $user, $pw);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT uemail FROM users WHERE uvcode = '$key'";
            $st = $db->prepare($sql);
            $st->execute();
            $check = $st->fetch()['uemail'];
            if($check === $email)
            {
                $sql = "UPDATE users SET accountstatus = 1 WHERE uemail = '$check'";
                $db->exec($sql);
                include("./tools/valid.html");
            }
            else
            {
                header('location: .././main/login.php');
                return;
            }

        }
        catch (PDOException $e) {
            echo "DB ERROR: " . $e->getMessage();
            return;
        }
    
} else {
    header('location: .././main/login.php');
    return;
}

?>

