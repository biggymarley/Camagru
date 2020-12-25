<?php
session_start();
// if (!isset($_SESSION['uid']))
//     header('location: ./login.php');

?>

<html id="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>IMG-LAB</title>
</head>

<body id="alllab">
    <?php
    include_once("header.php");
    ?>
    <center>
        <div id="imglab">
            <div id="editor">
                <div id="camndcamshot">
                    <video id="vidplayer" autoplay>
                    </video>
                    <div id="camshot">
                        <canvas id="canvas" hidden></canvas>
                        <img id="img" class="camshotimg">
                    </div>
                </div>
                <input type="button" class="editbutton" value="Take picture" onclick="takepic()" />
                <input type="button" class="editbutton" value="Upload to profile" />
                <input id="sd" type="button" class="editbutton" value="Show more" onclick="options()" />
                <div id="hidehere">
                    <div id="inside">
                    <input  id="showfilt" type="button" class="editbutton" value="Show filters" onclick="showfilter()" />
                        <input type="button" class="editbutton" value="remove filter" onclick="removefilter()" />
                        <input id="sbutn" class="editbutton" type="button" value="Display imgs" onclick="slider()" />
                        <input type="file" id="upload" hidden />
                        <label class="editbutton" for="upload">Upload<label>
                    </div>
                </div>
                <div id="stickyfilters">
                <div id="filters">
                    <div class="filter">
                        <img onclick="applyfilter('sepia')" class="filterimg" src="https://picsum.photos/200" style="filter: sepia(100%) ;">
                    </div>
                    <div class="filter">
                        <img  onclick="applyfilter('blur')" class="filterimg" src="https://picsum.photos/200" style="filter: blur(2px) ;">
                    </div>
                    <div class="filter">
                        <img class="filterimg" onclick="applyfilter('grayscale')" src="https://picsum.photos/200" style="filter: grayscale(100%) ;">
                    </div>
                    <div class="filter">
                        <img class="filterimg" onclick="applyfilter('invert')"  src="https://picsum.photos/200" style="filter: invert(100%) ;">
                    </div>
                    <div class="filter">
                        <img class="filterimg" onclick="applyfilter('hue-rotate')"  src="https://picsum.photos/200" style="filter: hue-rotate(90deg) ;">
                    </div>
                    <div class="filter">
                        <img class="filterimg" onclick="applyfilter('hue-rotate2')"  src="https://picsum.photos/200" style="filter: hue-rotate(180deg) ;">
                    </div>
                </div>
                <div id="stickyimgs">
                    <img   class="stickyimgs" src="img/stickyimgs/crown.png">
                    <img   class="stickyimgs" src="img/stickyimgs/mask.png">
                    <img   class="stickyimgs" src="img/stickyimgs/weed.png">
                    <img   class="stickyimgs" src="img/stickyimgs/pipe.png">
                    <!-- <img   class="stickyimgs" src="img/stickyimgs/crown.png">
                    <img   class="stickyimgs" src="img/stickyimgs/mask.png">
                    <img   class="stickyimgs" src="img/stickyimgs/crown.png">
                    <img   class="stickyimgs" src="img/stickyimgs/mask.png">
                    <img   class="stickyimgs" src="img/stickyimgs/crown.png">
                    <img   class="stickyimgs" src="img/stickyimgs/mask.png">
                    <img   class="stickyimgs" src="img/stickyimgs/crown.png">
                    <img   class="stickyimgs" src="img/stickyimgs/mask.png">
                    <img   class="stickyimgs" src="img/stickyimgs/crown.png">
                    <img   class="stickyimgs" src="img/stickyimgs/mask.png"> -->
                </div>
                </div>
            </div>
            <div id="imgdisplay">
                <div id="dmode">
                    <img class="imgs" src="https://picsum.photos/200">
                    <img class="imgs" src="https://picsum.photos/200">
                    <img class="imgs" src="https://picsum.photos/200">
                    <img class="imgs" src="https://picsum.photos/200">
                    <img class="imgs" src="https://picsum.photos/200">
                    <img class="imgs" src="https://picsum.photos/200">
                    <img class="imgs" src="https://picsum.photos/200">
                    <img class="imgs" src="https://picsum.photos/200">
                </div>
            </div>
        </div>
    </center>
    <?php include_once("footer.php") ?>
    <script src="style.js">
    </script>
</body>

</html>