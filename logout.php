<?php
// logout.php

session_start();

// Destroy all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Prevent browser from caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login
header("Location: login.php?msg=You have been logged out");
exit();
?>