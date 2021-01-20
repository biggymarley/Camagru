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
    $sql = "SELECT * FROM `like` WHERE `likeid` LIKE $id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data =  array_reverse($stmt->fetchAll());
    $i = 0;
    while(isset($data[$i]))
    {
        $sql = "SELECT * FROM `postes` WHERE `postusrid` LIKE {$data[$i]['pid']}";
        $stmt2 = $db->prepare($sql);
        $stmt2->execute();
        $imgs = $stmt2->fetch();
        $style = $imgs['imgstyle'];
        echo "<div class='profimgs'>";
        echo "<img src='{$imgs['img']}' class='urimg' style='filter: {$style}'>";
        echo "</div>";
        $i++;
    }
} catch (PDOException $e) {
    echo "DB ERROR: " . $e->getMessage();
}
echo "</div>";
