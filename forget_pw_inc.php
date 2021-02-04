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
            $email = trim($_POST['email']);
            $activation = sha1(mt_rand(10000, 99999) . time() . $email);
            if ($rows = checkmatch($db, $email, $email)) {
                if ($rows['uemail'] === $email) {
                    $sql = "UPDATE users SET uvcode = '$activation' WHERE uemail = :email";
                    $st = $db->prepare($sql);
                    $st->bindValue(':email', $email);
                    $st->execute();
                    // $db->exec($sql);
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
            <img style="width: 90px;height: 90px;" src="https://www.flaticon.com/svg/vstatic/svg/891/891399.svg?token=exp=1611929747~hmac=368730991fdaef56bbcbe6415ec1851f" />
            </br></br></br></br>
            </br>
            <span>
               CLICK TO CHANGE YOUR PASSWORD
           </span>
            </br></br></br></br>
            <a class="buteditinfo" href="http://192.168.99.106/forget_pw.php?key=' . $activation . '&email=' . $email . '">Go To Web Site</a>
            </br></br></br></br>
            </div>
            </center>
            </body>
            </html>';
                    $subject = "Camagru : CHANGE YOUR PASSWORD";
                    $headers = array(
                        'MIME-Version' => '1.0',
                        'Content-type' => 'text/html; charset=iso-8859-1',
                        'From' => 'Camagru@Support.com'
                    );
                    mail($email, $subject, $mess, $headers);
                    header('location: ../login.php?error=verify');
                    return;
                    //////////////////////////////////////
                }
            } else {
                header('location: ../forget_pw.php?error=verify');
                return;
            }
        }
    } catch (PDOException $e) {
        echo "DB ERROR: " . $e->getMessage();
    }
}
header('location: ../login.php');
return;
