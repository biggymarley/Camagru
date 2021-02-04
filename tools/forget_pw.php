<?php
if(!isset($_SESSION))
{
    session_start();
}
if(empty($_SESSION['token']))
{
   $randomtoken = bin2hex(random_bytes(32));
   $_SESSION['token'] = $randomtoken;
}

if(!empty($_GET))
{
    if(!empty($_GET['key']) && !empty($_GET['email']))
    {
        $key = $_GET['key'];
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
               
                include('./new_pw.html');
                return;
            }
            else
            {
                include("./tools/request_pw.html");
                return;
            }
        }
        catch (PDOException $e) {
            echo "DB ERROR: " . $e->getMessage();
            return;
        }
       
    }
}
include("./tools/request_pw.html");
include("./tools/errors.php");
?>
