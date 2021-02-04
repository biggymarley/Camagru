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
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $img =  $_FILES['img']['tmp_name'];
        $splited = explode(".", $_FILES['img']['name']);
        $ext = end($splited);
        require_once('functions.php');
        $login = trim($_POST['username']);
        $pat = '/\%/';
        $login = preg_replace($pat, '', $login);
        $email = preg_replace($pat, '', $email);
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
        $path = "../tools/up/".$newimgname;
        if(file_exists($path)) unlink($path);
        move_uploaded_file($img, $path);
        $baseimg = base64_encode(file_get_contents($path));
        matchpass($passwd, $Rpasswd, "../signup.php");
        checkemail($email);
        hardpwd($passwd, "../signup.php");
        $activation = sha1(mt_rand(10000,99999).time().$email);
        if(isset($_POST['infoemail']))
            addtodb($db, $login, $email, $passwd, $baseimg, "1", $activation);
        else
            addtodb($db, $login, $email, $passwd, $baseimg, "0", $activation);
            /////////// mail confirmatio ////////
            $mess = '<head>
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
            </br>
            <span>
                Verify Your Account
           </span>
            </br></br></br></br>
            <a class="buteditinfo" href="http://192.168.99.106/tools/activation.php?key='.$activation.'&email='.$email.'">Go To Web Site</a>
            </br></br></br></br>
            </div>
            </center>
            </body>
            </html>';
            $subject = "Welcome to Camagru : Verification";
            $headers = array(
                'MIME-Version' => '1.0',
                'Content-type' => 'text/html; charset=iso-8859-1',
                'From' => 'Camagru@Support.com'
            );
            mail($email, $subject, $mess, $headers);
            header('location: .././main/login.php?error=verify');
            //////////////////////////////////////
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