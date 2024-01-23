<?php
// Start the session (if not already started)
session_start();

// Check if an error message exists
if (isset($_SESSION["error_message"])) {
    echo '<script>window.onload = function() { alert("Invalid login credentials. Please try again."); }</script>';
    // Unset the error message to avoid displaying it again
    unset($_SESSION["error_message"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-wrapper">
        <img src="../images/FC-logo-2022.png" alt="faculty of computing" width="600" height="100" class="login-logo">
        <h1>Intern FC System</h1>
        <div class="login-container">
            <form action="../controller/login_process.php" method="post">
                <div class="input-group">
                    <img src="../images/userid.png" alt="userid" class="input-icon">
                    <input type="text" id="userid" name="userid" placeholder="User ID">
                </div>
                <div class="input-group">
                    <img src="../images/password.webp" alt="password" class="input-icon">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <input type="submit" value="LOGIN">
            </form>
        </div>
    </div>
</body>
</html>
