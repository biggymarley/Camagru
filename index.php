<?php
include_once("config/setup.php");
session_start();
?>
<html id="dark">
<body class="light" id="all">
    <?php
    include_once("header.php");
    ?>
    <center id='allposts'>
            <?php
             include_once("displayposts.php");
            ?>
    </center>
    <?php include_once("footer.php") ?>
    <script defer async src="style.js">
    </script>
</body>

</html>