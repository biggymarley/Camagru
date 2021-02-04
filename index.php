<?php
include_once("config/setup.php");
session_start();
?>
<html id="dark">
<body class="light" id="all">
    <?php
    include_once("./main/header.php");
    ?>
    <center id='allposts'>
            <?php
             include_once("tools/displaycmt.php");
            ?>
    </center>
    <?php include_once("./main/footer.php") ?>
    <script defer async src="./style/style.js">
    </script>
</body>

</html>