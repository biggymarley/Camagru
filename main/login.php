<?php

if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['uid']))
{
    header('location: ../index.php');
    return;
}
if(empty($_SESSION['token']))
{
   $randomtoken = bin2hex(random_bytes(32));
   $_SESSION['token'] = $randomtoken;
}




?>
<html lang="en" id="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Login</title>
</head>
<body class='light' id="all">
    <?php include_once("header.php") ?>
    <center>
        <div id="loginform">
        <form action="../includes/login_inc.php" method="post">
            <div id="inlab">
                <input type="text" class="input" name="username"  required>
                <span id="label">Username / Email :</span>
            </div>
            </br>
            </br>
            </br></br>
            <div id="inlab">
                <input type="password"  name="passwd" class="input" required>
                <span id="label">Password :</span>
            </div>
            </br></br>
            </br></br>
            <input type="hidden" name='csrf' value="<?php echo $_SESSION['token']?>" />
            <a href="../tools/forget_pw.php" style="text-decoration: none;color:black">Forget your Password ?</a>
            </br></br>
            <input id="button" type="submit" name="submit" value="LOGIN" />
        </from>
        <?php include_once("../tools/errors.php") ?>
        </div>
    </center>
     <?php include_once("footer.php") ?>
    <script src="../style/style.js">
    </script>
</body>
</html>