// var all = document.getElementById("dark").style;
var cpos = document.getElementById("ball");
if (cpos) var pos = cpos.style;
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
///////////////////////dARKmode////////////////
let Darkmode = localStorage.getItem("mode");
var toggle = document.getElementById("toggle");
const toggle2 = document.getElementById("toggle2");
var ball = document.getElementById("ball");
const ball2 = document.getElementById("ball2");
var items = document.querySelectorAll(".item");
var posts = document.getElementsByClassName("posts");
var text = document.getElementById("all").getElementsByTagName("A");
var spans = document.getElementById("all").getElementsByTagName("span");
var inputs = document.getElementById("all").getElementsByTagName("input");
var header = document.getElementById("header");
const menudiv = document.querySelector(".menu");
const clickmenu = document.querySelector(".clickmenu");
const add = document.getElementById("addbut");
const button = document.getElementById("button");
const line = document.querySelector(".line");
const loginputs = document.querySelectorAll(".input");
const editputs = document.querySelectorAll(".editinput");
const butitinfo = document.querySelectorAll(".buteditinfo");
const flaticon = document.getElementById("flaticon");

var theme = {
  dark: {
    ballc: "#8fb1b65e",
    bg_color: "#1b8ea046",
    bg: "url(img/d2.png)",
    color: "#bababa",
    input_color: "#8f8f8f",
    add: "./img/dadd.png",
    menu: "./img/dmenu.png",
    postbg: "linear-gradient(to right top, rgba(255,0,0,0), #1b8ea047)",
  },
  light: {
    ballc: "#8fb1b6",
    bg_color: "#8fb1b646",
    bg: "url(img/l2.png)",
    color: "#000000",
    input_color: "#536669",
    add: "./img/add.png",
    menu: "./img/lmenu.png",
    postbg: "linear-gradient(to right top, rgba(255,0,0,0),#8fb1b646)",
  },
};

function change() {
  Darkmode = localStorage.getItem("mode");
  if (Darkmode !== "1") light();
  else dark();
}

function applyall(array, theme, op) {
  i = 0;
  while (array[i]) {
    array[i].style.setProperty(op, theme);
    i++;
  }
}

var body = document.getElementById("all");
const light = () => {
  if (flaticon) {
    flaticon.setAttribute(
      "src",
      "https://media.flaticon.com/dist/min/img/logo/flaticon_positive.svg"
    );
  }

  if (button) {
    button.style.backgroundColor = theme.light.bg_color;
    button.style.color = theme.light.color;
  }
  if (loginputs)
    loginputs.forEach((e) => {
      e.classList.remove("darkin");
    });
  if (editputs)
    editputs.forEach((e) => {
      e.classList.remove("darkin");
    });
  if (add) add.src = theme.light.add;
  line.classList.remove("darkin");
  pos.setProperty("left", "0");
  pos.setProperty("background-image", "url(./img/sun.png)");
  toggle2.style.setProperty("background-image", "url(./img/sun.png)");
  clickmenu.setAttribute("src", theme.light.menu);
  body.classList.remove("dark");
  ball.style.backgroundColor = theme.light.ballc;
  toggle2.style.backgroundColor = theme.light.ballc;
  toggle.style.backgroundColor = theme.light.bg_color;
  header.style.backgroundColor = theme.light.bg_color;
  menudiv.style.backgroundColor = theme.light.bg_color;
  applyall(text, theme.light.color, "color");
  applyall(spans, theme.light.color, "color");
  applyall(posts, theme.light.postbg, "background-image");
  applyall(inputs, theme.light.input_color, "color");
  applyall(butitinfo, theme.light.color, "color");
  items.forEach((element) => {
    element.style.color = theme.light.color;
  });
  localStorage.setItem("mode", "1");
};

const dark = () => {
  if (flaticon) {
    flaticon.setAttribute(
      "src",
      "https://media.flaticon.com/dist/min/img/logo/flaticon_negative.svg"
    );
  }
  if (add) add.src = theme.dark.add;
  if (button) {
    button.style.backgroundColor = theme.dark.bg_color;
    button.style.color = theme.dark.color;
  }
  if (loginputs)
    loginputs.forEach((e) => {
      e.classList.add("darkin");
    });
  if (editputs)
    editputs.forEach((e) => {
      e.classList.add("darkin");
    });
  line.classList.add("darkin");
  clickmenu.setAttribute("src", theme.dark.menu);
  pos.setProperty("left", "55px");
  pos.setProperty("background-image", "url(./img/moon.png)");
  toggle2.style.setProperty("background-image", "url(./img/moon.png)");
  ball.style.backgroundColor = theme.dark.ballc;
  toggle2.style.backgroundColor = theme.dark.ballc;
  toggle.style.backgroundColor = theme.dark.bg_color;
  header.style.backgroundColor = theme.dark.bg_color;
  menudiv.style.backgroundColor = theme.dark.bg_color;
  applyall(inputs, theme.dark.input_color, "color");
  applyall(text, theme.dark.color, "color");
  applyall(posts, theme.dark.postbg, "background-image");
  applyall(spans, theme.dark.color, "color");
  applyall(butitinfo, theme.dark.color, "color");
  items.forEach((element) => {
    element.style.color = theme.dark.color;
  });
  body.classList.add("dark");
  localStorage.setItem("mode", null);
};
toggle.addEventListener("click", change);
toggle2.addEventListener("click", change);

if (Darkmode !== "1") dark();
///////////////////////////////////////////////////////////////

$ul = window.location.href;
if ($ul.search("saved=s") > 0) {
  var sb = document.getElementById("sb");
  if (sb) sb.style.opacity = 1;
} else if ($ul.search("liked=s") > 0) {
  var lb = document.getElementById("lb");
  if (lb) lb.style.opacity = 1;
} else {
  var pb = document.getElementById("pb");
  if (pb) pb.style.opacity = 1;
}

//////*//////////Menu-Slider////////////////////

function menuslider() {
  if (menudiv.offsetHeight === 0) {
    menudiv.style.height = "180px";
  } else menudiv.style.height = "0";
}

const menuicon = document.querySelector(".clickmenu");
menuicon.addEventListener("click", menuslider);

// capture pic ***
let video = document.getElementById("vidplayer");
var width = 320;
var height = 320;
if (video) {
  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // height = video.offsetHeight / (video.offsetWidth / width);
    // video.setAttribute("width", width);
    // video.setAttribute("height", height);
    navigator.mediaDevices
      .getUserMedia({ video: true })
      .then(function (stream) {
        video.srcObject = stream;
        video.play();
      });
  }
}

function takepic() {
  const upimg = document.querySelector("#upimg");

  var vidimg = document.querySelector("#pipse");
  let canvas = document.querySelector("#canvas");
  var img = document.querySelector("#img");
  canvas.width = width;
  canvas.height = height;
  // console.log(upimg.value);
  if (upimg && upimg.value) {
    const idraw = new Image();
    idraw.src = upimg.value;
    idraw.onload = function () {
      canvas.getContext("2d").drawImage(idraw, 0, 0, width, height);
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
    };
  } else {
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
  //     var data = canvas.toDataURL("image/png");
  // img.setAttribute("value", data);
  // fillcheck(data);
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
  const imgdisplay = document.getElementById("imgdisplay");
  const divediteur = document.querySelector("#editor");
  var disbutn = document.getElementById("sbutn");
  if (imgdisplay.style.visibility === "hidden") {
    divediteur.style.width = "69%";
    imgdisplay.style.width = "30%";
    // imgdisplay.style.setProperty("right", "0");
    imgdisplay.style.visibility = "visible";
    disbutn.setAttribute("value", "Hide imgs");
    imgdisplay.style.setProperty("opacity", "1");
    imgdisplay.style.pointerEvents = "auto";
  } else {
    divediteur.style.width = "100%";
    imgdisplay.style.width = "0%";
    // imgdisplay.style.setProperty("right", "100");
    imgdisplay.style.pointerEvents = "none";
    imgdisplay.style.setProperty("opacity", "0");
    imgdisplay.style.visibility = "hidden";
    disbutn.setAttribute("value", "Display imgs");
  }
}

function options() {
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

function deleteimg(id, tok) {
  const t = confirm("Do you want to  Delete your Image");
  if (t == true) {
    window.location = "./deleteimg.php?id=" + id + "&tok=" + tok;
  }
}

function logout(tok) {
  const t = confirm("Are you Sure you want to log-out");
  if (t == true) {
    window.location = "./logout.php?tok=" + tok;
  }
}

function like($id) {
  $s = document.getElementById($id);
  if ($s) {
    if ($s.src === "./img/like.png") {
      $s.setAttribute("src", "./img/unlike.png");
    } else $s.setAttribute("src", "./img/like.png");
  }
}

window.addEventListener("scroll", function () {
  const lpost = document.querySelectorAll(".indexofpost");
  const savebtn = document.getElementsByName("savebtn");
  if (
    lpost[0] &&
    window.innerHeight + window.scrollY + 1 >= document.body.offsetHeight
  ) {
    let l = lpost[lpost.length - 1].value;
    let data = new FormData();
    if (savebtn[0]) {
      let save = savebtn[savebtn.length - 1].id;
      save = parseInt(save) + 1;
      data.append("save", save);
    }
    if (l === "0") l = "4";
    else l = parseInt(l) + 2;
    let to = "2";
    data.append("from", l);
    data.append("to", to);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./displayposts.php");
    const postsdiv = document.getElementById("allposts");
    xhr.onloadend = function () {
      const p = new DOMParser();
      const fiveposts = p.parseFromString(xhr.response, "text/html");
      let arg = [];
      for (let i = 0; fiveposts.body.childNodes[i]; i++) {
        arg.push(fiveposts.body.childNodes[i]);
      }
      arg.forEach((e) => {
        postsdiv.appendChild(e);
      });
      d = localStorage.getItem("mode");
      if (d !== "1") dark();
      resizeposts();
    };
    xhr.send(data);
    return false;
  }
});

function likejs(id, lid) {
  var data = new FormData();
  data.append("pid", document.getElementById(id).value);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./like.php");
  const nblike = document.getElementsByName(lid)[0].textContent.match(/\d/);
  xhr.onload = function () {
    const l = this.response;
    if (l === "like") {
      document.getElementById(lid).src = "./img/like.png";
      document.getElementById(lid).style.opacity = "1";
      setTimeout(function () {
        document.getElementById(lid).style.opacity = "0";
      }, 200);
      document.getElementById(id).src = "./img/like.png";
      document.getElementsByName(lid)[0].textContent =
        parseInt(nblike) + 1 + " likes";
    } else if (l === "unlike") {
      document.getElementsByName(lid)[0].textContent =
        parseInt(nblike) - 1 + " likes";
      document.getElementById(lid).src = "./img/unlike.png";
      document.getElementById(lid).style.opacity = "1";
      setTimeout(function () {
        document.getElementById(lid).style.opacity = "0";
      }, 200);
      document.getElementById(id).src = "./img/unlike.png";
    }
  };
  xhr.send(data);
  return false;
}

function cmtjs(id, cmt) {
  let cmtinput = document.getElementsByName(cmt)[0];
  if (cmtinput.value.trim()) {
    var data = new FormData();
    data.append("pid", id);
    data.append("cmt", cmtinput.value);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./cmt.php");
    let spc = document.createElement("span");
    xhr.onloadend = function () {
      if (xhr.responseText !== "") {
        let thecmt = document.createTextNode(xhr.responseText.replace(/&#34;/g, "\"").replace(/&#39;/g, "'"));
        spc.appendChild(thecmt);
      }
    };
    xhr.send(data);
    var d2 = new FormData();
    const xhr2 = new XMLHttpRequest();
    d2.append("cmt", cmtinput.value);
    xhr2.open("POST", "./autoinsertcmt.php");
    let div = document.createElement("div");
    let sp = document.createElement("span");
    sp.className = "ucom";
    xhr2.onreadystatechange = function () {
      if (xhr2.readyState == xhr2.DONE && this.responseText !== "")
        sp.appendChild(document.createTextNode(this.responseText + " :"));
    };
    xhr2.send(d2);
    let divid = parseInt(id) + 90000;
    div.className = "sigcmt";
    spc.className = "spancomm";
    Darkmode = localStorage.getItem("mode");
    if (Darkmode === "null") {
      sp.style.color = theme.dark.color;
      spc.style.color = theme.dark.color;
    }
    spc.style.opacity = "70%";
    div.appendChild(sp);
    div.appendChild(spc);
    document.getElementById(divid).appendChild(div);
    cmtinput.value = "";
  }
  return false;
}

function savedjs(id, i) {
  var data = new FormData();
  data.append("pid", document.getElementById(id).value);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./saved.php");
  xhr.onload = function () {
    const l = this.response;
    if (l === "saved") {
      document.getElementById(i).src = "./img/saved.png";
    } else if (l === "unsaved")
      document.getElementById(i).src = "./img/unsaved.png";
  };
  xhr.send(data);
  return false;
}

function displaydiv() {
  var div = document.getElementById("editdiv");

  var hight = div.offsetHeight;
  if (hight === 0) {
    div.style.height = "500px";
    div.style.opacity = "1";
    div.style.pointerEvents = "auto";
  } else {
    div.style.height = "0%";
    div.style.opacity = "0";
    div.style.pointerEvents = "none";
  }
}

var showeditdivbut = document.getElementById("showeditdiv");
if (showeditdivbut) showeditdivbut.addEventListener("click", displaydiv);

function resizeit() {
  const pimgs = document.querySelector("#profileimg");
  const uimgs = document.querySelectorAll(".profimgs");
  if (pimgs) {
    if (uimgs[0]) {
      if (pimgs.offsetWidth === 1000) {
        uimgs.forEach((e) => {
          e.style.width = "300px";
          e.style.height = "300px";
        });
      } else {
        const nw = uimgs[0].offsetWidth - 50 + 15;
        uimgs.forEach((e) => {
          e.style.width = nw;
          e.style.height = nw;
        });
      }
    }
  }
}

window.addEventListener("resize", resizeit);
window.addEventListener("load", resizeit);

function resizeposts() {
  const imgndlike = document.querySelector(".indisimg");
  const imgsp = document.querySelectorAll(".imgndlike");
  if (imgndlike) {
    if (imgndlike.offsetWidth >= 800) {
      imgsp.forEach((e) => {
        e.style.width = "700px";
        e.style.height = "700px";
      });
    } else {
      const nw = imgndlike.offsetWidth - 50 + 10;
      imgsp.forEach((e) => {
        e.style.width = nw;
        e.style.height = nw;
      });
    }
  }
}

window.addEventListener("resize", resizeposts);
window.addEventListener("load", resizeposts);
