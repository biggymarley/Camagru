<?php
if(empty($_SESSION['token']))
{
   $randomtoken = bin2hex(random_bytes(32));
   $_SESSION['token'] = $randomtoken;
}


if(isset($imgs))
{
    while (isset($imgs[$index])) {
    $style = $imgs[$index]['imgstyle'];
    $toktok = $_SESSION['token'];
    $pid = $imgs[$index]['postusrid'] + 500;
    $lid = $imgs[$index]['postesid'];
    $sql = "SELECT * FROM `users` WHERE `usersid` LIKE $lid";
    $stmt2 = $db->prepare($sql);
    $uid = $stmt2->execute();
    $fetch = $stmt2->fetchAll();
    $username = $fetch[0]['uid'];
    $uimg = $fetch[0]['uimg'];
    echo "<div class='posts'>";
    echo "<div class='divpiclog'>";
    echo "<a href='./profile.php?username=$username'>";
    if (empty($uimg))
        echo "<img class='postpimg' src='./img/user.png' />";
    else
        echo "<img class='postpimg' src='data:image/png;base64, $uimg' />";
    echo "</a>";
    echo "<a class='piclog'  href='./profile.php?username=$username'>$username</a>";
    echo "</div>";
    echo "<div   class='indisimg'>";
    echo "<div   class='imgndlike'>";
    echo "<img src='{$imgs[$index]['img']}' data-id='{$imgs[$index]['postusrid']}' data-likeid='$pid' class='imgsp' style='filter: {$style}'>";
    echo "<img id='{$pid}'  src='./img/like.png' class='apprlike'>";
    echo "</div>";
    $slikes = "SELECT count(*) FROM `like` WHERE `pid` = {$imgs[$index]['postusrid']}";
    $stl = $db->prepare($slikes);
    $stl->execute();
    $likes = $stl->fetch()[0];
    echo "<div class='countlikes'>";
    echo "<span name='$pid' >$likes likes </span>";
    if ( isset($_SESSION) && isset($_SESSION['usersid']) &&  isset($_SESSION['uid'])) {
    echo "<form class='likeform' method='POST' onsubmit='return savedjs({$imgs[$index]['postusrid']}, $i)'>";
    $sql2 = "SELECT 1 FROM `saved` WHERE `pid` = {$imgs[$index]['postusrid']} AND `savedid` = $id";
    $stmt3 = $db->prepare($sql2);
    $stmt3->execute();
    if (!empty($stmt3->fetch())) {
        echo "<input id='$i'  name='savebtn' type='image' alt='Submit' class='likebtn' src='./img/saved.png' value='{$imgs[$index]['postusrid']}'>";
    } else {
        echo "<input id='$i'  name='savebtn' type='image' alt='Submit' class='likebtn' src='./img/unsaved.png' value='{$imgs[$index]['postusrid']}' >";
    }
    echo "</form>";
}
    echo "</div>";
    include "displaycmt.php";
    echo "<div class='reactdiv'>";
    if (isset($_SESSION) && isset($_SESSION['usersid']) &&  isset($_SESSION['uid'])) {
    echo "<form class='likeform' method='POST' onsubmit='return likejs({$imgs[$index]['postusrid']}, $pid)'>";
    $sql2 = "SELECT 1 FROM `like` WHERE `pid` = {$imgs[$index]['postusrid']} AND `likeid` = $id";
    $stmt3 = $db->prepare($sql2);
    $stmt3->execute();
    if (!empty($stmt3->fetch())) {
        echo "<input id='{$imgs[$index]['postusrid']}' type='image' alt='Submit' class='likebtn' src='./img/like.png' value='{$imgs[$index]['postusrid']}'>";
    } else {
        echo "<input id='{$imgs[$index]['postusrid']}' type='image' alt='Submit' class='likebtn' src='./img/unlike.png' value='{$imgs[$index]['postusrid']}' >";
    }
    echo "</form>";
    
    echo "<form autocomplete='off'  class='cmtform' method='POST' onsubmit='return cmtjs( {$imgs[$index]['postusrid']}, $i)'>";
    echo "<input type='hidden' id='cmtcsrf' name='csrf' value='{$_SESSION['token']}' />";
    echo "<input autocomplete='off' name='$i' type='text'  placeholder='Add comment ...'  class='disinput' required >";
    echo "<input type='submit' class='disbut' value='POST' >";
    echo "</form>";
}
    echo "</div>";
    echo "</div>";
    echo "<input type='hidden' class='indexofpost' value='$from'>";
    echo "</div>";
    if (isset($_SESSION) && isset($_SESSION['usersid']) &&  isset($_SESSION['uid'])) {
    $i++;
    }
    $index++;
}
}else
{
    header('location: ./index.php');
    return;
}

