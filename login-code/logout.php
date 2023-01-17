<?php

// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the cookie by setting its expiration time to the past
setcookie("username", "", time() - 3600, "/");
setcookie("logged_in", "", time() - 3600, "/");

// Redirect to the login page
header('location: login.php');


?>