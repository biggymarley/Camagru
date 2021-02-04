<?php
session_start();
$svname = "localhost";
$user = "root";
$pw = "root";
$dbname = "Camagru_users";
$dsn = "mysql:host=" . $svname . ";dbname=" . $dbname;
if (isset($_SESSION['uid'])) {
    $id = $_SESSION['usersid'];
    if (isset($_POST['imgsrc']))
        $img = $_POST['imgsrc'];
    else {
        header('location: ././main/imglab.php');
        return;
    }
    if (isset($_POST['styleimg']))
        $style = $_POST['styleimg'];
    else
        $style = '';
    if (!empty($img)) {
        try {
            $db = new PDO($dsn, $user, $pw);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $new =  preg_replace('/data:image\/png;base64,/', '', $img);
            $imgdata = base64_decode($new);
            $imgfromstrimg = imagecreatefromstring($imgdata);
            $sticky = imagecreatefrompng($_POST['sticky']);
            imagealphablending($imgfromstrimg, true);
            imagesavealpha($imgfromstrimg, true);
            imagecopy($imgfromstrimg, $sticky, 250, 90, 0, 0, 128, 128);
            ob_start(); 
            imagepng($imgfromstrimg); 
            $contents = ob_get_contents(); 
            ob_end_clean();
            $img = "data:image/png;base64," . base64_encode($contents);
            $sql = "INSERT INTO `postes` (`postesid`, `imgstyle`, `img`) VALUE (:pid, :ist, :img)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':pid', $id);
            $stmt->bindValue(':ist', $style);
            $stmt->bindValue(':img', $img);
            $stmt->execute();
            header('location: .././main/imglab.php');
            return;
        } catch (PDOException $e) {
            echo "DB ERROR: " . $e->getMessage();
        }
    }
    header('location: ././main/imglab.php');
    return;
} else {
    header('location: ./index.php');
    return;
}
