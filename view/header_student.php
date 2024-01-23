<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTM</title>
    <link rel="stylesheet" href="../css/header_student.css"> 
    <script>
        function showLogoutConfirmation() {
            // Use the built-in `confirm` function to show the confirmation dialog
            var confirmLogout = confirm("Are you sure you want to logout?");
            
            // Check the user's choice
            if (confirmLogout) {
                // If the user clicks "OK," proceed with logout
                window.location.href = "../controller/logoutController.php"; // Redirect to logout script
            } else {
                // If the user clicks "Cancel," do nothing
            }
        }
    </script>
</head>
<body>
    <header>
        <div class="top-nav">
            <img src="../images/FC-logo-2022.png" alt="UTM Logo" class="logo">
            <div class="user-info">
                <img src="../images/userid.png" alt="User">
                <span>Student</span>
            </div>
            <div class="logout">
                <a href="#" onclick="showLogoutConfirmation()">Log Out</a>
            </div>
        </div>
    </header>
</body>
</html>
