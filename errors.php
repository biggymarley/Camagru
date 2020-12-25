<div>
<?php
    if(!empty($_GET['error'])){
        if($_GET['error'] === 'loginm')
        {
            echo "<h4>Username Already taken *</h4>";
        }
        if($_GET['error'] === 'emailm')
        {
            echo "<h4>Email Already taken *</h4>";
        }
        if($_GET['error'] === 'fixemail')
        {
            echo "<h4>Wrong Email format try  :</h4>";
            echo "<h4>exemple@mail.com</h4>";
        }
        if($_GET['error'] === 'fixpwd')
        {
            echo "<h4>Wrong Password format : </h4>";
            echo "<h4>Azerty12</h4>";
        }
        if($_GET['error'] === 'pwdnomatch')
        {
            echo "<h4>Enter Same Password *</h4>";
        }
        if($_GET['error'] === 'notexist')
        {
            echo "<h4>Password or User Not Found *</h4>";
        }
    }
?>
</div>