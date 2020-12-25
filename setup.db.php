<?php
$conn = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=".$conn;
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $db->exec("CREATE DATABASE IF NOT EXISTS ".$dbname);
    $sql = "use ".$dbname;
    $db->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS  users(
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        uid VARCHAR(255) NOT NULL,
        uemail VARCHAR(255) NOT NULL,
        upwd varchar(255) NOT NULL
    );";
    $db->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS  imgs(
      id INT(11) PRIMARY KEY,
      img LONGBLOB
      );";
  $db->exec($sql);
  // $img = base64_encode("img/sun.png");
  // $sql = "INSERT into imgs(id, img) VALUES(2265, '$img');";
  // $db->exec($sql);
} catch (PDOException $e) {
  echo "DB ERROR: " . $e->getMessage();
}
?>