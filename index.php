<?php
include_once("setup.db.php");
session_start();
if (!isset($_SESSION) || !isset($_SESSION['usersid']))
    header('location: ./login.php');
?>
<html id="dark">
<body class="light" id="all">
    <?php
    include_once("header.php");
    ?>
    <center>
            <?php
             include_once("displayposts.php");
            ?>
    </center>
    <?php include_once("footer.php") ?>
    <script defer async src="style.js">
    </script>
</body>

</html>