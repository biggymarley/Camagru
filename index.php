<?php
include_once("setup.db.php");
session_start();
if (!isset($_SESSION) || !isset($_SESSION['usersid']))
    header('location: ./login.php');
?>
<html id="dark">

<head>
<script defer async src="style.js">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Camagru</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script>

function likejs()
{
  var data = new FormData();
  console.log(document.getElementById("likepid").value);
  data.append("pid", document.getElementById("likepid").value);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "like.php");
  return false;
}

    </script> -->
</head>

<body id="all">
    <?php
    include_once("header.php");
    ?>
    <center>
        <!-- <div id="posts"> -->
            <?php
             include_once("displayposts.php");
            ?>
        <!-- </div> -->
    </center>
    <?php include_once("footer.php") ?>
    <script defer async src="style.js">
    </script>
</body>

</html>