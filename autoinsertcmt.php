<?php
session_start();
if (isset($_SESSION['uid'])) {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (!empty(trim($_POST['cmt']))) {
        $user = $_SESSION['uid'];
        echo "$user";
    }
}
