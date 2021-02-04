<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if(isset($_SESSION['uid']))
{
echo "<div id='profileimg'>";
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM `postes` WHERE `postesid` LIKE $id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $imgs = array_reverse($stmt->fetchAll());
    $i = 0;
    while (isset($imgs[$i])){
        $style = $imgs[$i]['imgstyle'];
        echo "<div class='profimgs'>";
        echo "<img src='{$imgs[$i]['img']}' class='urimg' style='filter: {$style}'>";
        echo "</div>";
        $i++;
    }
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
echo "</div>";
}
else
{
    header('location: ../index.php');
    return;
}