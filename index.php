<?php
include_once("setup.db.php");
session_start();
if (!isset($_SESSION['uid']))
    header('location: ./login.php');
?>
<html id="dark">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Camagru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="all">
    <?php
    include_once("header.php");
    ?>
    <center>
        <?php
        if (isset($_SESSION['uid'])) {
            echo "<h1> WELCOME TO CAMAGRU " . $_SESSION['uid'] . "</h1>";
        }
        ?>
    </center>
    <?php include_once("footer.php") ?>
    <script src="style.js">
    </script>
</body>

</html>