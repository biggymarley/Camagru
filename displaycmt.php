<?php
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
    echo "<div class='sigcmt'>";
    echo  "<span class='ucom'>{$sus->fetch()['uid']} :</span>";
    echo "<span class='spancomm' >{$cm['cmt']} </span>";
    echo "</div>";
}
echo "</div>";