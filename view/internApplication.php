<?php

    include('../controller/studentController.php');
    if (!isset($_SESSION['currentStep'])) {
        $_SESSION['currentStep'] = 1;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<?php include('header_student.php'); ?>
    
    <div class="app">
        <aside class="sidebar">
            <h3>Menu</h3>
            
            <nav class="menu">
                <a href="studentDashboard.php" class="menu-item">Dashboard</a>
                <a href="studentInternship.php" class="menu-item">Internship</a>
                <a href="internApplication.php" class="menu-item is-active">Application</a>
            </nav>
        </aside>
    
    <main class="content">
        <?php
            displayForm($_SESSION['currentStep']);
        ?>
    </main>
    </div>
</body>
</html>


