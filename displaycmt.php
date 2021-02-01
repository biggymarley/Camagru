<?php
if(isset($imgs))
{
$sql = "SELECT * FROM `comment` WHERE `pid` LIKE '{$imgs[$index]['postusrid']}'";
$statm = $db->prepare($sql);
$statm->execute();
$cuid = $imgs[$index]['postusrid'] + 90000;
echo "<div id='$cuid' class='comment'>";
while($cm = $statm->fetch())
{
    $sql = "SELECT `uid` FROM `users` WHERE `usersid` LIKE '{$cm['cuid']}'";
    $sus = $db->prepare($sql);
    $sus->execute();
    $log = $sus->fetch()['uid'];
    echo "<div class='sigcmt'>";
    echo "<a href='./profile.php?username=$log' class='ucom'>$log :</a>";
    echo "<span class='spancomm' >{$cm['cmt']} </span>";
    echo "</div>";
}
echo "</div>";
}
else
{
    header('location: ./index.php');
    return;
}
