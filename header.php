<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kreon&display=swap" rel="stylesheet">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Orbitron:wght@700&display=swap" rel="stylesheet">
  </head>
  <div id="header">
    <li id="hdlogo">
      <a id="logo" href="index.php">CAMAGRU</a>
      <div id="line"></div>
    </li>
    <?php 
      // session_start();
      if(empty($_SESSION['usersid']))
      {
        echo '<li id="hditemes">';
        echo '<a href="login.php" class="item">LOGIN</a>';
        echo '</li>';
        echo '<li id="hditemes">';
        echo '<a href="signup.php" class="item">SINGUP</a>';
        echo ' </li>';
      }
      else if(isset($_SESSION['usersid']))
      {
        echo '<li id="hditemes">';
        echo '<a href="profile.php" class="item">PROFILE</a>';
        echo ' </li>';
        echo '<li id="hditemes">';
        echo '  <a href="imglab.php" class="item">IMG-LAB</a>';
        echo '</li>';
        echo '<li id="hditemes">';
        echo '<a href="logout.php" class="item">LOGOUT</a>';
        echo ' </li>';
      }
    ?>
    <li id="itemlistd">
      <input type="checkbox" id="toggle" value="Dark">
      <div id="ball">
        </div>
      </li>
    </div>
