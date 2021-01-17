<html id="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SIGN UP</title>
</head>

<body class="light" id="all">
    <?php include_once("header.php") ?>
    <center>
        <div id="loginform">
            <form autocomplete="off" action="includes/signup_inc.php" method="post" enctype="multipart/form-data">
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
                    <input type="file" name='img' required>
                </div>
                </br>
                <input id="button" type="submit" name="submit" />
                </from>
                <?php include_once("errors.php") ?>
        </div>
    </center>
    <?php include_once("footer.php") ?>
    <script defer async src="style.js">
    </script>
</body>

</html>