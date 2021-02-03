<?php
$conn = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=".$conn;
try {
    $db = new PDO($dsn, $user, $pw);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    include_once('database.php');
} catch (PDOException $e) {
  echo "DB ERROR: " . $e->getMessage();
}
?>