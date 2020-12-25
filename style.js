var all = document.getElementById("dark").style;
var pos = document.getElementById("ball").style;
var vid = document.getElementById("vidplayer");
if (vid) var vstyle = vid.style;
var img = document.getElementById("dmode");
var camshot = document.getElementById("camshot");
if (img) var istyle = img.style;
if (camshot) var cstyle = camshot.style;
var f = document.getElementById("filters");
if (f) var filters = f.style;
var stickyimgsfilt = document.getElementById("stickyimgs");
if (stickyimgsfilt) var stickyimgsfilts = stickyimgsfilt.style;
window.onloadstart = getcookie();
function setcookie(filter) {
  document.cookie = "value=" + filter;
}
function getcookie() {
  var v = document.cookie.split(";");
  if (v[1]) var value = v[1].split("=");
  else var value = v[0].split("=");
  if (value[1] === "") {
    pos.setProperty("left", "0");
    pos.setProperty("background-image", "url(./img/sun.png)");
    all.filter = "";
    if (vstyle) vstyle.setProperty("filter", "");
    if (istyle) istyle.setProperty("filter", "");
    if (cstyle) cstyle.setProperty("filter", "");
    filters.filter = "";
    if (stickyimgsfilts) stickyimgsfilts.filter = "";
    setcookie(all.filter);
  } else if (value[1] === "invert(1) hue-rotate(180deg)") {
    pos.setProperty("left", "55px");
    pos.setProperty("background-image", "url(./img/moon.png)");
    all.filter = "invert(1) hue-rotate(180deg)";
    if (vstyle) vstyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
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
    if (cstyle) cstyle.setProperty("filter", "invert(1) hue-rotate(180deg)");
    if (filters) filters.filter = "invert(1) hue-rotate(180deg)";
    if (stickyimgsfilts) stickyimgsfilts.filter = "invert(1) hue-rotate(180deg)";
    setcookie(all.filter);
  } else if (all.filter === "invert(1) hue-rotate(180deg)") {
    pos.setProperty("left", "0");
    pos.setProperty("background-image", "url(./img/sun.png)");
    all.filter = "";
    if (vstyle) vstyle.setProperty("filter", "");
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
  canvas = document.querySelector("#canvas");
  width = 640;
  height = 360;
  var img = document.querySelector("#img");
  canvas.width = width;
  canvas.height = height;
  canvas.getContext("2d").drawImage(video, 0, 0, width, height);
  var data = canvas.toDataURL("image/png");
  img.setAttribute("src", data);
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
  if (imgdisplay.visibility === "hidden" || imgdisplay.visibility === "") {
    imgdisplay.setProperty("right", "0");
    imgdisplay.visibility = "visible";
    imgdisplay.setProperty("opacity", "1");
    imgdisplay.pointerEvents = "auto";
  } else if (imgdisplay.visibility === "visible") {
    imgdisplay.setProperty("right", "100");
    imgdisplay.pointerEvents = "none";
    imgdisplay.setProperty("opacity", "0");
    imgdisplay.visibility = "";
  }
}

function options() {
  var imgdisplay = document.getElementById("inside").style;
  if (imgdisplay.visibility === "" || imgdisplay.visibility === "") {
    imgdisplay.visibility = "visible";
    imgdisplay.pointerEvents = "all";
    // imgdisplay.setProperty("opacity", "1");
    // imgdisplay.setProperty("display", "flex");
    imgdisplay.top = "40";
    imgdisplay.opacity = "1";
  } else if (imgdisplay.visibility === "visible") {
    imgdisplay.opacity = "0";
    imgdisplay.visibility = "";
    imgdisplay.pointerEvents = "none";
    // imgdisplay.display = "none";
    imgdisplay.top = "0";
    // imgdisplay.setProperty("opacity", "0");
    // imgdisplay.setProperty("display", "none");
    // imgdisplay.visibility = "";
  }
}

function applyfilter($effect) {
  var filter = document.getElementById("img").style;
  if ($effect === "sepia") filter.filter = "sepia(100%)";
  else if ($effect === "blur") filter.filter = "blur(2px)";
  else if ($effect === "grayscale") filter.filter = "grayscale(100%)";
  else if ($effect === "invert") filter.filter = "invert(100%)";
  else if ($effect === "hue-rotate") filter.filter = "hue-rotate(90deg)";
  else if ($effect === "hue-rotate2") filter.filter = "hue-rotate(180deg)";
}

function showfilter()
{
  var filt = document.getElementById("filters").style;
  var butt = document.getElementById("showfilt");
  var stickyimgs = document.getElementById("stickyimgs").style;
  if(filt.height === "0%" || filt.height === "")
  {
    butt.value = "Show Sticky imgs";
    stickyimgs.opacity = "0";
    filt.height = "100%";
  }
  else if (filt.height === "100%")
  {
    butt.value = "Show filters";
    filt.height = "0%";
    stickyimgs.opacity = "1";
  }

}



function removefilter()
{
  var img = document.getElementById("img").style;
  img.setProperty('filter', '');
}