<?php
session_start();
session_destroy();
header("Location: login.html");  //  Redirect to login.html instead of login.php
exit();
?>
