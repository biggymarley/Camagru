<html  id="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SIGN UP</title>
</head>
<body id="all">
    <?php include_once("header.php") ?>
    <center>
        <div id="loginform">
        <form autocomplete="off" action="includes/signup_inc.php" method="post">
            <div id="inlab">
                    <input autocomplete="off" name="username" type="text" id="input" required/>
                    <span id="label">Username :</span>
            </div>
            </br>
            </br>
            </br>
            </br>
            <div id="inlab">
                <input autocomplete="off" name="passwd" type="password" id="input" required/>
                <span id="label">Password :</span>
            </div>
            </br>
            </br>
            </br>
            </br>
            <div id="inlab">
                <input autocomplete="off" name="Rpasswd" type="password" id="input" required/>
                <span id="label">Repeate Password :</span>
            </div>
            </br>
            </br>
            </br>
            </br>
            <div id="inlab">
                <input autocomplete="off" name="email" type="text" id="input" required/>
                <span id="label">Email :</span>
            </div>
            </br>
            </br>
            </br>
            </br>
            <input  id="button"  type="submit" name="submit" />
        </from>
        <?php include_once("errors.php") ?>
        </div>
    </center>
    <?php include_once("footer.php") ?>
    <script defer async src="style.js">
    </script>
</body>

</html>