<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kreon&display=swap" rel="stylesheet">
    
  </head>
  <div id="header">
    <li id="hdlogo">
      <a id="logo" href="index.php">CAMAGRU</a>
      <div id="line"></div>
    </li>
    <?php 
      // session_start();
      if(empty($_SESSION['uid']))
      {
        echo '<li id="hditemes">';
        echo '  <a href="login.php" id="item">LOGIN</a>';
        echo ' </li>';
        echo '<li id="hditemes">';
        echo '<a href="signup.php" id="item">SINGUP</a>';
        echo ' </li>';
      }
      else if(isset($_SESSION['uid']))
      {
        echo '<li id="hditemes">';
        echo '  <a href="imglab.php" id="item">IMG-LAB</a>';
        echo ' </li>';
        echo '<li id="hditemes">';
        echo '  <a href="logout.php" id="item">LOGOUT</a>';
        echo ' </li>';
      }
    ?>
    <li id="itemlistd">
      <input type="checkbox" id="toggle" onclick="darkmode()" value="Dark">
      <div id="ball">
        </div>
      </li>
    </div>
