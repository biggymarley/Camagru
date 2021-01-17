<?php?>
<html lang="en" id="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Login</title>
</head>

<body class='light' id="all">
    <?php include_once("header.php") ?>
    <center>
        <div id="loginform">
        <form action="includes/login_inc.php" method="post">
            <input type="file" name='img'>
            <input id="button" type="submit" name="submit" value="UPLOAD" />
        </from>
        <?php include_once("errors.php") ?>
        </div>
    </center>
     <?php include_once("footer.php") ?>
    <script src="style.js">
    </script>
</body>
</html>