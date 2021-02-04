<?php
session_start();
if (empty($_SESSION)) {
    header('location: ./login.php');
    return;
}
if (!isset($_SESSION) || !isset($_SESSION['usersid'])) {
    header('location: ./login.php');
    return;
}

?>

<?php
    include_once("header.php");
    ?>
<html id="dark">

<head>
    <title>IMG-LAB</title>
</head>

<body class="light" id="all">
    <center>
        <div id="imglab">
            <div id="editor">
                <div id="camndcamshot">
                    <div id="camstick">
                        <video id="vidplayer" autoplay>
                            </video>
                            <img id="pipse">
                    </div>
                    <div id="camshot">
                        <canvas  id='canvas'  width='640' height='320'></canvas>
                        <img id="stickcan">
                    </div>
                </div>
                <div id="diveditbuttons">
                    <input id="takepic" type="button" class="editbutton" value="Take picture" onclick="takepic()"  />
                    <input id="sd" type="button" class="editbutton" value="Show more" onclick="options()" />
                    <form id="butform" action="../tools/upload-img.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="imgsrc" value="" id="img" />
                        <input type="hidden" name="styleimg" value="" id="styleimg" />
                        <input type="hidden" name="sticky" value="" id="sticky" />
                        <input type="submit" class="editbutton" value="Post" />
                    </form>
                </div>
                <div id="hidehere">
                    <div id="inside">
                        <!-- <form autocomplete='off' action='img_lab_upload.php' method='post' enctype='multipart/form-data' style="width:100%; margin: 0;padding:0;display:flex;justify-content: space-between;align-items:center;"> -->
                        <input id="showfilt" type="button" class="editbutton" value="Show filters" onclick="showfilter()" />
                        <input type="button" class="editbutton" value="remove filter" onclick="removefilter()" />
                        <input id="sbutn" class="editbutton" type="button" value="Hide imgs" onclick="slider()" />
                            <input id='chose' style='opacity: 0;pointer-events:none;' type='file' name='img' hidden required onchange="previewFile()">
                            <label class="editbutton" for="chose" style="margin: 0;padding:0;display:flex;justify-content: center;align-items:center;">Upload</label>
                       
                        <!-- </form> -->
                    </div>
                </div>
                <div id="stickyfilters">
                    <div id="filters">
                        <div class="filter">
                            <img onclick="applyfilter('sepia')" class="filterimg" src="../img/sun.png" style="filter: sepia(100%) ;">
                        </div>
                        <div class="filter">
                            <img onclick="applyfilter('blur')" class="filterimg" src="../img/sun.png" style="filter: blur(2px) ;">
                        </div>
                        <div class="filter">
                            <img class="filterimg" onclick="applyfilter('grayscale')" src="../img/sun.png" style="filter: grayscale(100%) ;">
                        </div>
                        <div class="filter">
                            <img class="filterimg" onclick="applyfilter('invert')" src="../img/sun.png" style="filter: invert(100%) ;">
                        </div>
                        <div class="filter">
                            <img class="filterimg" onclick="applyfilter('hue-rotate')" src="../img/sun.png" style="filter: hue-rotate(90deg) ;">
                        </div>
                        <div class="filter">
                            <img class="filterimg" onclick="applyfilter('hue-rotate2')" src="../img/sun.png" style="filter: hue-rotate(180deg) ;">
                        </div>
                    </div>
                    <div id="stickyimgs">
                        <img id="king" class="stickyimgs" src="../img/stickyimgs/crown.png" onclick="sticktoimg(this.src)">
                        <img id="kmama" class="stickyimgs" src="../img/stickyimgs/mask.png" onclick="sticktoimg(this.src)">
                        <img id="join" class="stickyimgs" src="../img/stickyimgs/weed.png" onclick="sticktoimg(this.src)">
                        <img id="pipe" class="stickyimgs" src="../img/stickyimgs/pipe.png" onclick="sticktoimg(this.src)">
                        <img id="axe" class="stickyimgs" src="../img/stickyimgs/axe.png" onclick="sticktoimg(this.src)">
                    </div>
                </div>
            </div>
            <div id="imgdisplay">
                <h2 style="margin-left: auto;margin-right:auto;">Click to Delete</h2>
                <div id="dmode">
                    <?php include_once("../tools/imgdispaly.php") ?>
                </div>
            </div>
        </div>
    </center>
    <?php include_once("footer.php") ?>
    <script src="../style/style.js">
    </script>
</body>

</html>