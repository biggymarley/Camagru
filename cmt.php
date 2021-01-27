<?php

session_start();

$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$id = $_SESSION['usersid'];
$cmt = trim($_POST['cmt']);
$pid = $_POST['pid'];
if (!empty($cmt)) {
    try {
        $db = new PDO($dsn, $user, $pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ///////////*/////// MAIL
        // include("mail.php");
        $headers = array(
            'MIME-Version' => '1.0',
            'Content-type' => 'text/html; charset=iso-8859-1',
            'From' => 'Camagru@Support.com'
        );
        $sql = "SELECT `uemail`, `uid` , `infoemail`  from users INNER JOIN  postes ON users.usersid = postes.postesid  WHERE postes.postusrid = $pid;";
        $em = $db->prepare($sql);
        $em->execute();
        $data = $em->fetchAll();
        $email = $data[0]['uemail'];
        $postowner = $data[0]['uid'];
        $infoemail = $data[0]['infoemail'];
    if($infoemail === '1' && $postowner !== $_SESSION['uid'] )
    {
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
    <div style="width: 70%;height: auto;border: 5px solid;">
    </br></br></br></br>
    <img style="width: 90px;height: 90px;" src="https://www.flaticon.com/svg/vstatic/svg/893/893292.svg?token=exp=1611684383~hmac=2e7f51ac033df662e93f4d9650850da8" />
    </br></br></br></br>
    <span>
    Dear '.$postowner.'
    </span>
    </br>
    <span>
    We are Happy to inform you That ** '.$_SESSION["uid"].' ** Comment on Your Picture
    </span>
    </br></br></br></br>
    <a class="buteditinfo" href="http://192.168.99.104/">Go To Web Site</a>
    </br></br></br></br>
    </div>
    </center>
    </body>
    </html>';
        mail("$email", "You have New Comment", $mess, $headers);
}
        ////////////////////////////
        $sql = "INSERT INTO `comment` (cuid , pid, cmt) VALUES (:cuid, :pid, :cmt)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':cuid', $id);
        $stmt->bindValue(':pid', $pid);
        $stmt->bindValue(':cmt', $cmt);

        $stmt->execute();
    } catch (PDOException $e) {
        echo "DB ERROR: " . $e->getMessage();
    }
}
