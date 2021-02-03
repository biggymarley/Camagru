<?php
$db->exec("CREATE DATABASE IF NOT EXISTS ".$dbname);
$sql = "use ".$dbname;
$db->exec($sql);
$sql = "CREATE TABLE IF NOT EXISTS  users(
    usersid INT(11) PRIMARY KEY AUTO_INCREMENT,
    uid VARCHAR(255) NOT NULL,
    uemail VARCHAR(255) NOT NULL,
    upwd varchar(255) NOT NULL,
    uimg LONGBLOB,
    infoemail boolean,
    accountstatus boolean default 0,
    uvcode VARCHAR(255) NOT NULL
);";
$db->exec($sql);
$sql = "CREATE TABLE IF NOT EXISTS  postes(
postusrid INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
postesid INT(11),
imgstyle Varchar(255) NOT NULL,
img LONGBLOB,
FOREIGN KEY (postesid) REFERENCES users(usersid)
ON DELETE CASCADE ON UPDATE CASCADE
)AUTO_INCREMENT = 9999;";
$db->exec($sql);
$sql = "CREATE TABLE IF NOT EXISTS  `like`(
  likeid INT(11) NOT NULL,
  pid INT(11),
  FOREIGN KEY (pid) REFERENCES postes(postusrid)
  ON DELETE CASCADE ON UPDATE CASCADE
  );";
  $db->exec($sql);
$sql = "CREATE TABLE IF NOT EXISTS  `saved`(
  savedid INT(11) NOT NULL,
  pid INT(11),
  FOREIGN KEY (pid) REFERENCES postes(postusrid)
  ON DELETE CASCADE ON UPDATE CASCADE
  );";
  $db->exec($sql);
  $sql = "CREATE TABLE IF NOT EXISTS  `comment`(
    cid INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cuid INT(11) NOT NULL,
    pid INT(11),
    cmt VARCHAR(255) NOT NULL,
    FOREIGN KEY (pid) REFERENCES postes(postusrid)
    ON DELETE CASCADE ON UPDATE CASCADE
    );";
    $db->exec($sql);