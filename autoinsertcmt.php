<?php
session_start();
$user = $_SESSION['uid'];
echo "$user";
