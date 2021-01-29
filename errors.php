<center>
<?php
    if(!empty($_GET['error'])){
        
        if($_GET['error'] === 'loginm')
        {
            echo "<h4 style='color:#dc322f!important;'>Username Already taken &times</h4>";
        }
        if($_GET['error'] === 'notveri')
        {
            echo "<h4 style='color:#dc322f!important;'>Your Email Not Verified</h4>";
        }
        if($_GET['error'] === 'verify')
        {
            echo "<h4 style='color:#dc322f!important;'>Check Your Email</h4>";
        }
        if($_GET['error'] === 'emailm')
        {
            echo "<h4 style='color:#dc322f!important;'>Email Already taken &times</h4>";
        }
        if($_GET['error'] === 'fixemail')
        {
            echo "<h4 style='color:#dc322f!important;'>Wrong Email format try  :</h4>";
            echo "<h4 style='color:#dc322f!important;'>exemple@mail.com</h4>";
        }
        if($_GET['error'] === 'fixpwd')
        {
            echo "<h4 style='color:#dc322f!important;' >Wrong Password format : </h4>";
            echo "<h4 style='color:#dc322f!important;'>Azerty12 </h4>";
        }
        if($_GET['error'] === 'pwdnomatch')
        {
            echo "<h4 style='color:#dc322f!important;' >Enter Same Password &times</h4>";
        }
        if($_GET['error'] === 'notexist')
        {
            echo "<h4 style='color:#dc322f!important;' >Password or User Not Found &times</h4>";
        }
        if($_GET['error'] === 'oldpwinco')
        {
            echo "<h4 style='color:#dc322f!important;' >Old Password Incorrect &times</h4>";
        }
    }
    if(!empty($_GET['sucs']))
    {

        if($_GET['sucs'] === 'true')
        {
            echo "<h4 style='color:#859900!important;'>INFO UPDATED &#10004</h4>";
        }
    }
?>
</div>