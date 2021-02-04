<?php
if(isset($_SESSION['uid'])){
$headers = array(
    'MIME-Version' => '1.0',
    'Content-type' => 'text/html; charset=iso-8859-1',
    'From' => 'Camagru@Support.com'
);

mail($email, $subject, $mess, $headers);
}else
{
    header('location: ../index.php');
    return;
}