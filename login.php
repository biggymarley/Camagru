<?php?>
<html lang="en" id="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Login</title>
</head>

<body id="allog">
    <?php include_once("header.php") ?>
    <center>
        <div id="loginform">
        <form action="includes/login_inc.php" method="post">
            <div id="inlab">
                <input type="text" id="input" name="username" required>
                <span id="label">Username / Email :</span>
            </div>
            </br>
            </br>
            </br></br>
            <div id="inlab">
                <input type="password"  name="passwd" id="input" required>
                <span id="label">Password :</span>
            </div>
            </br></br>
            </br></br>
            <input id="button" type="submit" name="submit" value="LOGIN" />
        </from>
        <?php include_once("errors.php") ?>
        </div>
    </center>
     <?php include_once("footer.php") ?>
    <script defer async src="style.js">
    </script>
</body>
</html>