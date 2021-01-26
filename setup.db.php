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
        usersid INT(11) PRIMARY KEY AUTO_INCREMENT,
        uid VARCHAR(255) NOT NULL,
        uemail VARCHAR(255) NOT NULL,
        upwd varchar(255) NOT NULL,
        uimg LONGBLOB,
        infoemail boolean 
    );";
    $db->exec($sql);
  $sql = "CREATE TABLE IF NOT EXISTS  postes(
    postusrid INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    postesid INT(11),
    imgstyle Varchar(255) NOT NULL,
    img LONGBLOB,
    FOREIGN KEY (postesid) REFERENCES users(usersid)
    )AUTO_INCREMENT = 9999;";
    $db->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS  `like`(
      likeid INT(11) NOT NULL,
      pid INT(11),
      FOREIGN KEY (pid) REFERENCES postes(postusrid)
      );";
      $db->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS  `saved`(
      savedid INT(11) NOT NULL,
      pid INT(11),
      FOREIGN KEY (pid) REFERENCES postes(postusrid)
      );";
      $db->exec($sql);
      $sql = "CREATE TABLE IF NOT EXISTS  `comment`(
        cid INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
        cuid INT(11) NOT NULL,
        pid INT(11),
        cmt VARCHAR(255) NOT NULL,
        FOREIGN KEY (pid) REFERENCES postes(postusrid)
        );";
        $db->exec($sql);
        // $sql = "CREATE TABLE IF NOT EXISTS  `mode`(
        //   `uid` INT(11) ,
        //   mode boolean,
        //   FOREIGN KEY (uid) REFERENCES users(usersid)
        // );";
        // $db->exec($sql);
  // $img = base64_encode("img/sun.png");
  // $sql = "INSERT into imgs(id, img) VALUES(2265, '$img');";
  // $db->exec($sql);
} catch (PDOException $e) {
  echo "DB ERROR: " . $e->getMessage();
}
?>