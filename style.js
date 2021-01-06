var all = document.getElementById("dark").style;
var pos = document.getElementById("ball").style;
var vid = document.getElementById("camstick");
if (vid) var vstyle = vid.style;
var img = document.getElementById("dmode");
var camshot = document.getElementById("camshot");
if (img) var istyle = img.style;
if (camshot) var cstyle = camshot.style;
var f = document.getElementById("filters");
if (f) var filters = f.style;
var stickyimgsfilt = document.getElementById("stickyimgs");
if (stickyimgsfilt) var stickyimgsfilts = stickyimgsfilt.style;
var indisimg = document.querySelectorAll(".indisimg");
var coutlikes = document.querySelectorAll(".countlikes");
var sigcmt = document.querySelectorAll(".sigcmt");
var urimg = document.querySelectorAll(".profimgs");
window.onloadstart = getcookie();
function setcookie(filter) {
  document.cookie = "value=" + filter;
}
function getcookie() {

  //profile part 
    $ul = window.location.href;
    // console.log($ul);
    if($ul.search('saved=s') > 0)
    {
      document.getElementById('sb').style.opacity = 1;
    }
    else if ($ul.search('liked=s') > 0)
    {
      document.getElementById('lb').style.opacity = 1;
    }
    else
    {
      $pb = document.getElementById('pb');
      if($pb)
        $pb.style.opacity = 1;

    }
    // $rul = $ul.search('saved=s');
    // console.log($rul);



















  var v = document.cookie.split(";");
  if (v[1]) var value = v[1].split("=");
  else var value = v[0].split("=");
  if (value[1] === "") {
    pos.setProperty("left", "0");
    pos.setProperty("background-image", "url(./img/sun.png)");
    all.filter = "";
    if (indisimg) {indisimg.forEach(element => {element.style.setProperty("filter", "");});}
    if (coutlikes) {coutlikes.forEach(element => {element.style.setProperty("filter", "");});}
    if (sigcmt) {sigcmt.forEach(element => {element.style.setProperty("filter", "");});}
    if (urimg) {urimg.forEach(element => {element.style.setProperty("filter", "");});}
    if (vstyle) vstyle.setProperty("filter", "");
    if (istyle) istyle.setProperty("filter", "");
    if (cstyle) cstyle.setProperty("filter", "");
    if (filters) filters.filter = "";
    if (stickyimgsfilts) stickyimgsfilts.filter = "";
    setcookie(all.filter);
  } else if (value[1] === "invert(1) hue-rotate(180deg)") {
    pos.setProperty("left", "55px");
    pos.setProperty("background-image", "url(./img/moon.png)");
    all.filter = "invert(1) hue-rotate(180deg)";
    if (vstyle) vstyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
    if (indisimg) {indisimg.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (urimg) {urimg.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (coutlikes) {coutlikes.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (sigcmt) {sigcmt.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (istyle) istyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
    if (cstyle) cstyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
    if (filters) filters.filter = "invert(1) hue-rotate(180deg)";
    if (stickyimgsfilts) stickyimgsfilts.filter = "invert(1) hue-rotate(180deg)";
    setcookie(all.filter);
  }
}

function darkmode() {
  if (all.filter === "") {
    pos.setProperty("left", "55px");
    pos.setProperty("background-image", "url(./img/moon.png)");
    all.filter = "invert(1) hue-rotate(180deg)";
    if (vstyle) vstyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
    if (istyle) istyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
    if (indisimg) {indisimg.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (urimg) {urimg.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (sigcmt) {sigcmt.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (coutlikes) {coutlikes.forEach(element => {element.style.setProperty("filter", "invert(1) hue-rotate(180deg)");});}
    if (cstyle) cstyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
    if (filters) filters.filter = "invert(1) hue-rotate(180deg)";
    if (stickyimgsfilts) stickyimgsfilts.filter = "invert(1) hue-rotate(180deg)";
    setcookie(all.filter);
  } else if (all.filter === "invert(1) hue-rotate(180deg)") {
    pos.setProperty("left", "0");
    pos.setProperty("background-image", "url(./img/sun.png)");
    all.filter = "";
    if (vstyle) vstyle.setProperty("filter", "");
    if (sigcmt) {sigcmt.forEach(element => {element.style.setProperty("filter", "");});}
    if (indisimg) {indisimg.forEach(element => {element.style.setProperty("filter", "");});}
    if (urimg) {urimg.forEach(element => {element.style.setProperty("filter", "");});}
    if (coutlikes) {coutlikes.forEach(element => {element.style.setProperty("filter", "");});}
    if (istyle) istyle.setProperty("filter", "");
    if (cstyle) cstyle.setProperty("filter", "");
    if (stickyimgsfilts) stickyimgsfilts.filter = "";
    if (filters) filters.filter = "";
    setcookie(all.filter);
  }
}

// capture pic ***
var video = document.getElementById("vidplayer");
if (video) {
  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices
      .getUserMedia({ video: true })
      .then(function (stream) {
        video.srcObject = stream;
        video.play();
      });
  }
}

function takepic() {
  var vidimg = document.querySelector("#pipse");
  canvas = document.querySelector("#canvas");
  width = video.offsetWidth;
  height = video.offsetHeight;
  var img = document.querySelector("#img");
  canvas.width = width;
  canvas.height = height;
  canvas.getContext("2d").drawImage(video, 0, 0, width, height);
  canvas
    .getContext("2d")
    .drawImage(
      vidimg,
      width / 3,
      height / 3,
      vidimg.offsetWidth,
      vidimg.offsetHeight
    );
  var data = canvas.toDataURL("image/png");
  img.setAttribute("value", data);
  fillcheck(data);
}

function fillcheck($data) {
  check = document.getElementsByClassName("filterimg");
  var i = 0;
  while (check[i]) {
    check[i].setAttribute("src", $data);
    i++;
  }
}

function slider() {
  var imgdisplay = document.getElementById("imgdisplay").style;
  var disbutn = document.getElementById("sbutn");
  if (imgdisplay.visibility === "hidden") {
    imgdisplay.setProperty("right", "0");
    imgdisplay.visibility = "visible";
    disbutn.setAttribute("value", "Hide imgs");
    imgdisplay.setProperty("opacity", "1");
    imgdisplay.pointerEvents = "auto";
  } else {
    imgdisplay.setProperty("right", "100");
    imgdisplay.pointerEvents = "none";
    imgdisplay.setProperty("opacity", "0");
    imgdisplay.visibility = "hidden";
    disbutn.setAttribute("value", "Display imgs");
  }
}

function options($value) {
  var imgdisplay = document.getElementById("inside").style;
  var but = document.getElementById("sd");
  if (imgdisplay.visibility === "" || imgdisplay.visibility === "") {
    imgdisplay.visibility = "visible";
    imgdisplay.pointerEvents = "all";
    imgdisplay.top = "40";
    but.setAttribute("value", "Show Less");
    imgdisplay.opacity = "1";
  } else if (imgdisplay.visibility === "visible") {
    imgdisplay.opacity = "0";
    imgdisplay.visibility = "";
    but.setAttribute("value", "Show More");
    imgdisplay.pointerEvents = "none";
    imgdisplay.top = "0";
  }
}

function applyfilter($effect) {
  var filter = document.getElementById("canvas").style;
  var styleimg = document.getElementById("styleimg");
  if ($effect === "sepia") {
    filter.filter = "sepia(100%)";
    styleimg.setAttribute("value", "sepia(100%)");
  } else if ($effect === "blur") {
    filter.filter = "blur(2px)";
    styleimg.setAttribute("value", "blur(2px)");
  } else if ($effect === "grayscale") {
    filter.filter = "grayscale(100%)";
    styleimg.setAttribute("value", "grayscale(100%)");
  } else if ($effect === "invert") {
    filter.filter = "invert(100%)";
    styleimg.setAttribute("value", "invert(100%)");
  } else if ($effect === "hue-rotate") {
    filter.filter = "hue-rotate(90deg)";
    styleimg.setAttribute("value", "hue-rotate(90deg)");
  } else if ($effect === "hue-rotate2") {
    filter.filter = "hue-rotate(180deg)";
    styleimg.setAttribute("value", "hue-rotate(180deg)");
  }
}

function showfilter() {
  var filt = document.getElementById("filters").style;
  var butt = document.getElementById("showfilt");
  var stickyimgs = document.getElementById("stickyimgs").style;
  if (filt.height === "0%" || filt.height === "") {
    butt.value = "Show Sticky imgs";
    stickyimgs.opacity = "0";
    stickyimgs.pointerEvents = "none";
    filt.height = "100%";
  } else if (filt.height === "100%") {
    butt.value = "Show filters";
    filt.height = "0%";
    stickyimgs.pointerEvents = "auto";
    stickyimgs.opacity = "1";
  }
}

function removefilter() {
  var img = document.getElementById("canvas").style;
  var styleimg = document.getElementById("styleimg");
  img.setProperty("filter", "");
  styleimg.setAttribute("value", "");
}

function sticktoimg($srcvalue) {
  var vidimg = document.querySelector("#pipse");
  var but = document.querySelector("#takepic");
  vidimg.setAttribute("src", $srcvalue);
  but.style.pointerEvents = "auto";
  but.style.backgroundColor = "#6ccde09c";
}




function deleteimg($id)
{
  var t = confirm("Do you want to  Delete your Image");
  if(t == true)
  {
      window.location = "http://192.168.99.104/deleteimg.php?id="+$id;
  }
}

function like($id)
{
   $s = document.getElementById($id);
   if($s)
   {
     if($s.src === "./img/like.png")
     {
       $s.setAttribute('src', "./img/unlike.png");
      }
      else
      $s.setAttribute('src', "./img/like.png");
    }
}


function likejs($id)
{
  var data = new FormData();
  data.append("pid", document.getElementById($id).value);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./like.php");
  xhr.onload = function(){ $l = this.response;
    if($l === 'like')
    {
      document.getElementById($id).src = './img/like.png';
    }
    else if ($l === 'unlike')
      document.getElementById($id).src = './img/unlike.png';
  };
  xhr.send(data);
  return false;
}

function savedjs($id, $i)
{
  var data = new FormData();
  data.append("pid", document.getElementById($id).value);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./saved.php");
  xhr.onload = function(){ $l = this.response;
    console.log($l);
    if($l === 'saved')
    {
      document.getElementById($i).src = './img/saved.png';
    }
    else if ($l === 'unsaved')
      document.getElementById($i).src = './img/unsaved.png';
  };
  xhr.send(data);
  return false;
}
