<?php
session_start();
if(empty($_SESSION)) 
    header('location: ./login.php');
if (!isset($_SESSION) || !isset($_SESSION['usersid']))
    header('location: ./login.php');

?>

<html id="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>IMG-LAB</title>
</head>

<body class="light" id="all">
    <?php
    include_once("header.php");
    ?>
    <center>
        <div id="imglab">
            <div id="editor">
                <div id="camndcamshot">
                    <div id="camstick">
                        <img  id="pipse" >
                        <video id="vidplayer" autoplay>
                            </video>
                        </div>
                        <div id="camshot">
                        <canvas id="canvas" ></canvas>
                        <!-- <img id="img" > -->
                    </div>
                </div>
                <div id="diveditbuttons">
                    <input id="takepic" type="button" class="editbutton" value="Take picture" onclick="takepic()" />
                    <input id="sd" type="button" class="editbutton" value="Show more" onclick="options()" />
                <form  id="butform" action="upload-img.php" method="post" enctype="multipart/form-data"  >
                    <input type="hidden" name="imgsrc" value="" id="img" />
                    <input type="hidden" name="styleimg" value="" id="styleimg" />
                    <input type="submit"  class="editbutton" value="Post" />
                </form>
            </div>
                <div id="hidehere">
                    <div id="inside">
                    <input  id="showfilt" type="button" class="editbutton" value="Show filters" onclick="showfilter()" />
                        <input type="button" class="editbutton" value="remove filter" onclick="removefilter()" />
                        <input id="sbutn" class="editbutton" type="button" value="Hide imgs" onclick="slider()" />
                        <input type="file" id="upload" hidden />
                        <label class="editbutton" for="upload" style="margin: 0;padding:0;display:flex;justify-content: center;align-items:center;">Upload</label>
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
                    <img  id="king" class="stickyimgs" src="img/stickyimgs/crown.png" onclick="sticktoimg(this.src)">
                    <img  id="kmama" class="stickyimgs" src="img/stickyimgs/mask.png" onclick="sticktoimg(this.src)">
                    <img  id="join" class="stickyimgs" src="img/stickyimgs/weed.png" onclick="sticktoimg(this.src)">
                    <img  id="pipe" class="stickyimgs" src="img/stickyimgs/pipe.png" onclick="sticktoimg(this.src)">
                </div>
                </div>
            </div>
            <div id="imgdisplay">
                <h2>Click to Delete</h2>
                <div id="dmode">
                    <?php include_once("imgdispaly.php")?>
                </div>
            </div>
        </div>
    </center>
    <?php include_once("footer.php") ?>
    <script src="style.js">
    </script>
</body>

</html>