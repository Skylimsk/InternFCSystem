<?php
// Start the session (if not already started)
session_start();

// Hardcoded user data for authentication
$users = array(
    "student" => array("password" => "student1", "redirect" => "../view/studentDashboard.php"),
    "jkli" => array("password" => "jkli1", "redirect" => "../view/JKLIDashboard.php"),
    "company" => array("password" => "company1", "redirect" => "../view/companyDashboard.php")
);

// Get user input from the form
$userID = $_POST["userid"];
$password = $_POST["password"];

// Check if the user exists and the password matches
if (array_key_exists($userID, $users) && $password === $users[$userID]["password"]) {
    // Redirect the user to the appropriate dashboard based on their user level
    $redirectURL = $users[$userID]["redirect"];
    header("Location: $redirectURL");
    exit;
} else {
    // If authentication fails, set an error message in the session
    $_SESSION["error_message"] = "Invalid User ID or Password!";
    
    // Redirect back to login.php
    header("Location: ../view/login.php");
    exit;
}
?>
