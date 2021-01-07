<?php
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
echo "<div id='profileimg'>";
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM `saved` WHERE `savedid` LIKE $id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($data = $stmt->fetch())
    {
        $sql = "SELECT * FROM `postes` WHERE `postusrid` LIKE {$data['pid']}";
        $stmt2 = $db->prepare($sql);
        $stmt2->execute();
        $imgs = $stmt2->fetch();
        $style = $imgs['imgstyle'];
        echo "<div class='profimgs'>";
        echo "<img src='{$imgs['img']}' class='urimg' style='filter: {$style}'>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
echo "</div>";