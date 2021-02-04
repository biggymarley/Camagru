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

<html id="dark">
<head>
    <title>SIGN UP</title>
</head>
<body class="light" id="all">
    <?php include_once("header.php") ?>
    <center>
        <div id="loginform">
            <form autocomplete="off" action="../includes/signup_inc.php" method="post" enctype="multipart/form-data">
                <div id="inlab">
                    <input autocomplete="off" name="username" type="text" class="input" pattern="^[a-zA-Z1-9]{3,}$" title="MORE THEN 3 [a-zA-Z1-9]" required />
                    <span id="label">Username :</span>
                </div>
                </br>
                </br>
                </br>
                </br>
                <div id="inlab">
                    <input autocomplete="off" name="passwd" type="password" class="input" required />
                    <span id="label">Password :</span>
                </div>
                </br>
                </br>
                </br>
                </br>
                <div id="inlab">
                    <input autocomplete="off" name="Rpasswd" type="password" class="input" required />
                    <span id="label">Repeate Password :</span>
                </div>
                </br>
                </br>
                </br>
                </br>
                <div id="inlab">
                    <input autocomplete="off" name="email" type="text" class="input" required/>
                    <span id="label">Email :</span>
                </div>
                </br>
                </br>
                </br>
                </br>
                <div id='inlab'>
                    <input id='chose' type="file" name='img' required hidden>
                    <label for='chose' class='editlabel'>Click to Choose Your Profile Picture</label></br></br>
                </div>
                </br>
                <input type="hidden" name='csrf' value="<?php echo $_SESSION['token']?>" />
                <input type="checkbox" name="infoemail" value="TRUE" />
                <span>I agree To recive Mail Notifications</span>
                </br>
                </br>
                </br>
                </br>
                <input id="button" type="submit" name="submit" />
                </from>
                <?php include_once("../tools/errors.php") ?>
        </div>
    </center>
    <?php include_once("footer.php") ?>
    <script defer async src="../style/style.js">
    </script>
</body>

</html>