<?php
// Start the session (if not already started)
session_start();

// Clear all session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page (adjust the path as needed)
header("Location: ../view/login.php");
exit;
?>
